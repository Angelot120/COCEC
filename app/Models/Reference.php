<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reference extends Model
{
    //
    protected $fillable = [
        'physical_person_submission_id',
        'name',
        'phone',
    ];

    public function physicalPersonSubmission(): BelongsTo
    {
        return $this->belongsTo(PhysicalPersonSubmission::class);
    }
}
