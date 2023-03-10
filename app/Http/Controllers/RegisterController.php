<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        //dd('Post...'); dd($request); //Acceder a todos los valores

        //Recibe los datos y modifica username a url, sin espacios y con minusculas)
        $request->request->add(['username' => Str::slug($request->username)]);

        //Requerimientos
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        //Si pasa la validacion, se crea el usuario
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make( $request->password ), //Cifrar password
        ]);

        //Otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));

        //Redireccionar
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
