<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dependencias', function (Blueprint $table) {
            $table->integer('id_dependencia');
            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dependencias');
    }
};