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
        Schema::table('kompetisi_peserta', function (Blueprint $table) {
            $table->string('status', 20)->default('pending')->after('anggota');
            $table->text('catatan_admin')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kompetisi_peserta', function (Blueprint $table) {
            $table->dropColumn(['status', 'catatan_admin']);
        });
    }
};
