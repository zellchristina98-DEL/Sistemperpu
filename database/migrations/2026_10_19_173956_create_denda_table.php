<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('denda', function (Blueprint $table) {
            $table->id('IDDenda');
            $table->unsignedBigInteger('IDPeminjaman'); // Ubah dari integer menjadi unsignedBigInteger
            $table->string('AlasanDenda', 150);
            $table->decimal('JumlahDenda', 10, 2);
            $table->string('StatusBayar', 30);
            $table->timestamps();

            // Foreign Key
            $table->foreign('IDPeminjaman')->references('IDPeminjaman')->on('peminjaman')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('denda');
    }
};