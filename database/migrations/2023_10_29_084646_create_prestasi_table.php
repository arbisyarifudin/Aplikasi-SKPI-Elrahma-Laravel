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
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa', 'id')->cascadeOnDelete();
            $table->string('nama'); // nama lomba / kegiatan
            $table->string('tingkat'); // kota, provinsi, nasional, dll
            $table->year('tahun');
            $table->string('penyelenggara');
            $table->string('tempat', 255);
            $table->string('pencapaian'); // juara 1, juara 2, juara 3, harapan 1, dll
            $table->string('file_sertifikat', 255)->nullable(); // file sertifikat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
