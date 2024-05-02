<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisor extends Model
{
    use HasFactory;
    protected $table = 'revisor';
    protected $fillable = [
            'id_informe',
            'id_usuario_revisor',
            'nombre_revisor',
            'numero_generador',
            'fecha_generador',
            'referencia_generada',
            'dirigido_nombre',
            'dirigido_cargo',
            'dirigido_unidad',
            'observacion_revisor',
            'estado_revisor',
            'oficina_revisor',
            'nombre_del_generador',
            'cargo_del_generador',
            'unidad_del_generador',
    ];
}
