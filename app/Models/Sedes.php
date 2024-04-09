<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    use HasFactory;
    protected $table = 'sedes';

    protected $fillable = [
        'id_sede',
        'nombre'
    ];
}