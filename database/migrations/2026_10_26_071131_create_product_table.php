<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategory_id')
                ->constrained('kategory')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->string('berat', 20)->nullable();       // contoh: 250 gr
            $table->unsignedInteger('harga');              // rupiah, tanpa desimal
            $table->unsignedInteger('stok')->default(0);
            $table->string('gambar')->nullable();          // path di storage
            $table->boolean('aktif')->default(true);       // tampil di katalog atau tidak
            $table->timestamps();

            $table->index('nama');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};