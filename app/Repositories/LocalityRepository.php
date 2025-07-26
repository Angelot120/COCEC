<?php
namespace App\Repositories;


use App\Models\Locality;
// use App\Repositories\Contracts\LocalityInterface;
use App\Interfaces\LocalityInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LocalityRepository implements LocalityInterface
{
    public function all()
    {
        return Locality::all();
    }

    public function create(array $data)
    {
        return Locality::create($data);
    }

    public function find($id)
    {
        return Locality::findOrFail($id);
    }

    public function update(Locality $locality, array $data)
    {
        return $locality->update($data);
    }

    public function delete(Locality $locality)
    {
        return $locality->delete();
    }


     public function searchAndPaginate(?string $search, int $perPage): LengthAwarePaginator
    {
        // On commence une nouvelle requête Eloquent
        $query = Locality::query();

        // Si un terme de recherche est fourni...
        if ($search) {
            // ...on ajoute une condition "WHERE" pour filtrer sur le nom
            $query->where('name', 'like', "%{$search}%");
        }

        // On trie les résultats par date de création (du plus récent au plus ancien)
        // et on applique la pagination.
        return $query->latest()->paginate($perPage);
    }
}
