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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('user_id');
            $table->foreignUuid('siswa_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('tunggakan_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('tgl_bayar');
            $table->string('bulan_dibayar');
            $table->string('nisn');
            $table->integer('jumlah_bayar');
            $table->integer('total');
            $table->string('status')->default('Lunas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
