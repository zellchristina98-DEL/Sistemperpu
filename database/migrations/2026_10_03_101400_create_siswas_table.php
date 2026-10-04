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
     Schema::create('siswas', function (Blueprint $table) {
    $table->id('IDSiswa');
    $table->string('NamaSiswa');
    $table->string('Rombel');
    $table->string('NIS');
    $table->foreignId('IDUser')->constrained('users', 'IDUser');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
