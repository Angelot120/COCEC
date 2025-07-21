<?php

namespace App\Http\Controllers;

use App\Interfaces\LocalityInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LocalityController extends Controller
{
    protected $localityRepo;

    public function __construct(LocalityInterface $localityRepo)
    {
        $this->localityRepo = $localityRepo;
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10);
        $localities = $this->localityRepo->searchAndPaginate($search, $perPage);
        return view('admin.settings.localities', compact('localities'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:localities,name',
            ], [
                'name.required' => 'Le nom de la localité est obligatoire.',
                'name.string' => 'Le nom de la localité doit être une chaîne de caractères.',
                'name.max' => 'Le nom de la localité ne peut pas dépasser 255 caractères.',
                'name.unique' => 'Cette localité existe déjà.',
            ]);

            $this->localityRepo->create([
                'name' => trim($request->name),
                'status' => 'active',
            ]);

            return redirect()->route('settings.localities')->with('success', 'Localité ajoutée avec succès.');
            
        } catch (ValidationException $e) {
            // Laravel va automatiquement rediriger vers la page précédente avec les erreurs
            // Les anciennes valeurs seront également conservées via old()
            throw $e;
        } catch (\Exception $e) {
            return redirect()->route('settings.localities')
                ->withErrors(['error' => 'Une erreur est survenue lors de l\'ajout de la localité.'])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $locality = $this->localityRepo->find($id);
            
            if (!$locality) {
                return redirect()->route('settings.localities')
                    ->withErrors(['error' => 'Localité introuvable.']);
            }

            $this->localityRepo->delete($locality);
            return redirect()->route('settings.localities')->with('success', 'Localité supprimée avec succès.');
            
        } catch (\Exception $e) {
            return redirect()->route('settings.localities')
                ->withErrors(['error' => 'Une erreur est survenue lors de la suppression.']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $locality = $this->localityRepo->find($id);
            
            if (!$locality) {
                return redirect()->route('settings.localities')
                    ->withErrors(['error' => 'Localité introuvable.']);
            }

            $request->validate([
                'name' => 'required|string|max:255|unique:localities,name,' . $id,
                'status' => 'required|in:active,inactive',
            ], [
                'name.required' => 'Le nom de la localité est obligatoire.',
                'name.string' => 'Le nom de la localité doit être une chaîne de caractères.',
                'name.max' => 'Le nom de la localité ne peut pas dépasser 255 caractères.',
                'name.unique' => 'Cette localité existe déjà.',
                'status.required' => 'Le statut est obligatoire.',
                'status.in' => 'Le statut doit être actif ou inactif.',
            ]);

            $this->localityRepo->update($locality, [
                'name' => trim($request->name),
                'status' => $request->status,
            ]);

            return redirect()->route('settings.localities')->with('success', 'Localité mise à jour avec succès.');
            
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return redirect()->route('settings.localities')
                ->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour.']);
        }
    }
}