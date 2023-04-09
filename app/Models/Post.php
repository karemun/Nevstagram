<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

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

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function checkLike(User $user)
    {
        //Revisa la tabla likes si contiene la columna user_id el user_id
        return $this->likes->contains('user_id', $user->id);
    }
}
