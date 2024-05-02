<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminados extends Model
{
    use HasFactory;
    protected $table = 'terminados';
    protected $fillable = [
        'id_informe_terminado',
        'id_usuario_terminado',
    ];
}
