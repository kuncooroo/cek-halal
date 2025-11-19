<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('nama_produsen');
            $table->string('nomor_sertifikat_halal')->unique();
            $table->string('barcode')->nullable()->unique();
            $table->date('tanggal_terbit');
            $table->date('tanggal_kadaluarsa');
            $table->string('kategori')->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};