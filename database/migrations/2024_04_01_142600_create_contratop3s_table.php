<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contratop3s', function (Blueprint $table) {
            $table->integer('id_contratop3');
            $table->integer('id_contratop2');
            $table->integer('id_estado_contrato');
            $table->integer('total_horas');
            $table->integer('valor_total');
            $table->date('fecha_contrato');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contratop3s');
    }
};
