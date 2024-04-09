<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratop2 extends Model
{
    use HasFactory;
    protected $table = 'contratop2s';

    protected $fillable = [
        'id_contratop2',
        'id_contratop1',
        'id_asignatura',
        'grupo',
        'total_horas_clase',
        'total_horas_asesoria',
        'total_horas_evaluacion'
    ];
}
