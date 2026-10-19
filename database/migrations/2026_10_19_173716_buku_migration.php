<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id('IDBuku');
            $table->string('JudulBuku', 150);
            $table->string('Pengarang', 100);
            $table->string('Penerbit', 100);
            $table->integer('TahunTerbit');
            $table->integer('Stok');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};