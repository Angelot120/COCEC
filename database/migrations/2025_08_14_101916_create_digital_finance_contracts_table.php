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
        Schema::create('digital_finance_contracts', function (Blueprint $table) {
            $table->id();
            
            // Informations du client
            $table->string('full_name');
            $table->string('phone');
            $table->string('cni_type')->nullable(); // Type de document
            $table->string('cni_number');
            $table->text('address');
            $table->string('account_number');
            
            // Services souscrits
            $table->boolean('mobile_money')->default(false);
            $table->boolean('mobile_banking')->default(false);
            $table->boolean('web_banking')->default(false);
            $table->boolean('sms_banking')->default(false);
            
            // Informations contractuelles
            $table->date('contract_date');
            $table->enum('status', ['pending', 'active', 'terminated'])->default('pending');
            $table->text('notes')->nullable();
            
            // Métadonnées
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_finance_contracts');
    }
};
