<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contratop1s', function (Blueprint $table) {
            $table->integer('id_contratop1');
            $table->integer('id_categoria_contrato');
            $table->string('id_docente');
            $table->string('id_usuario');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('total_semanas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contratop1s');
    }
};
