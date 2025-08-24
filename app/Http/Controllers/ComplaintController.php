<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComplaintNotificationMail;
use App\Models\Complaint;
use Illuminate\Support\Facades\Log;

class ComplaintController extends Controller
{
    /**
     * Afficher le formulaire de plainte
     */
    public function index()
    {
        return view('main.complaint');
    }

    /**
     * Traiter la soumission d'une plainte
     */
    public function store(Request $request)
    {
        $mail = "douvonangelotadn@gmail.com";

        // Validation des données
        $validator = Validator::make($request->all(), [
            'member_name' => 'required|string|max:255',
            'member_number' => 'required|string|max:100',
            'member_phone' => 'required|string|max:20',
            'member_email' => 'nullable|email|max:255',
            'complaint_subject' => 'required|string|max:255',
            'complaint_category' => 'required|string|in:service,credit,epargne,technique,autre',
            'complaint_description' => 'required|string|max:2000',
            'complaint_attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120', // 5MB max
            'data_consent' => 'required|accepted',
        ], [
            'member_name.required' => 'Le nom complet est obligatoire.',
            'member_number.required' => 'Le numéro d\'adhérent est obligatoire.',
            'member_phone.required' => 'Le numéro de téléphone est obligatoire.',
            'member_email.email' => 'L\'adresse email doit être valide.',
            'complaint_subject.required' => 'L\'objet de la plainte est obligatoire.',
            'complaint_category.required' => 'La catégorie de la plainte est obligatoire.',
            'complaint_description.required' => 'La description de la plainte est obligatoire.',
            'complaint_description.max' => 'La description ne peut pas dépasser 2000 caractères.',
            'complaint_attachments.*.file' => 'Les pièces jointes doivent être des fichiers valides.',
            'complaint_attachments.*.mimes' => 'Les formats acceptés sont : JPG, PNG, PDF, DOC, DOCX.',
            'complaint_attachments.*.max' => 'Chaque fichier ne peut pas dépasser 5MB.',
            'data_consent.required' => 'Vous devez accepter le traitement de vos données.',
            'data_consent.accepted' => 'Vous devez accepter le traitement de vos données.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Créer la plainte
            $complaint = new Complaint();
            $complaint->member_name = $request->member_name;
            $complaint->member_number = $request->member_number;
            $complaint->member_phone = $request->member_phone;
            $complaint->member_email = $request->member_email;
            $complaint->subject = $request->complaint_subject;
            $complaint->category = $request->complaint_category;
            $complaint->description = $request->complaint_description;
            $complaint->status = 'pending';
            $complaint->reference = 'PLAINT-' . date('Y') . '-' . str_pad(Complaint::count() + 1, 4, '0', STR_PAD_LEFT);
            $complaint->save();

            // Traitement des pièces jointes
            if ($request->hasFile('complaint_attachments')) {
                foreach ($request->file('complaint_attachments') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('complaints/' . $complaint->id, $filename, 'public');

                    // Ici vous pourriez créer un modèle Attachment si nécessaire
                    // Pour l'instant, on stocke juste le chemin
                    $complaint->attachments = $complaint->attachments ? $complaint->attachments . ',' . $path : $path;
                }
                $complaint->save();
            }

            // Envoyer un email de notification (optionnel)
            if (config('mail.default') !== 'log') {
                try {
                    Mail::to($mail)
                        ->send(new ComplaintNotificationMail($complaint));
                } catch (\Exception $e) {
                    // Log l'erreur mais ne pas faire échouer la soumission
                    Log::error('Erreur lors de l\'envoi de l\'email de plainte: ' . $e->getMessage());
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Votre plainte a été déposée avec succès. Référence: ' . $complaint->reference,
                'reference' => $complaint->reference
            ]);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la plainte: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors du traitement de votre plainte. Veuillez réessayer.'
            ], 500);
        }
    }

    /**
     * Afficher la liste des plaintes (admin)
     */
    public function indexAdmin()
    {
        $complaints = Complaint::latest()->paginate(20);
        return view('admin.complaints.index', compact('complaints'));
    }

    /**
     * Afficher les détails d'une plainte (admin)
     */
    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('admin.complaints.show', compact('complaint'));
    }

    /**
     * Mettre à jour le statut d'une plainte (admin)
     */
    public function updateStatus(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,processing,resolved,closed',
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $complaint->status = $request->status;
        $complaint->admin_notes = $request->admin_notes;
        $complaint->resolved_at = $request->status === 'resolved' ? now() : null;
        $complaint->save();

        return back()->with('success', 'Le statut de la plainte a été mis à jour avec succès.');
    }
}
