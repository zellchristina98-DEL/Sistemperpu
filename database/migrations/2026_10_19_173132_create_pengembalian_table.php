<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id('IDPengembalian');
            $table->unsignedBigInteger('IDPeminjaman'); // Ubah dari integer menjadi unsignedBigInteger
            $table->date('TglPengembalian');
            $table->string('KondisiBuku', 50);
            $table->timestamps();

            // Foreign Key
            $table->foreign('IDPeminjaman')->references('IDPeminjaman')->on('peminjaman')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};