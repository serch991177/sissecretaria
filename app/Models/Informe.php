<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $table = 'informe';
    protected $fillable = [
        'id_usuario_generador',
        'usuario',
        'nombre_dirigido',
        'cargo_dirigido',
        'unidad_dirigido',
        'referencia',
        'tipo_informe',
        'fecha',
        'dato_informe',
        'observacion',
        'estado',
        'id_oficina',
        'oficina',
        'numero',
        'cite',
        'fecha_finalizacion',
        'fecha_creacion',
        'archivo_del_informe',
        'logo',
    ];
    protected $casts=[
        'usuario'=> 'array',
        
    ];
}
