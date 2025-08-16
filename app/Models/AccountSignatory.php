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
        'signature_method',
        'signature_base64',
        'signature_upload_path',
    ];

    public function moralPersonSubmission(): BelongsTo
    {
        return $this->belongsTo(MoralPersonSubmission::class);
    }
}
