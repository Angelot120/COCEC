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
            $table->string('rccm');
            $table->date('creation_date');
            $table->string('creation_place');
            $table->string('activity_sector');
            $table->string('company_nationality');
            $table->string('company_phone');
            $table->string('company_address');

            $table->decimal('residence_lat', 10, 7)->nullable()->after('company_address');
            $table->decimal('residence_lng', 10, 7)->nullable()->after('residence_lat');

            // Step 2: Director Information
            $table->string('director_name');
            $table->string('director_position');
            $table->string('director_gender', 1);
            $table->string('director_nationality');
            $table->date('director_birth_date');
            $table->string('director_birth_place');
            $table->string('director_id_number');
            $table->string('director_phone');
            $table->string('director_father_name')->nullable();
            $table->string('director_mother_name')->nullable();

            // Step 3: Minutes
            $table->string('minutes_members');
            $table->string('minutes_meeting');

            // Step 4: Contacts
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone');

            // Step 5: Documents & Signature
            $table->string('company_document_path');
            $table->string('responsible_persons_photo_path');
            $table->string('signature_method'); // 'draw' or 'upload'
            $table->longText('signature_base64')->nullable();
            $table->string('signature_upload_path')->nullable();

            // Step 6: Payments
            $table->decimal('initial_deposit', 15, 2)->default(0);

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
