<?php

namespace App\Http\Controllers;

use App\Interfaces\JobInterface;
use App\Models\JobApplication;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    private JobInterface $jobInterface;

    public function __construct(JobInterface $jobInterface)
    {
        $this->jobInterface = $jobInterface;
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10);
        $jobApplications = $this->jobInterface->searchAndPaginate($search, $perPage);
        return view('admin.jobList.index', compact('jobApplications'));
    }

    public function create()
    {
        // Non utilisé pour l'instant, mais peut servir pour un formulaire frontend
        return view('main.job.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'intitule' => 'required|string|max:255',
            'application_type' => 'required|in:emploi,stage',
            'cv' => 'required|file|mimes:pdf|max:30720', // 30MB Max
            'motivation_letter' => 'required|file|mimes:pdf|max:30720', // 30MB Max
        ]);

        $cvPath = $request->file('cv')->store('resumes', 'public');
        $motivationLetterPath = $request->file('motivation_letter')->store('motivation_letters', 'public');

        $response = $this->jobInterface->create([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'intitule' => $validated['intitule'],
            'application_type' => $validated['application_type'],
            'cv_path' => $cvPath,
            'motivation_letter_path' => $motivationLetterPath,
        ]);

        if (!$response) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de l\'envoi de votre candidature.']);
        }

        return back()->with('success', 'Votre candidature a bien été envoyée. Nous vous remercions !');
    }

    public function show(string $id)
    {
        $jobOffer = JobOffer::findOrFail($id);
        return view('main.job.details', ['offer' => $jobOffer]);
    }

    public function applyOffer(string $id, Request $request)
    {
        if (!JobOffer::findOrFail($id)) {
            return back()->withErrors(['error' => 'Offre d\'emploi non trouvée.']);
        }

        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'intitule' => 'required|string|max:255',
            'application_type' => 'required|in:emploi,stage',

            'cv' => 'required|file|mimes:pdf|max:30720',
            'motivation_letter' => 'required|file|mimes:pdf|max:30720',
        ]);

        $cvPath = $request->file('cv')->store('resumes', 'public');
        $motivationLetterPath = $request->file('motivation_letter')->store('motivation_letters', 'public');

        $response = $this->jobInterface->create([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'intitule' => $validated['intitule'],
            'application_type' => $validated['application_type'],
            'cv_path' => $cvPath,
            'motivation_letter_path' => $motivationLetterPath,
            'job_offer_id' => $id,
        ]);

        if (!$response) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de l\'envoi de votre candidature.']);
        }

        return back()->with('success', 'Votre candidature a bien été envoyée. Nous vous remercions !');
    }

    public function update(Request $request, string $id)
    {
        // Non utilisé pour l'instant
    }

    public function destroy(string $id)
    {
        try {
            $jobApplication = $this->jobInterface->find($id);
            // Supprimer les fichiers associés
            if ($jobApplication->cv_path && Storage::disk('public')->exists($jobApplication->cv_path)) {
                Storage::disk('public')->delete($jobApplication->cv_path);
            }
            if ($jobApplication->motivation_letter_path && Storage::disk('public')->exists($jobApplication->motivation_letter_path)) {
                Storage::disk('public')->delete($jobApplication->motivation_letter_path);
            }
            $this->jobInterface->delete($jobApplication);
            return redirect()->route('jobList.index')->with('success', 'Candidature supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('jobList.index')->withErrors(['error' => 'Une erreur est survenue lors de la suppression.']);
        }
    }

    public function downloadFile($id, $type)
    {
        try {
            $jobApplication = $this->jobInterface->find($id);
            $filePath = $type === 'cv' ? $jobApplication->cv_path : $jobApplication->motivation_letter_path;
            if (!$filePath || !Storage::disk('public')->exists($filePath)) {
                return back()->withErrors(['error' => 'Fichier non trouvé.']);
            }
            return Storage::disk('public')->download($filePath);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors du téléchargement.']);
        }
    }
}
