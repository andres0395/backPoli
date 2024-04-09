<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipc extends Model
{
    use HasFactory;
    protected $table = 'ipcs';

    protected $fillable = [
        'id_ipc',
        'id_usuario',
        'porcentaje',
        'fecha_aplicacion'
    ];
}
