<?php

namespace App\Http\Controllers;

use App\Interfaces\JobInterface;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobController extends Controller
{
    private JobInterface $jobInterface;

    public function __construct(JobInterface $jobInterface)
    {
        $this->jobInterface = $jobInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'intitule' => 'required|string|max:255', // <-- Validation pour l'intitulé
            'application_type' => 'required|in:emploi,stage',
            'cv' => 'required|file|mimes:pdf|max:2048', // 2MB Max
            'motivation_letter' => 'required|file|mimes:pdf|max:2048', // 2MB Max
        ]);

        // Gérer le téléversement des fichiers
        // N'oubliez pas de lancer `php artisan storage:link`
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
