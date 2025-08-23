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
        Schema::create('digital_finance_updates', function (Blueprint $table) {
            $table->id();
            
            // Informations client
            $table->string('account_number')->nullable();
            $table->string('cni_number')->nullable();
            $table->string('cni_type')->nullable(); // CNI ou autre
            $table->string('full_name');
            
            // Contacts du client
            $table->string('email')->nullable();
            $table->string('togocel')->nullable();
            $table->string('tmoney')->nullable();
            $table->string('whatsapp_togocel')->nullable();
            $table->string('moov')->nullable();
            $table->string('flooz')->nullable();
            $table->string('whatsapp_moov')->nullable();
            
            // Souscription aux services
            $table->boolean('mobile_banking_togocel')->default(false);
            $table->boolean('mobile_banking_moov')->default(false);
            $table->boolean('mobile_money_togocel')->default(false);
            $table->boolean('mobile_money_moov')->default(false);
            $table->boolean('web_banking_togocel')->default(false);
            $table->boolean('web_banking_moov')->default(false);
            
            // Bonus
            $table->boolean('sms_banking_togocel')->default(false);
            $table->boolean('sms_banking_moov')->default(false);
            
            // Signatures
            $table->string('client_signature')->nullable();
            $table->string('agency_manager_signature')->nullable();
            
            // Informations supplémentaires
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_finance_updates');
    }
};
