<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->integer('id_reporte');
            $table->string('id_usuario');
            $table->integer('id_contratop3');
            $table->date('fecha_reporte');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
