<?php
namespace App\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AgencyLocationInterface
{
    public function searchAndPaginate(?string $search, int $perPage): LengthAwarePaginator;

    public function find(string $id);
    public function create(array $data);
    public function update($agency, array $data);
    public function delete($agency);
}
