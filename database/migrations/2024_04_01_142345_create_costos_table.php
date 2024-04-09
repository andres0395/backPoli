<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('costos', function (Blueprint $table) {
            $table->integer('id_costo');
            $table->integer('categoria');
            $table->integer('nivel');
            $table->integer('valor_hora');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('costos');
    }
};
