<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        //Recibe los datos y modifica username a url, sin espacios y con minusculas)
        $request->request->add(['username' => Str::slug($request->username)]);

        //Validaciones, se acepta el mismo, not_in:se escluyen nombres
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:editar-perfil'],
        ]);

        if($request->imagen) {
            $imagen = $request->file('imagen'); //Obtiene la imagen

            $nombreImagen = Str::uuid() . "." . $imagen->extension(); //Genera ID unicos para cada imagen

            $imagenServidor = Image::make($imagen); //Imagen que se guardara en el servidor, se procesa con clase
            $imagenServidor->fit(1000,1000); //Tamaño

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen; //Se crea la ruta de guardado

            $imagenServidor->save($imagenPath); //Se guarda la imagen
        }

        //Se busca el usuario que se esta modificando
        $usuario = User::find(auth()->user()->id);

        //Se modifica el usuario
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null; //Si no se subio imagen, la que ya estaba, sino, queda null
        $usuario->save();

        //Redireccionar a su perfil
        return redirect()->route('posts.index', $usuario->username);
    }
}
