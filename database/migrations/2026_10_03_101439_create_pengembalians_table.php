<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id('IDPengembalian');
            $table->foreignId('IDPeminjaman')->constrained('peminjamans', 'IDPeminjaman')->cascadeOnDelete();
            $table->date('TglPengembalian');
            $table->string('KondisiBuku');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};