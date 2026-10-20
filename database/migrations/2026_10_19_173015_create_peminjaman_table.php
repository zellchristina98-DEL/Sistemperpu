<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('IDPeminjaman');
            $table->unsignedBigInteger('IDSiswa'); 
            $table->unsignedBigInteger('IDPetugas'); 
            $table->date('TglPeminjaman');
            $table->string('Status', 50);
            $table->timestamps();

          
            $table->foreign('IDSiswa')->references('IDSiswa')->on('siswas')->onDelete('cascade');
            $table->foreign('IDPetugas')->references('IDPetugas')->on('petugas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};