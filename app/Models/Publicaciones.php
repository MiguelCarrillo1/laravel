<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    use HasFactory;

    // Tabla asociada
    protected $table = 'publicaciones';
    protected $primaryKey='id_publicacion';
    public $timestamps=false;

    // Atributos asignables en masa
    protected $fillable = [
        'id_usuario',
        'contenido',
        'fecha_publicacion',
    ];

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Relación con las respuestas
    public function respuestas()
    {
        return $this->hasMany(Respuestas::class, 'id_publicacion');
    }
}
