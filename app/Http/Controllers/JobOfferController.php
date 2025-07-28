<?php

namespace App\Http\Controllers;

use App\Interfaces\JobOfferInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class JobOfferController extends Controller
{
    protected $jobRepo;

    public function __construct(JobOfferInterface $jobRepo)
    {
        $this->jobRepo = $jobRepo;
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10);
        $job_offers = $this->jobRepo->searchAndPaginate($search, $perPage);
        return view('admin.career.index', compact('job_offers'));
    }

    public function create()
    {
        return view('admin.career.create');
    }

    public function store(Request $request)
    {
    Log::info("Requete passée");
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'bref_description' => 'required|string',
                'type' => 'required|in:stage,emploi',
                'status' => 'required|in:open,closed',
            ], [
                'title.required' => 'Le titre est obligatoire.',
                'title.string' => 'Le titre doit être une chaîne de caractères.',
                'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
                'description.required' => 'La description est obligatoire.',
                'description.string' => 'La description doit être une chaîne de caractères.',
                'bref_description.required' => 'La bref description est obligatoire.',
                'bref_description.string' => 'La bref description doit être une chaîne de caractères.',
                'type.required' => 'Le type est obligatoire.',
                'type.in' => 'Le type doit être soit "stage" soit "emploi".',
                'status.required' => 'Le statut est obligatoire.',
                'status.in' => 'Le statut doit être soit "open" soit "closed".',
            ]);

                Log::info("Requete Validée");

            $this->jobRepo->create([
                'title' => trim($request->title),
                'description' => trim($request->description),
                'bref_description' => trim($request->bref_description),
                'type' => $request->type,
                'status' => $request->status ?? 'open',
            ]);
                            Log::info("Requete Soumise");


            return redirect()->route('career.index')->with('success', 'Offre d\'emploi créée avec succès.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la création de l\'offre.'])->withInput();
        }
    }

    public function show(string $id)
    {
        try {
            $job_offer = $this->jobRepo->find($id);
            if (!$job_offer) {
                return redirect()->route('career.index')->withErrors(['error' => 'Offre d\'emploi introuvable.']);
            }
            return view('admin.career.show', compact('job_offer'));
        } catch (\Exception $e) {
            return redirect()->route('career.index')->withErrors(['error' => 'Une erreur est survenue.']);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $job_offer = $this->jobRepo->find($id);
            if (!$job_offer) {
                return redirect()->route('career.index')->withErrors(['error' => 'Offre d\'emploi introuvable.']);
            }

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'bref_description' => 'required|string',
                'type' => 'required|in:stage,emploi',
                'status' => 'required|in:open,closed',
            ], [
                'title.required' => 'Le titre est obligatoire.',
                'title.string' => 'Le titre doit être une chaîne de caractères.',
                'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
                'description.required' => 'La description est obligatoire.',
                'description.string' => 'La description doit être une chaîne de caractères.',
                'bref_description.required' => 'La bref description est obligatoire.',
                'bref_description.string' => 'La bref description doit être une chaîne de caractères.',
                'type.required' => 'Le type est obligatoire.',
                'type.in' => 'Le type doit être soit "stage" soit "emploi".',
                'status.required' => 'Le statut est obligatoire.',
                'status.in' => 'Le statut doit être soit "open" soit "closed".',
            ]);

            $this->jobRepo->update($job_offer, [
                'title' => trim($request->title),
                'description' => trim($request->description),
                'bref_description' => trim($request->bref_description),
                'type' => $request->type,
                'status' => $request->status,
            ]);

            return redirect()->route('career.index')->with('success', 'Offre d\'emploi mise à jour avec succès.');
        } catch (ValidationException $e) {
            return redirect()->route('career.index')
                ->withErrors($e->errors())
                ->withInput()
                ->with('edit_job_offer_id', $id); // Passe l'ID pour rouvrir le modal
        } catch (\Exception $e) {
            return redirect()->route('career.index')
                ->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour.'])
                ->with('edit_job_offer_id', $id);
        }
    }

    public function destroy(string $id)
    {
        try {
            $job_offer = $this->jobRepo->find($id);
            if (!$job_offer) {
                return redirect()->route('career.index')->withErrors(['error' => 'Offre d\'emploi introuvable.']);
            }
            $this->jobRepo->delete($job_offer);
            return redirect()->route('career.index')->with('success', 'Offre d\'emploi supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('career.index')->withErrors(['error' => 'Une erreur est survenue lors de la suppression.']);
        }
    }

    public function toggleStatus(string $id)
    {
        try {
            $job_offer = $this->jobRepo->find($id);
            if (!$job_offer) {
                return redirect()->route('career.index')->withErrors(['error' => 'Offre d\'emploi introuvable.']);
            }
            $newStatus = $job_offer->status === 'open' ? 'closed' : 'open';
            $this->jobRepo->update($job_offer, [
                'status' => $newStatus,
            ]);
            $statusText = $newStatus === 'open' ? 'ouverte' : 'fermée';
            return redirect()->route('career.index')
                ->with('success', "L'offre d'emploi a été {$statusText} avec succès.");
        } catch (\Exception $e) {
            return redirect()->route('career.index')
                ->withErrors(['error' => 'Une erreur est survenue lors du changement de statut.']);
        }
    }
}
