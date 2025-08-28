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
        Schema::table('job_applications', function (Blueprint $table) {
            $table->string('identity_document_path')->nullable()->after('motivation_letter_path');
            $table->string('passport_photo_path')->nullable()->after('identity_document_path');
            $table->string('identity_document_type')->nullable()->after('passport_photo_path');
            $table->string('identity_document_number')->nullable()->after('identity_document_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn([
                'identity_document_path',
                'passport_photo_path', 
                'identity_document_type',
                'identity_document_number'
            ]);
        });
    }
};
