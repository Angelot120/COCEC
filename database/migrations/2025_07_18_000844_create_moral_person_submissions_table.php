<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('moral_person_submissions', function (Blueprint $table) {
            $table->id();

            // Step 1: Entity Information
            $table->string('company_name');
            $table->string('category')->nullable(); // Catégorie
            $table->string('rccm');
            $table->string('company_id_type')->nullable(); // Type de pièce d’identification
            $table->string('company_id_number')->nullable(); // Numéro de pièce
            $table->date('company_id_date')->nullable(); // Date d’enregistrement
            $table->date('creation_date');
            $table->string('creation_place');
            $table->string('activity_sector');
            $table->text('activity_description')->nullable(); // Description de l’activité
            $table->string('company_nationality');
            $table->string('company_phone');
            $table->string('company_postal_box')->nullable(); // Boîte postale
            $table->string('company_city')->nullable(); // Ville
            $table->string('company_neighborhood')->nullable(); // Quartier
            $table->text('company_address'); // Adresse générale
            $table->string('company_plan_path')->nullable(); // Schéma/plan
            $table->decimal('company_lat', 10, 7)->nullable(); // Coordonnées
            $table->decimal('company_lng', 10, 7)->nullable();

            // Step 2: Director Information
            $table->string('director_name');
            $table->string('director_first_name')->nullable(); // Prénoms du dirigeant
            $table->string('director_position');
            $table->string('director_gender', 1);
            $table->string('director_nationality');
            $table->date('director_birth_date');
            $table->string('director_birth_place');
            $table->string('director_id_number');
            $table->date('director_id_issue_date')->nullable(); // Date d’émission pièce
            $table->string('director_phone');
            $table->string('director_father_name')->nullable();
            $table->string('director_mother_name')->nullable();
            $table->string('director_postal_box')->nullable(); // Boîte postale
            $table->string('director_city')->nullable(); // Ville
            $table->string('director_neighborhood')->nullable(); // Quartier
            $table->text('director_address')->nullable(); // Adresse
            $table->string('director_spouse_name')->nullable(); // Conjoint(e)
            $table->string('director_spouse_occupation')->nullable();
            $table->string('director_spouse_phone')->nullable();
            $table->text('director_spouse_address')->nullable();

            // Step 3: Minutes
            $table->string('minutes_members');
            $table->string('minutes_meeting');

            // Step 4: Emergency Contact
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone');
            $table->text('emergency_contact_address')->nullable(); // Adresse contact urgence

            // Step 5: Documents & Signature
            $table->string('company_document_path');
            $table->string('responsible_persons_photo_path');
            $table->string('signature_method'); // 'draw' or 'upload'
            $table->longText('signature_base64')->nullable();
            $table->string('signature_upload_path')->nullable();

            // Step 6: Payments
            $table->decimal('initial_deposit', 15, 2)->default(0);

            // Step 7: Reserved Information
            $table->date('membership_date')->nullable(); // Date d’adhésion
            $table->string('account_number')->nullable(); // N° de compte
            $table->date('account_opening_date')->nullable(); // Date d’ouverture
            $table->boolean('is_ppe_national')->default(false); // PPE national
            $table->string('ppe_foreign')->nullable(); // PPE étranger
            $table->string('sanctions')->nullable(); // Sanctions financières
            $table->string('terrorism_financing')->nullable(); // Financement terrorisme
            $table->text('remarks')->nullable(); // Remarques particulières

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moral_person_submissions');
    }
};
