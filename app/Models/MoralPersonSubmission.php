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
        // Étape 1: Informations sur l'Entité
        'nom_entreprise',
        'rccm',
        'date_creation',
        'lieu_creation',
        'secteur_activite',
        'nationalite_entreprise',
        'tel_entreprise',
        'adresse_entreprise',
        'domicile_lat',
        'domicile_lng',

        // Étape 2: Informations sur le Dirigeant
        'nom_dirigeant',
        'poste_dirigeant',
        'sexe_dirigeant',
        'nationalite_dirigeant',
        'date_naissance_dirigeant',
        'lieu_naissance_dirigeant',
        'cni_dirigeant',
        'tel_dirigeant',
        'dirigeant_nom_pere',
        'dirigeant_nom_mere',

        // Étape 3: Procès-Verbal
        'pv_membres_de',
        'pv_reunis_en',

        // Étape 4: Contacts
        'contact_urgence_nom',
        'contact_urgence_tel',

        // Étape 5: Pièces Jointes & Signature
        'justificatif_entreprise_path',
        'photo_responsables_path',
        'signature_method',
        'signature_base64',
        'signature_upload_path',

        // Étape 6: Versements
        'depot_initial',
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
    public function mandatories(): HasMany
    {
        return $this->hasMany(Mandatory::class);
    }
}
