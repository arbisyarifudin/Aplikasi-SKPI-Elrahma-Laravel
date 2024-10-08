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
        Schema::table('program_studi', function (Blueprint $table) {
            // add cpl column
            $table->text('kualifikasi_cpl')->nullable(); // TODO: delete this (use cpl table instead)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('program_studi', function (Blueprint $table) {
            $table->dropColumn('kualifikasi_cpl');
        });
    }
};
