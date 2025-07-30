<?php

namespace App\Repositories;

use App\Interfaces\JobInterface;
use App\Models\JobApplication;

class JobRepository implements JobInterface
{
    public function create(array $data)
    {
        return JobApplication::create($data);
    }

    public function searchAndPaginate(?string $search, int $perPage)
    {
        $query = JobApplication::whereNull('job_offer_id'); // Candidatures spontanées uniquement
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('intitule', 'like', '%' . $search . '%');
            });
        }
        return $query->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function find(string $id)
    {
        return JobApplication::findOrFail($id);
    }

    public function delete($jobApplication)
    {
        return $jobApplication->delete();
    }
}
