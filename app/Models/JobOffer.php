<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    //
    use HasFactory;
    protected $fillable = ['title', 'description', 'type', 'status','bref_description'];

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
