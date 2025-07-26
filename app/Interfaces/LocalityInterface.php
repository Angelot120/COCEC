<?php

namespace App\Interfaces;
use App\Models\Locality;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface LocalityInterface
{
    //
     public function all();
    public function create(array $data);
    public function find($id);
    public function update(Locality $locality, array $data);
    public function delete(Locality $locality);

    // / Ajouter la signature de la nouvelle méthode ici
    public function searchAndPaginate(?string $search, int $perPage): LengthAwarePaginator;
}
