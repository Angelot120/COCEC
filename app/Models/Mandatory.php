<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mandatory extends Model
{
    //
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'moral_person_submission_id',
        'nom',
        'fonction_adresse',
        'cni',
    ];

    /**
     * Get the moral person submission that owns the mandatory.
     */
    public function moralPersonSubmission(): BelongsTo
    {
        return $this->belongsTo(MoralPersonSubmission::class);
    }
}
