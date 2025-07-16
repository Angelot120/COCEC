<?php

namespace App\Repositories;

use App\Models\Announcements;

class AnnouncementsRepository
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
        return Announcements::create($data);
    }
    public function edit(int $id, array $data)
    {
        return Announcements::findOrFail($id)->update($data);
    }
    public function destroy(int $id)
    {
        return Announcements::destroy($id);
    }

}
