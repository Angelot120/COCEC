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
            $table->string('gender', 1);
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('nationality');
            $table->string('father_name');
            $table->string('mother_name');

            // Step 2: Additional Information
            $table->string('marital_status');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_phone')->nullable();
            $table->string('occupation');
            $table->string('company_name_activity')->nullable();
            $table->text('activity_description')->nullable();
            $table->string('ref1_name');
            $table->string('ref1_phone');

            // Step 3: Residence & KYC
            $table->text('residence_description');
            $table->string('residence_plan_path')->nullable();
            $table->text('workplace_description');
            $table->string('workplace_plan_path')->nullable();

            $table->decimal('residence_lat', 10, 7)->nullable()->after('residence_plan_path');
            $table->decimal('residence_lng', 10, 7)->nullable()->after('residence_lat');
            $table->decimal('workplace_lat', 10, 7)->nullable()->after('workplace_plan_path');
            $table->decimal('workplace_lng', 10, 7)->nullable()->after('workplace_lat');

            // Step 4: Documents & Identification
            $table->string('id_type');
            $table->string('id_number');
            $table->string('photo_path');
            $table->string('id_scan_path');
            $table->string('signature_method'); // 'draw' or 'upload'
            $table->longText('signature_base64')->nullable();
            $table->string('signature_upload_path')->nullable();

            // Step 5: Payments
            $table->decimal('initial_deposit', 15, 2)->default(0);

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
