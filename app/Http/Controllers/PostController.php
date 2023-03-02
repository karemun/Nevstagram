<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //Revisa que el usuario este autenticado antes de redirigirlo a index
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        //dd(auth()->user());
        return view('dashboard');
    }
}
