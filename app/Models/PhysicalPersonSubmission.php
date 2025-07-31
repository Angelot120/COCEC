<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PhysicalPersonSubmission extends Model
{
    //
    use HasFactory;
    
    protected $casts = [
        'birth_date' => 'date',
        'id_issue_date' => 'date',
        'membership_date' => 'date',
        'account_opening_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    protected $fillable = [
        'last_name',
        'first_names',
        'gender',
        'birth_date',
        'birth_place',
        'nationality',
        'father_name',
        'mother_name',
        'phone',
        'category',
        'marital_status',
        'spouse_name',
        'spouse_occupation',
        'spouse_phone',
        'spouse_address',
        'occupation',
        'company_name_activity',
        'activity_type',
        'activity_description',
        'residence_description',
        'residence_plan_path',
        'residence_lat',
        'residence_lng',
        'workplace_description',
        'workplace_plan_path',
        'workplace_lat',
        'workplace_lng',
        'id_type',
        'id_number',
        'id_issue_date',
        'photo_path',
        'id_scan_path',
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

    /**
     * Get the beneficiaries for this physical person submission.
     */
    public function references(): HasMany
    {
        return $this->hasMany(Reference::class);
    }

    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class);
    }
}
