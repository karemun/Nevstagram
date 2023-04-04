@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">

        <!-- Seccion Post -->
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">

            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500"> {{ $post->created_at->diffForHumans() }} </p>
                <p class="mt-5"> {{$post->descripcion}} </p>
            </div>

            <!-- Boton eliminar publicacion -->
            @auth
                @if ($post->user_id === auth()->user()->id) <!-- Si el post es del usuario -->
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE') <!-- Metodo spoofing -->
                        @csrf
                        <input type="submit" value="Eliminar publicacion" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-5 cursor-pointer">
                    </form>
                @endif
            @endauth
        </div>

        <!-- Seccion Comentarios -->
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">

                <!-- Si esta autenticado, puede comentar -->
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{session('mensaje')}}
                        </div>
                    @endif

                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                                Añade un Comentario
                            </label>
        
                            <textarea id="comentario" name="comentario" placeholder="Agrega un comentario" class="border p-3 w-full rounded-lg 
                            @error('comentario') border-red-500 @enderror"></textarea>
        
                            {{-- Si una validacion falla, se muestran los errores --}}
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <input type="submit" value="Comentar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
                    </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    <!-- Si hay al menos un comentario -->
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentarios)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentarios->user) }}" class="font-bold">
                                    {{ $comentarios->user->username }}
                                </a>
                                <p>{{ $comentarios->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentarios->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No Hay Comentarios Aún</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection