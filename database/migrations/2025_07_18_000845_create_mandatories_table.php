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
        Schema::create('mandatories', function (Blueprint $table) {
            $table->id();

            // Un membre mandaté appartient toujours à une soumission de personne morale.
            $table->foreignId('moral_person_submission_id')->constrained()->onDelete('cascade');

            $table->string('nom');
            $table->string('fonction_adresse');
            $table->string('cni');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandatories');
    }
};
