<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        //dd('Post...'); dd($request); //Acceder a todos los valores
        //Validacion
        $this->validate($request, [
            'name' => 'required|max:30',
        ]);
    }
}
