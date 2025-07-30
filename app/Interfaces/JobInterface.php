<?php

namespace App\Interfaces;

interface JobInterface
{
    //
    public function create(array $data);
     public function searchAndPaginate(?string $search, int $perPage);
    public function find(string $id);
    public function delete($jobApplication);
}
