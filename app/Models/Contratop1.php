<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratop1 extends Model
{
    use HasFactory;
    protected $table = 'contratop1s';

    protected $fillable = [
        'id_contratop1',
        'id_categoria_contrato',
        'id_docente',
        'id_usuario',
        'fecha_inicio',
        'fecha_fin',
        'total_semanas',
        'id_dependencia',
        'fecha_contrato',
        'valor_hora',
        'valor_total',
        'asignatura',
        'estado'
    ];
}
