<?php

namespace App\Repositories;

use App\Interfaces\JobInterface;
use App\Models\JobApplication;

class JobRepository implements JobInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(array $data)
    {
        return JobApplication::create($data);
    }
}
