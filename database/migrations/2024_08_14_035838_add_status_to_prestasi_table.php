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
        Schema::table('prestasi', function (Blueprint $table) {
            $table->string('status')->default('Diproses'); // Diproses, Diterima, Ditolak
            $table->string('catatan_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prestasi', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('catatan_status');
        });
    }
};
