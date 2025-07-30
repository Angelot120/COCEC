<?php

namespace App\Http\Controllers;

use App\Interfaces\AgencyLocationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AgencyLocationController extends Controller
{
    protected $agencyRepo;

    public function __construct(AgencyLocationInterface $agencyRepo)
    {
        $this->agencyRepo = $agencyRepo;
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('per_page', 10);
        $agencies = $this->agencyRepo->searchAndPaginate($search, $perPage);
        return view('admin.agency.index', compact('agencies'));
    }

    public function create()
    {
        return view('admin.agency.create');
    }

    public function store(Request $request)
    {
        Log::info("Requete passée");

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'latitude' => 'required|numeric|between:-90,90',
                'longitude' => 'required|numeric|between:-180,180',
                'address' => 'required|string|max:500',
                'phone' => 'required|string|max:20',
                'status' => 'nullable|in:Open,Close',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:30720',
            ], [
                'name.required' => 'Le nom de l\'agence est obligatoire.',
                'name.string' => 'Le nom doit être une chaîne de caractères.',
                'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'latitude.required' => 'La latitude est obligatoire.',
                'latitude.numeric' => 'La latitude doit être un nombre.',
                'latitude.between' => 'La latitude doit être comprise entre -90 et 90.',
                'longitude.required' => 'La longitude est obligatoire.',
                'longitude.numeric' => 'La longitude doit être un nombre.',
                'longitude.between' => 'La longitude doit être comprise entre -180 et 180.',
                'address.required' => 'L\'adresse est obligatoire.',
                'address.string' => 'L\'adresse doit être une chaîne de caractères.',
                'address.max' => 'L\'adresse ne peut pas dépasser 500 caractères.',
                'phone.required' => 'Le numéro de téléphone est obligatoire.',
                'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
                'phone.max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',
                'status.in' => 'Le statut doit être soit "Open" soit "Close".',
                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'Le fichier doit être de type : jpeg, png, jpg ou gif.',
                'image.max' => 'L\'image ne doit pas dépasser 10 Mo.',
            ]);

            Log::info("Requete Validée");



            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('agency', 'public');
            }

            $this->agencyRepo->create([
                'name' => trim($request->name),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'address' => trim($request->address),
                'phone' => trim($request->phone),
                'status' => $request->status,
                "image" => $imagePath,

            ]);
            Log::info("Requete Soumise");


            return redirect()->route('agency.index')->with('success', 'Agence ajoutée avec succès.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de la création de l\'agence.'])->withInput();
        }
    }

    public function update(Request $request, string $id)
    {
        Log::info("Requete passée");

        try {
            $agency = $this->agencyRepo->find($id);
            if (!$agency) {
                return redirect()->route('agency.index')->withErrors(['error' => 'Agence introuvable.']);
            }

            $request->validate([
                'name' => 'required|string|max:255',
                'latitude' => 'required|numeric|between:-90,90',
                'longitude' => 'required|numeric|between:-180,180',
                'address' => 'required|string|max:500',
                'phone' => 'required|string|max:20',
                'status' => 'nullable|in:Open,Close',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:30720',

            ], [
                'name.required' => 'Le nom de l\'agence est obligatoire.',
                'name.string' => 'Le nom doit être une chaîne de caractères.',
                'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'latitude.required' => 'La latitude est obligatoire.',
                'latitude.numeric' => 'La latitude doit être un nombre.',
                'latitude.between' => 'La latitude doit être comprise entre -90 et 90.',
                'longitude.required' => 'La longitude est obligatoire.',
                'longitude.numeric' => 'La longitude doit être un nombre.',
                'longitude.between' => 'La longitude doit être comprise entre -180 et 180.',
                'address.required' => 'L\'adresse est obligatoire.',
                'address.string' => 'L\'adresse doit être une chaîne de caractères.',
                'address.max' => 'L\'adresse ne peut pas dépasser 500 caractères.',
                'phone.required' => 'Le numéro de téléphone est obligatoire.',
                'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
                'phone.max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',
                'status.in' => 'Le statut doit être soit "Open" soit "Close".',
                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'Le fichier doit être de type : jpeg, png, jpg ou gif.',
                'image.max' => 'L\'image ne doit pas dépasser 10 Mo.',
            ]);
            Log::info("Requete Validée");

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('agency', 'public');
            }

            $this->agencyRepo->update($agency, [
                'name' => trim($request->name),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'address' => trim($request->address),
                'phone' => trim($request->phone),
                'status' => $request->status,
                "image" => $imagePath,

            ]);
            Log::info("Requete Soumise");



            return redirect()->route('agency.index')->with('success', 'Agence mise à jour avec succès.');
        } catch (ValidationException $e) {
            return redirect()->route('agency.index')
                ->withErrors($e->errors())
                ->withInput()
                ->with('edit_agency_id', $id);
        } catch (\Exception $e) {
            return redirect()->route('agency.index')
                ->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour.'])
                ->with('edit_agency_id', $id);
        }
    }

    public function destroy(string $id)
    {
        try {
            $agency = $this->agencyRepo->find($id);
            if (!$agency) {
                return redirect()->route('agency.index')->withErrors(['error' => 'Agence introuvable.']);
            }
            $this->agencyRepo->delete($agency);
            return redirect()->route('agency.index')->with('success', 'Agence supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('agency.index')->withErrors(['error' => 'Une erreur est survenue lors de la suppression.']);
        }
    }
}
