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
        Schema::create('tunggakans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('siswa_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('spp_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('bulan');
            $table->string('total_tunggakan');
            $table->string('sisa_tunggakan');
            $table->string('sisa_bulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tunggakans');
    }
};
