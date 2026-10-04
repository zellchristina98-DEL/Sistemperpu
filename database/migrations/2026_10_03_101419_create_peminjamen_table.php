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
     Schema::create('peminjaman', function (Blueprint $table) {
    $table->id('IDPeminjaman');
    $table->foreignId('IDSiswa')->constrained('siswas', 'IDSiswa');
    $table->date('TglPeminjaman');
    $table->string('Status');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
