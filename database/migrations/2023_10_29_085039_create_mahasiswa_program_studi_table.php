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
        Schema::create('mahasiswa_program_studi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa', 'id')->cascadeOnDelete();
            $table->foreignId('program_studi_id')->constrained('program_studi', 'id')->cascadeOnDelete();
            $table->year('tahun_masuk');
            $table->year('tahun_lulus')->nullable();
            $table->string('nomor_ijazah', 100)->nullable();
            $table->string('gelar', 100)->nullable();
            $table->string('gelar_en', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_program_studi');
    }
};
