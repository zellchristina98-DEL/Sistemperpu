<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id('IDSiswa');
      $table->unsignedBigInteger('idUser');
            $table->string('NamaSiswa', 100);
            $table->string('Rombel', 50);
            $table->string('NIS', 50);
            $table->timestamps();

         
            $table->foreign('idUser')->references('iduser')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};