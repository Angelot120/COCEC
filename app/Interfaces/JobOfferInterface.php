<?php

namespace App\Interfaces;

use App\Models\JobOffer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface JobOfferInterface
{
    //
         public function all();
    public function create(array $data);
    public function find($id);
    public function update(JobOffer $jobOffer, array $data);
    public function delete(JobOffer $jobOffer);

    public function searchAndPaginate(?string $search, int $perPage): LengthAwarePaginator;

}
