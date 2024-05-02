<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialSeguimiento extends Model
{
    use HasFactory;
    protected $table = 'historial_seguimiento';
    protected $fillable = [
        'id_informe_historial',
        'id_usuarios_historial',
    ];
}
