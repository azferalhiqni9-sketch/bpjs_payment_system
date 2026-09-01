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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->constrained('peserta_bpjs')->onDelete('cascade');
            $table->string('bulan_tahun', 7); // Contoh: 2026-09
            $table->decimal('nominal', 10, 2);
            $table->enum('status_pembayaran', ['Belum Lunas', 'Menunggu Verifikasi', 'Lunas'])->default('Belum Lunas');
            $table->date('tanggal_bayar')->nullable();
            $table->string('bukti_transfer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};