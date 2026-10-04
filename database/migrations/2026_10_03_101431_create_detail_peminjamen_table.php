<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
Schema::create('detail_peminjamans', function (Blueprint $table) {
            $table->id('IDDetail');
            $table->foreignId('IDPeminjaman')->constrained('peminjamans', 'IDPeminjaman')->cascadeOnDelete();
            $table->string('IDBuku');
            $table->foreign('IDBuku')->references('IDBuku')->on('bukus')->onDelete('cascade');
            $table->integer('Jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_peminjamen');
    }
};
