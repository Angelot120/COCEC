<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MoralPersonSubmission extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'company_name',
        'category',
        'rccm',
        'company_id_type',
        'company_id_number',
        'company_id_date',
        'creation_date',
        'creation_place',
        'activity_sector',
        'activity_description',
        'company_nationality',
        'company_phone',
        'company_postal_box',
        'company_city',
        'company_neighborhood',
        'company_address',
        'company_plan_path',
        'company_lat',
        'company_lng',
        'director_name',
        'director_first_name',
        'director_position',
        'director_gender',
        'director_nationality',
        'director_birth_date',
        'director_birth_place',
        'director_id_number',
        'director_id_issue_date',
        'director_phone',
        'director_father_name',
        'director_mother_name',
        'director_postal_box',
        'director_city',
        'director_neighborhood',
        'director_address',
        'director_spouse_name',
        'director_spouse_occupation',
        'director_spouse_phone',
        'director_spouse_address',
        'minutes_members',
        'minutes_meeting',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_address',
        'company_document_path',
        'responsible_persons_photo_path',
        'signature_method',
        'signature_base64',
        'signature_upload_path',
        'initial_deposit',
        'membership_date',
        'account_number',
        'account_opening_date',
        'is_ppe_national',
        'ppe_foreign',
        'sanctions',
        'terrorism_financing',
        'remarks',
        'statut',
    ];

    protected $casts = [
        'company_id_date' => 'date',
        'creation_date' => 'date',
        'director_birth_date' => 'date',
        'director_id_issue_date' => 'date',
        'membership_date' => 'date',
        'account_opening_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the beneficiaries for this moral person submission.
     */
    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class);
    }

    /**
     * Get the mandatories for this moral person submission.
     */

    public function coDirectors(): HasMany
    {
        return $this->hasMany(CoDirector::class);
    }

    public function accountSignatories(): HasMany
    {
        return $this->hasMany(AccountSignatory::class);
    }
}
