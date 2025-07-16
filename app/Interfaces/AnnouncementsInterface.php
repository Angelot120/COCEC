<?php

namespace App\Interfaces;

interface AnnouncementsInterface
{
    //
    public function create(array $data);
    public function edit(int $id, array $data);
    public function destroy(int $id);
}
