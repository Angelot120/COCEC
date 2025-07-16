<?php

namespace App\Repositories;

use App\Interfaces\BlogInterface;
use App\Models\Blog;

class BlogRepository implements BlogInterface
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
        return Blog::create($data);
    }
    public function edit(int $id, array $data)
    {
        return Blog::findOrFail($id)->update($data);
    }
    public function destroy(int $id)
    {
        return Blog::destroy($id);
    }
}
