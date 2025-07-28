<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FaqComment extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'parent_id',
        'name',
        'email',
        'body',
    ];

    /**
     * Récupère l'utilisateur qui a posté le commentaire.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Récupère les réponses à ce commentaire.
     */
    public function replies()
    {
        // Une commentaire a plusieurs réponses
        return $this->hasMany(FaqComment::class, 'parent_id')->latest();
    }
}
