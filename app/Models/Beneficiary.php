<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Beneficiary extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'physical_person_submission_id',
        'moral_person_submission_id',
        'nom',
        'contact',
        'lien',
        'birth_date',
    ];

    /**
     * Get the physical person submission that owns the beneficiary.
     */
    public function physicalPersonSubmission(): BelongsTo
    {
        return $this->belongsTo(PhysicalPersonSubmission::class);
    }

    public function moralPersonSubmission(): BelongsTo
    {
        return $this->belongsTo(MoralPersonSubmission::class);
    }
}
