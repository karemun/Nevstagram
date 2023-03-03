{{-- Plantilla principal --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>NevStagram - @yield('titulo')</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        @vite('resources/css/app.css')
    </head>

    <body class="bg-gray-100">

        {{-- Header que contienen todas las paginas --}}
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    NevStagram
                </h1>

                <!-- Si existe un usuario autenticado -->
                @auth
                    <nav class="flex gap-2 items-center">
                        <a href="{{ route('post.index', ['user' => auth()->user()->username]) }}" class="font-bold text-gray-600 text-sm">
                            <span class="font-normal">{{auth()->user()->username}}</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                                Cerrar sesión
                            </button>
                        </form>
                    </nav>
                @endauth
                <!-- Si no -->
                @guest
                    <nav class="flex gap-2 items-center">
                        <a href="{{ route('login') }}" class="font-bold uppercase text-gray-600 text-sm">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">
                            Crear Cuenta
                        </a>
                    </nav>
                @endguest
            </div>
        </header>

        {{-- Informacion de cada vista --}}
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <!-- Pie de pagina -->
        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            Nevstagram - Todos los derechos reservados
            {{ now()->year }}
        </footer>

    </body>
</html>
