<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CoDirector extends Model
{
    protected $fillable = [
        'moral_person_submission_id',
        'name',
        'first_name',
        'gender',
        'nationality',
        'birth_date',
        'birth_place',
        'id_number',
        'id_issue_date',
        'postal_box',
        'city',
        'neighborhood',
        'address',
        'phone',
    ];

    public function moralPersonSubmission(): BelongsTo
    {
        return $this->belongsTo(MoralPersonSubmission::class);
    }
}
