<?php

namespace App\Http\Controllers;

use App\Interfaces\AccountInterface;
use App\Models\MoralPersonSubmission;
use App\Models\PhysicalPersonSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    private AccountInterface $accountInterface;

    public function __construct(AccountInterface $accountInterface)
    {
        $this->accountInterface = $accountInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('main.account.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePhysical(Request $request)
    {
        $validated = $request->validate([
            // Step 1: Personal Information
            'last_name' => 'required|string|max:255',
            'first_names' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',

            // Step 2: Additional Information
            'marital_status' => 'required|string|max:255',
            'spouse_name' => 'required|string|max:255',
            'spouse_occupation' => 'required|string|max:255',
            'spouse_phone' => 'required|string|max:20',
            'occupation' => 'required|string|max:255',
            'company_name_activity' => 'required|string|max:255',
            'activity_description' => 'required|string',
            'ref1_name' => 'required|string|max:255',
            'ref1_phone' => 'required|string|max:20',

            // Step 3: Residence & KYC
            'loc_method_physical' => 'required|in:description,map',
            'residence_description' => 'required_if:loc_method_physical,description|nullable|string',
            'residence_lat' => 'required_if:loc_method_physical,map|nullable|numeric',
            'residence_lng' => 'required_if:loc_method_physical,map|nullable|numeric',
            'residence_plan_path' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'workplace_description' => 'required|string',
            'workplace_plan_path' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',

            // Step 4: Documents & Identification
            'id_type' => 'required|string|max:255',
            'id_number' => 'required|string|max:255',
            'photo_path' => 'required|file|image|max:2048',
            'id_scan_path' => 'required|file|mimes:pdf|max:2048',
            'beneficiaires' => 'nullable|array',
            'beneficiaires.*.name' => 'required_with:beneficiaires|string|max:255',
            'beneficiaires.*.relationship' => 'required_with:beneficiaires|string|max:255',
            'beneficiaires.*.phone' => 'required_with:beneficiaires|string|max:255',
            'signature_method_physique' => 'required|in:draw,upload',
            'signature_data_physique' => 'required_if:signature_method_physique,draw|nullable|string',
            'signature_upload_physique' => 'required_if:signature_method_physique,upload|nullable|file|image|max:1024',

            // Step 5: Payments
            'initial_deposit' => 'required|numeric|min:0',
        ], [
            'id_scan_path.mimes' => 'Le scan de la pièce doit être un fichier PDF.',
            'signature_data_physique.required_if' => 'La signature dessinée est requise.',
            'signature_upload_physique.required_if' => "L'import de la signature est requis.",
        ]);

        try {
            DB::beginTransaction();

            // --- File handling ---
            $photoPath = $request->file('photo_path')->store('photos_identite', 'public');
            $idScanPath = $request->file('id_scan_path')->store('scans_pieces', 'public');

            $residencePlanPath = null;
            if ($request->hasFile('residence_plan_path')) {
                $residencePlanPath = $request->file('residence_plan_path')->store('plans/residence', 'public');
            }

            $workplacePlanPath = null;
            if ($request->hasFile('workplace_plan_path')) {
                $workplacePlanPath = $request->file('workplace_plan_path')->store('plans/workplace', 'public');
            }

            $signatureBase64 = null;
            $signatureUploadPath = null;
            if ($request->input('signature_method_physique') === 'draw') {
                $signatureBase64 = $request->input('signature_data_physique');
            } elseif ($request->hasFile('signature_upload_physique')) {
                $signatureUploadPath = $request->file('signature_upload_physique')->store('signatures', 'public');
            }

            // --- Data preparation for creation ---
            $data = [
                'last_name' => $request->last_name,
                'first_names' => $request->first_names,
                'gender' => $request->gender,
                'birth_date' => $request->birth_date,
                'birth_place' => $request->birth_place,
                'nationality' => $request->nationality,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'marital_status' => $request->marital_status,
                'spouse_name' => $request->spouse_name,
                'spouse_occupation' => $request->spouse_occupation,
                'spouse_phone' => $request->spouse_phone,
                'occupation' => $request->occupation,
                'company_name_activity' => $request->company_name_activity,
                'activity_description' => $request->activity_description,
                'ref1_name' => $request->ref1_name,
                'ref1_phone' => $request->ref1_phone,
                'residence_description' => $request->input('loc_method_physical') === 'description' ? $request->residence_description : 'Adresse via carte',
                'workplace_description' => $request->workplace_description,
                'residence_lat' => $request->residence_lat,
                'residence_lng' => $request->residence_lng,
                'workplace_lat' => null, // Ce champ n'est pas dans la vue
                'workplace_lng' => null, // Ce champ n'est pas dans la vue
                'id_type' => $request->id_type,
                'id_number' => $request->id_number,
                'photo_path' => $photoPath,
                'id_scan_path' => $idScanPath,
                'residence_plan_path' => $residencePlanPath,
                'workplace_plan_path' => $workplacePlanPath,
                'signature_method' => $request->input('signature_method_physique'),
                'signature_base64' => $signatureBase64,
                'signature_upload_path' => $signatureUploadPath,
                'initial_deposit' => $request->initial_deposit,
            ];

            $submission = PhysicalPersonSubmission::create($data);

            // Note: Pour que cela fonctionne, le modèle PhysicalPersonSubmission doit avoir une relation
            // hasMany nommée 'beneficiaries' et une table 'beneficiaries' doit exister.
            if ($request->has('beneficiaires')) {
                foreach ($request->input('beneficiaires') as $beneficiaryData) {
                    if (isset($beneficiaryData['name'])) {
                        // $submission->beneficiaries()->create($beneficiaryData);
                    }
                }
            }

            DB::commit();
            return redirect()->route('account.create')->with('success', "Votre demande d'ouverture de compte (Personne Physique) a été soumise avec succès !");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Erreur de soumission (Physique): " . $e->getMessage() . " Ligne: " . $e->getLine() . " Fichier: " . $e->getFile());
            return back()->withInput()->with('error', "Une erreur critique est survenue. L'administrateur a été notifié.");
        }
    }

    /**
     * Handles the submission of the form for a Moral Person.
     */
    public function storeMoral(Request $request)
    {
        $validated = $request->validate([
            // Step 1: Entity Information
            'company_name' => 'required|string|max:255',
            'rccm' => 'required|string|max:255',
            'creation_date' => 'required|date',
            'creation_place' => 'required|string|max:255',
            'activity_sector' => 'required|string|max:255',
            'company_nationality' => 'required|string|max:255',
            'company_phone' => 'required|string|max:20',
            'loc_method_moral' => 'required|in:description,map',
            'company_address' => 'required_if:loc_method_moral,description|nullable|string|max:255',
            'residence_lat' => 'required_if:loc_method_moral,map|nullable|numeric',
            'residence_lng' => 'required_if:loc_method_moral,map|nullable|numeric',

            // Step 2: Director Information
            'director_name' => 'required|string|max:255',
            'director_position' => 'required|string|max:255',
            'director_gender' => 'required|in:M,F',
            'director_nationality' => 'required|string|max:255',
            'director_birth_date' => 'required|date',
            'director_birth_place' => 'required|string|max:255',
            'director_id_number' => 'required|string|max:255',
            'director_phone' => 'required|string|max:20',
            'director_father_name' => 'required|string|max:255',
            'director_mother_name' => 'required|string|max:255',

            // Step 3: Minutes and Documents
            'pv_nomination_path' => 'required|file|mimes:pdf|max:2048',
            'statutes_path' => 'required|file|mimes:pdf|max:2048',

            // Step 4: Contacts & Agents
            'ref1_name' => 'required|string|max:255',
            'ref1_phone' => 'required|string|max:20',
            'mandataires' => 'nullable|array',
            'mandataires.*.name' => 'required_with:mandataires|string|max:255',
            'mandataires.*.position' => 'required_with:mandataires|string|max:255',
            'mandataires.*.phone' => 'required_with:mandataires|string|max:255',

            // Step 5: Documents & Signature
            'director_photo_path' => 'required|file|image|max:2048',
            'director_id_scan_path' => 'required|file|mimes:pdf|max:2048',
            'signature_method_moral' => 'required|in:draw,upload',
            'signature_data_moral' => 'required_if:signature_method_moral,draw|nullable|string',
            'signature_upload_moral' => 'required_if:signature_method_moral,upload|nullable|file|image|max:1024',

            // Step 6: Payments
            'initial_deposit' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            // --- File handling ---
            $statutesPath = $request->file('statutes_path')->store('company_documents', 'public');
            $directorPhotoPath = $request->file('director_photo_path')->store('responsible_persons_photos', 'public');

            // NOTE: Ces fichiers sont uploadés mais n'ont pas de colonne dans la migration fournie.
            // Ils ne seront donc pas sauvegardés dans la DB.
            $pvNominationPath = $request->file('pv_nomination_path')->store('company_pv', 'public');
            $directorIdScanPath = $request->file('director_id_scan_path')->store('director_id_scans', 'public');


            $signatureBase64 = null;
            $signatureUploadPath = null;
            if ($request->input('signature_method_moral') === 'draw') {
                $signatureBase64 = $request->input('signature_data_moral');
            } elseif ($request->hasFile('signature_upload_moral')) {
                $signatureUploadPath = $request->file('signature_upload_moral')->store('signatures', 'public');
            }

            $data = [
                'company_name' => $request->company_name,
                'rccm' => $request->rccm,
                'creation_date' => $request->creation_date,
                'creation_place' => $request->creation_place,
                'activity_sector' => $request->activity_sector,
                'company_nationality' => $request->company_nationality,
                'company_phone' => $request->company_phone,
                'company_address' => $request->input('loc_method_moral') === 'description' ? $request->company_address : 'Adresse via carte',
                'residence_lat' => $request->residence_lat,
                'residence_lng' => $request->residence_lng,
                'director_name' => $request->director_name,
                'director_position' => $request->director_position,
                'director_gender' => $request->director_gender,
                'director_nationality' => $request->director_nationality,
                'director_birth_date' => $request->director_birth_date,
                'director_birth_place' => $request->director_birth_place,
                'director_id_number' => $request->director_id_number,
                'director_phone' => $request->director_phone,
                'director_father_name' => $request->director_father_name,
                'director_mother_name' => $request->director_mother_name,

                // Champs de la migration non présents dans la nouvelle vue, remplis avec des placeholders
                'minutes_members' => 'PV fourni en pièce jointe',
                'minutes_meeting' => 'PV fourni en pièce jointe',

                // Mapping des champs de contact
                'emergency_contact_name' => $request->ref1_name,
                'emergency_contact_phone' => $request->ref1_phone,

                // Mapping des fichiers
                'company_document_path' => $statutesPath, // On mappe les statuts au champ générique de document
                'responsible_persons_photo_path' => $directorPhotoPath,

                'signature_method' => $request->input('signature_method_moral'),
                'signature_base64' => $signatureBase64,
                'signature_upload_path' => $signatureUploadPath,
                'initial_deposit' => $request->initial_deposit,
            ];

            $submission = MoralPersonSubmission::create($data);

            // Note: Pour que cela fonctionne, le modèle MoralPersonSubmission doit avoir une relation
            // hasMany nommée 'mandataires' (ou 'agents') et une table correspondante doit exister.
            if ($request->has('mandataires')) {
                foreach ($request->input('mandataires') as $mandataireData) {
                    if (isset($mandataireData['name'])) {
                        // $submission->mandataires()->create($mandataireData);
                    }
                }
            }

            DB::commit();
            return redirect()->route('account.create')->with('success', "Votre demande d'ouverture de compte (Personne Morale) a été soumise avec succès !");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Erreur de soumission (Morale): " . $e->getMessage() . " Ligne: " . $e->getLine() . " Fichier: " . $e->getFile());
            return back()->withInput()->with('error', "Une erreur critique est survenue. L'administrateur a été notifié.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
