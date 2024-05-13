<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    use HasFactory;
    protected $table = 'reportes';

    protected $fillable = [
        'id_usuario',
        'fecha_reporte',
        'fecha_contrato',
    ];
}
