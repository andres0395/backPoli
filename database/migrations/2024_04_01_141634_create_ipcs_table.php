<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ipcs', function (Blueprint $table) {
            $table->integer('id_ipc');
            $table->string('id_usuario');
            $table->float('porcentaje');
            $table->date('fecha_aplicacion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ipcs');
    }
};
