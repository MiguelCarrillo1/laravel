<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    use HasFactory;

    // Tabla asociada
    protected $table = 'respuestas';
    protected $primaryKey='id_respuesta';
    public $timestamps=false;

    // Atributos asignables en masa
    protected $fillable = [
        'id_publicacion',
        'id_usuario',
        'contenido',
    ];

    // Relación con el mensaje
    public function publicaciones()
    {
        return $this->belongsTo(publicaciones::class, 'id_publicacion');
    }

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}