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
   Schema::create('bukus', function (Blueprint $table) {
    $table->string('IDBuku')->primary(); 
    $table->string('JudulBuku');
    $table->string('KategoriBuku');
    $table->string('Bahasa');
    $table->string('Cover');
    $table->integer('Stok');
    $table->integer('JumlahHal');
    $table->year('TahunTerbit');
    $table->string('ISBN');
    $table->string('NamaPenulis');
    $table->foreignId('IDPenerbit')->constrained('penerbits', 'IDPenerbit');
    $table->string('LokasiRak');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
