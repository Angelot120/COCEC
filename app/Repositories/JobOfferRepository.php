<?php

namespace App\Repositories;

use App\Interfaces\JobOfferInterface;
use App\Models\job;
use App\Models\JobOffer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class JobOfferRepository implements JobOfferInterface
{
    public function all()
    {
        return JobOffer::all();
    }

    public function create(array $data)
    {
        return JobOffer::create($data);
    }

    public function find($id)
    {
        return JobOffer::find($id);
    }

    public function update(JobOffer $jobOffer, array $data)
    {
        return $jobOffer->update($data);
    }

    public function delete(JobOffer $jobOffer)
    {
        return $jobOffer->delete();
    }

     public function searchAndPaginate(?string $search, int $perPage): LengthAwarePaginator
    {
        // On commence une nouvelle requête Eloquent
        $query =JobOffer ::query();

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
