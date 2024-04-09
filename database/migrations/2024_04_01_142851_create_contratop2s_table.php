<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('contratop2s', function (Blueprint $table) {
            $table->integer('id_contratop2');
            $table->integer('id_contratop1');
            $table->string('id_asignatura');
            $table->integer('grupo');
            $table->integer('total_horas_clase');
            $table->integer('total_horas_asesoria');
            $table->integer('total_horas_evaluacion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contratop2s');
    }
};
