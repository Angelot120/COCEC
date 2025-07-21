<?php

namespace App\Repositories;

use App\Interfaces\JobOfferInterface;
use App\Models\job;
use App\Models\JobOffer;

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
}
