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
            $table->string('kategori')->nullable()->after('peserta_id');
            $table->string('nama_tim')->nullable()->after('kategori');
            $table->text('anggota')->nullable()->after('nama_tim');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kompetisi_peserta', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'nama_tim', 'anggota']);
        });
    }
};
