<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dendas', function (Blueprint $table) {
            $table->id('IDDenda');
            $table->foreignId('IDPeminjaman')->constrained('peminjamans', 'IDPeminjaman')->cascadeOnDelete();
            $table->string('AlasanDenda');
            $table->unsignedBigInteger('JumlahDenda');
            $table->string('StatusBayar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dendas');
    }
};