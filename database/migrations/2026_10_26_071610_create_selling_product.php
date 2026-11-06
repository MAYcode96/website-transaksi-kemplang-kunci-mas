<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan', 30)->unique();   // contoh: INV-20261026-0001
            // Isi pesanan diambil dari detail_keranjang milik keranjang ini
            $table->foreignId('keranjang_id')->constrained('keranjang')->restrictOnDelete();

            // Data pembeli (tanpa login)
            $table->string('nama_pembeli', 100);
            $table->string('no_wa', 20);
            $table->text('alamat');
            $table->text('catatan')->nullable();

            $table->unsignedBigInteger('total');             // rupiah
            // pending, dibayar, dikirim, selesai, batal
            $table->string('status', 20)->default('pending')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};