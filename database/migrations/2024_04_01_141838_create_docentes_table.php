<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->string('id_docente');
            $table->integer('id_genero');
            $table->string('nombre');
            $table->integer('nivel');
            $table->integer('categoria');
            $table->string('estudios');
            $table->integer('valor_hora');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
