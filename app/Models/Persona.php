<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model{
    use HasFactory;

    protected $table='persona';
    protected $primaryKey='id_persona';
    public $timestamps=false;

    public function user(){
        return $this->belongsTo(User::class, 'id_usuario');
    }


    protected $fillable = [
        'nombre',
        'apellido',
        'id_usuario',
        'foto_perfil',
        'tipo_documento',
        'num_documento',
        'fecha_nacimiento',
        'sexo',
        'nacionalidad',
        'discapacidad',
        'patologia',
        'tipo_sanguineo',
        'direccion',
        'telefono',
        'email',
        'estado',
    ];
}
