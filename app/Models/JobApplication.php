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
        'identity_document_path',
        'passport_photo_path',
        'identity_document_type',
        'identity_document_number',
        'job_offer_id'
    ];

    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class);
    }
}
