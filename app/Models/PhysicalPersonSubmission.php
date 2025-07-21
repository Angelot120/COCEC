<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PhysicalPersonSubmission extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        // Étape 1: Informations Personnelles
        'nom',
        'prenoms',
        'sexe',
        'date_naissance',
        'lieu_naissance',
        'nationalite',
        'nom_pere',
        'nom_mere',

        // Étape 2: Informations Complémentaires
        'etat_civil',
        'nom_conjoint',
        'profession_conjoint',
        'tel_conjoint',
        'profession',
        'nom_entreprise_activite',
        'description_activite',
        'ref1_nom',
        'ref1_tel',

        // Étape 3: Domicile & KYC
        'description_domicile',
        'plan_domicile_path',
        'domicile_lat',
        'domicile_lng',
        'description_travail',
        'plan_travail_path',
        'travail_lat',
        'travail_lng',

        // Étape 4: Pièces Jointes & Identification
        'type_piece',
        'numero_piece',
        'photo_path',
        'scan_piece_path',
        'signature_method',
        'signature_base64',
        'signature_upload_path',

        // Étape 5: Versements
        'depot_initial',
    ];

    /**
     * Get the beneficiaries for this physical person submission.
     */
    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class);
    }
}
