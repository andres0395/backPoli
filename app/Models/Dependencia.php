<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;
    protected $table = 'dependencias';

    protected $fillable = [
        'id_dependencia',
        'nombre'
    ];
}
