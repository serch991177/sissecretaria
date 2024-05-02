<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficinas extends Model
{   
    use HasFactory;
    protected $table = 'oficinas';
    protected $fillable = [
        'numero',
        'nombre_oficina',
        'nombre_oficina_superior',
        'estado'
    ];
}
