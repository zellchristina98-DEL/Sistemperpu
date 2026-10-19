<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->id('IDPetugas');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('IDJabatan');
            $table->string('nama_petugas', 100);
            $table->string('Gender', 20);
            $table->string('level', 30);
            $table->timestamps();

 
            $table->foreign('idUser')->references('iduser')->on('users')->onDelete('cascade');
            $table->foreign('IDJabatan')->references('IDJabatan')->on('jabatans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};