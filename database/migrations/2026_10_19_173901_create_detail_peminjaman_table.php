<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->id('IDDetail');
            $table->unsignedBigInteger('IDPeminjaman'); // Ubah ke unsignedBigInteger
            $table->unsignedBigInteger('IDBuku'); // Ubah ke unsignedBigInteger
            $table->integer('Jumlah')->default(1);
            $table->timestamps();

            // Foreign Key
            $table->foreign('IDPeminjaman')->references('IDPeminjaman')->on('peminjaman')->onDelete('cascade');
            $table->foreign('IDBuku')->references('IDBuku')->on('buku')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_peminjaman');
    }
};