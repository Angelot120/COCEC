<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'author',
        'image',
        'is_published',
    ];

    /**
     * Relation avec les commentaires
     */
    public function comments()
    {
        return $this->hasMany(BlogComment::class)->parents();
    }
}
