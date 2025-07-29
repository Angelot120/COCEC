<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountSignatory extends Model
{
    protected $fillable = [
        'moral_person_submission_id',
        'name',
        'signature_type',
        'id_number',
    ];

    public function moralPersonSubmission(): BelongsTo
    {
        return $this->belongsTo(MoralPersonSubmission::class);
    }
}
