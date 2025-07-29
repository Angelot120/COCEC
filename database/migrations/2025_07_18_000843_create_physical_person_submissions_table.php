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
        Schema::create('physical_person_submissions', function (Blueprint $table) {
            $table->id();

            // Step 1: Personal Information
            $table->string('last_name');
            $table->string('first_names');
            $table->string('gender', 1); // Ex. 'M', 'F'
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('nationality');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('phone')->nullable(); // Téléphone du membre
            $table->string('category')->nullable(); // Catégorie

            // Step 2: Additional Information
            $table->string('marital_status');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_phone')->nullable();
            $table->string('spouse_address')->nullable(); // Adresse du conjoint
            $table->string('occupation');
            $table->string('company_name_activity')->nullable();
            $table->string('activity_type')->nullable(); // Type d’activité (string, non enum)
            $table->text('activity_description')->nullable();

            // Step 3: Residence & KYC
            $table->text('residence_description');
            $table->string('residence_plan_path')->nullable();
            $table->decimal('residence_lat', 10, 7)->nullable();
            $table->decimal('residence_lng', 10, 7)->nullable();
            $table->text('workplace_description');
            $table->string('workplace_plan_path')->nullable();
            $table->decimal('workplace_lat', 10, 7)->nullable();
            $table->decimal('workplace_lng', 10, 7)->nullable();

            // Step 4: Documents & Identification
            $table->string('id_type');
            $table->string('id_number');
            $table->date('id_issue_date')->nullable(); // Date d’établissement
            $table->string('photo_path');
            $table->string('id_scan_path');
            $table->string('signature_method');
            $table->longText('signature_base64')->nullable();
            $table->string('signature_upload_path')->nullable();

            // Step 5: Payments
            $table->decimal('initial_deposit', 15, 2)->default(0); // Dépôt initial

            // Additional Information (réservé à l’institution)
            $table->date('membership_date')->nullable(); // Date d’adhésion
            $table->string('account_number')->nullable(); // N° de compte
            $table->date('account_opening_date')->nullable(); // Date d’ouverture
            $table->boolean('is_ppe_national')->default(false); // PPE national (OUI/NON)
            $table->string('ppe_foreign')->nullable(); // PPE étranger
            $table->string('sanctions')->nullable(); // Sanctions financières
            $table->string('terrorism_financing')->nullable(); // Financement du terrorisme
            $table->text('remarks')->nullable(); // Remarques particulières

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_person_submissions');
    }
};
