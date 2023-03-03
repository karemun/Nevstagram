<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Revisa que el usuario este autenticado antes de redirigirlo a index
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user) {
        return view('dashboard', [
            'user' => $user         //Pasa la informacion del usuario
        ]);
    }
}
