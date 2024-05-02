<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;
    protected $table = 'seguimiento';
    protected $fillable = [
        'id_informe_seguimiento',
        'funcionario_generador',
        'funcionario_destino',
        'id_funcionario_generador',
        'id_funcionario_destino',
        'estado_seguimiento',
        'fecha_derivacion',
    ];
}
