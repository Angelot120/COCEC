<?php

namespace App\Http\Controllers;

use App\Interfaces\AnnouncementsInterface;
use App\Models\Announcements;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    private AnnouncementsInterface $announcementsInterface;

    public function __construct(AnnouncementsInterface $announcementsInterface)
    {
        $this->announcementsInterface = $announcementsInterface;
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
    public function create(Request $request)
    {

        $validated = $request->validate([
            'title' => 'string|max:255',
            'content' => 'string|max:255',
            'image' => 'required|string|max:10240',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        |
        | Here we handle the image upload for the announcement. If an image is
        | provided, we store it in the 'public' disk and save the path.
        |
        */

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog', 'public');
        }

        $data = [
            "title" => $request->title,
            "content" => $request->content,
            "image" => $imagePath,
        ];

        $response = $this->announcementsInterface->create($data);
        if (!$response) {
            return back()->with('error', 'Erreur lors de la création de l\'annonce !');
        }

        return back()->with('success', 'Annonce créée avec succès !');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Récupère l'annonce affichée
        $announcement = Announcements::findOrFail($id);

        // Récupère 4 autres annonces récentes, excluant celle en cours
        $announcements = Announcements::where('id', '!=', $id)
            ->where('is_published', true)
            ->latest() // équivalent à orderBy('created_at', 'desc')
            ->take(4)
            ->get();


        return view('blogs.details', compact('blog', 'blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $announcement = Announcements::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'required|string|max:500',
            'long_description' => 'required|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog', 'public');
        } else {
            $imagePath = $announcement->image; // Keep the existing image if no new one is uploaded
        }

        $data = [
            "title" => $request->title,
            "short_description" => $request->short_description,
            "long_description" => $request->long_description,
            "image" => $imagePath,
            "is_published" => $request->is_published,
        ];

        $response = $this->announcementsInterface->edit($id, $data);
        if (!$response)
            return back()->with('error', 'Erreur lors de la modification de l\'annonce!');

        return back()->with('success', 'Annonce modifiée avec succès!');
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
    public function destroy($id)
    {
        $response = $this->announcementsInterface->destroy($id);
        if (!$response)
            return back()->with('error', 'Erreur lors de la suppression de l\'annonce!');

        return back()->with('success', 'Annonce supprimée avec succès');
    }
}
