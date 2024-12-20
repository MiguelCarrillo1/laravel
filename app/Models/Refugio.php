<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refugio extends Model {
    use HasFactory;

    protected $table='refugio';
    protected $primaryKey='id_refugio';
    public $timestamps=false;


    protected $fillable = [
        'nombre_refugio',
        'tipo_refugio',
        'direccion',
        'ubicacion',
        'descripcion',
        'capacidad_maxima',
        'capacidad_actual',
        'telefono',
        'contacto',
        'estado',
        'recursos_disponibles',
        'imagen',
    ];
}
