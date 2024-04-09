<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->string('id_asignatura');
            $table->string('id_abreviatura');
            $table->string('id_tipo_asignatura');
            $table->string('nombre');
            $table->integer('horas_clase');
            $table->integer('horas_asesoria');
            $table->integer('horas_evaluacion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asignaturas');
    }
};
