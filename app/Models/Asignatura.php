<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $table = 'asignaturas';

    protected $fillable = [
        'id_asignatura',
        'id_abreviatura',
        'id_tipo_asignatura',
        'nombre',
        'horas_clase',
        'horas_asesoria',
        'horas_evaluacion',
        'servicio'
    ];
}
