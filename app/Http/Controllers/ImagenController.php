<?php
/** Intervention Image
 * https://image.intervention.io/v2/introduction/installation#integration-in-laravel
 */
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        $imagen = $request->file('file'); //Obtiene la imagen

        $nombreImagen = Str::uuid() . "." . $imagen->extension(); //Genera ID unicos para cada imagen

        $imagenServidor = Image::make($imagen); //Imagen que se guardara en el servidor, se procesa con clase
        $imagenServidor->fit(1000,1000); //Tamaño

        $imagenPath = public_path('uploads') . '/' . $nombreImagen; //Se crea la ruta de guardado

        $imagenServidor->save($imagenPath); //Se guarda la imagen

        return response()->json(['imagen' => $nombreImagen]);
    }
}
