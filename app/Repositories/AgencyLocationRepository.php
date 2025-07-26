<?php

namespace App\Repositories;

use App\Interfaces\AgencyLocationInterface;
use App\Models\AgencyLocation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AgencyLocationRepository implements AgencyLocationInterface
{
    public function searchAndPaginate(?string $search, int $perPage): LengthAwarePaginator
    {
        $query = AgencyLocation::query();
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('address', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
        }
        return $query->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function find(string $id)
    {
        return AgencyLocation::findOrFail($id);
    }

    public function create(array $data)
    {
        return AgencyLocation::create($data);
    }

    public function update($agency, array $data)
    {
        return $agency->update($data);
    }

    public function delete($agency)
    {
        return $agency->delete();
    }
}

