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
        Schema::table('account_signatories', function (Blueprint $table) {
            $table->string('signature_method')->nullable()->after('id_number'); // 'draw' or 'upload'
            $table->longText('signature_base64')->nullable()->after('signature_method'); // Signature dessinée
            $table->string('signature_upload_path')->nullable()->after('signature_base64'); // Chemin de la signature uploadée
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('account_signatories', function (Blueprint $table) {
            $table->dropColumn(['signature_method', 'signature_base64', 'signature_upload_path']);
        });
    }
};
