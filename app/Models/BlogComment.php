<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'user_id',
        'name',
        'email',
        'body',
        'parent_id'
    ];

    /**
     * Relation avec le blog
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     * Relation avec l'utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec le commentaire parent (pour les réponses)
     */
    public function parent()
    {
        return $this->belongsTo(BlogComment::class, 'parent_id');
    }

    /**
     * Relation avec les réponses
     */
    public function replies()
    {
        return $this->hasMany(BlogComment::class, 'parent_id');
    }

    /**
     * Scope pour les commentaires parents (pas de réponses)
     */
    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }
}
