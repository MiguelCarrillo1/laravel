<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterRefugio extends Model{
    use HasFactory;

    protected $table='registro_refugio_usuario';
    protected $primaryKey='id_registro';
    public $timestamps=false;

    public function refugio()
    {
        return $this->belongsTo(Refugio::class, 'id_refugio');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    protected $fillable = [
        'id_usuario',
        'id_refugio',
        'estado',
        'fecha_registro',
    ];
}
