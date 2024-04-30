<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $table = 'periodo_academico';

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'detalle',
        'total_semanas',
        'fecha_inicio_pp',
        'fecha_fin_pp',
        'fecha_inicio_sp',
        'fecha_fin_sp',
        'fecha_inicio_santa',
        'fecha_fin_santa'
    ];
}
