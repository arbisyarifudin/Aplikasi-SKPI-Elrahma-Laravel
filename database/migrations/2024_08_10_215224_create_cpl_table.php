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
        Schema::create('cpl', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_kurikulum', 9);
            $table->foreignId('program_studi_id')->constrained('program_studi')->cascadeOnDelete();
            $table->json('data');
            $table->timestamps();
        });

        // delete kualifikasi_cpl column from program_studi table
        Schema::table('program_studi', function (Blueprint $table) {
            $table->dropColumn('kualifikasi_cpl');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpl');

        // add kualifikasi_cpl column to program_studi table
        Schema::table('program_studi', function (Blueprint $table) {
            $table->text('kualifikasi_cpl')->nullable();
        });
    }
};
