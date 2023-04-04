<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Informacion que tiene que leer y procesar
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
    ];

    //Definir relacion BD
    public function user()
    {
        //Un Post pertenece a un Usuario, solo muestra esas dos columnas
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    public function comentarios()
    {
        //Relacion N->M
        return $this->hasMany(Comentario::class);
    }
}
