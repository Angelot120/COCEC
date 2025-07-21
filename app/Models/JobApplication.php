<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'intitule', // <-- AJOUTER ICI
        'application_type',
        'cv_path',
        'motivation_letter_path',
        'job_offer_id'
    ];
}
