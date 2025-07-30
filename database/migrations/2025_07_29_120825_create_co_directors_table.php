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
        Schema::create('co_directors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('moral_person_submission_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('first_name')->nullable(); // Prénoms
            $table->string('gender', 1);
            $table->string('nationality');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('id_number');
            $table->date('id_issue_date')->nullable();
            $table->string('postal_box')->nullable();
            $table->string('city')->nullable();
            $table->string('neighborhood')->nullable();
            $table->text('address')->nullable();
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co_directors');
    }
};
