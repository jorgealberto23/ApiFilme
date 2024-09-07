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
        Schema::create('tbl_empresas', function (Blueprint $table) {
            $table->id("codigo");
            $table->string("nomeEmpresa", 50);
            $table->string("donoEmpresa", 50);
            $table->date("anoEmpresa");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_empresas');
    }
};
