<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratop3 extends Model
{
    use HasFactory;
    protected $table = 'contratop3s';

    protected $fillable = [
        'id_contratop3',
        'id_contratop2',
        'id_estado_contrato',
        'total_horas',
        'valor_total',
        'fecha_contrato'
    ];
}
