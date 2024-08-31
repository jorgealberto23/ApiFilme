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
        Schema::create('tbl_filmes',function (Blueprint $table) {
            $table->id("codigo");
            $table->string("nomeFilme", 50);
            $table->string("generoFilme", 25);
            $table->string("classificacaoFilme", 3);
            $table->string("empressaFilme", 50);
            $table->date("anoFilme");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_filmes');
    }
};
