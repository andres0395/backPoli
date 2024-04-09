<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    use HasFactory;
    protected $table = 'reportes';

    protected $fillable = [
        'id_reporte',
        'id_usuario',
        'id_contratop3',
        'fecha_reporte'
    ];
}
