<?php

namespace App\Http\Controllers;

use App\Interfaces\AnnouncementInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AnnouncementsController extends Controller
{
    protected $announcementRepo;

    public function __construct(AnnouncementInterface $announcementRepo)
    {
        $this->announcementRepo = $announcementRepo;
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('per_page', 8); // Changé de 10 à 8 pour correspondre au nouvel affichage
        $announcements = $this->announcementRepo->searchAndPaginate($search, $perPage);
        return view('admin.announcement.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.announcement.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|in:publier,non publier,expirer',
            ], [
                'title.required' => 'Le titre est obligatoire.',
                'title.string' => 'Le titre doit être une chaîne de caractères.',
                'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'L\'image doit être au format jpeg, png, jpg ou gif.',
                'image.max' => 'L\'image ne peut pas dépasser 2 Mo.',
                'status.required' => 'Le statut est obligatoire.',
                'status.in' => 'Le statut doit être "publier", "non publier" ou "expirer".',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                // Utilisation du même dossier "announcements" pour la cohérence
                $imagePath = $request->file('image')->store('announcements', 'public');
            }

            $data = [
                'title' => trim($request->title),
                'description' => $request->description,
                'status' => $request->status,
                'image' => $imagePath,
            ];

            $this->announcementRepo->create($data);

            return redirect()->route('announcement.index')->with('success', 'Annonce ajoutée avec succès.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la création de l\'annonce.'])->withInput();
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $announcement = $this->announcementRepo->find($id);
            if (!$announcement) {
                return redirect()->route('announcement.index')->withErrors(['error' => 'Annonce introuvable.']);
            }

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|in:publier,non publier,expirer',
            ], [
                'title.required' => 'Le titre est obligatoire.',
                'title.string' => 'Le titre doit être une chaîne de caractères.',
                'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'L\'image doit être au format jpeg, png, jpg ou gif.',
                'image.max' => 'L\'image ne peut pas dépasser 2 Mo.',
                'status.required' => 'Le statut est obligatoire.',
                'status.in' => 'Le statut doit être "publier", "non publier" ou "expirer".',
            ]);

            $data = [
                'title' => trim($request->title),
                'description' => $request->description,
                'status' => $request->status,
            ];

            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image si elle existe
                if ($announcement->image) {
                    Storage::disk('public')->delete($announcement->image);
                }
                // Utilisation cohérente du dossier "announcements"
                $data['image'] = $request->file('image')->store('announcements', 'public');
            }

            $this->announcementRepo->update($announcement, $data);

            return redirect()->route('announcement.index')->with('success', 'Annonce mise à jour avec succès.');
        } catch (ValidationException $e) {
            return redirect()->route('announcement.index')
                ->withErrors($e->errors())
                ->withInput()
                ->with('edit_announcement_id', $id);
        } catch (\Exception $e) {
            return redirect()->route('announcement.index')
                ->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour.'])
                ->with('edit_announcement_id', $id);
        }
    }

    public function destroy(string $id)
    {
        try {
            $announcement = $this->announcementRepo->find($id);
            if (!$announcement) {
                return redirect()->route('announcement.index')->withErrors(['error' => 'Annonce introuvable.']);
            }
            
            // Supprimer l'image si elle existe
            if ($announcement->image) {
                Storage::disk('public')->delete($announcement->image);
            }
            
            $this->announcementRepo->delete($announcement);
            return redirect()->route('announcement.index')->with('success', 'Annonce supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('announcement.index')->withErrors(['error' => 'Une erreur est survenue lors de la suppression.']);
        }
    }
}