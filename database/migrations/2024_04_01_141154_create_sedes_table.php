<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->integer('id_sede');
            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sedes');
    }
};
