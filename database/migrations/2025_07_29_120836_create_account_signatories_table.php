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
        Schema::create('account_signatories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('moral_person_submission_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('signature_type'); // 'unique' or 'conjointe'
            $table->string('id_number')->nullable(); // N° CNI
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_signatories');
    }
};
