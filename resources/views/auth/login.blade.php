@extends('layouts.app')

@section('titulo')
    Iniciar Sesión
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-8 md:items-center">
        <div class="md:w-5/12">
            <img src="{{ asset('/img/logo.PNG') }}" alt="Imagen de inicio de sesión" />
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Si hay un mensaje -->
            @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ session('mensaje') }}
                </p>
            @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input id="email" name="email" type="text" placeholder="Tu Email" class="border p-3 w-full rounded-lg
                    @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}"/>
                    
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input id="password" name="password" type="password" placeholder="Tu Contraseña" class="border p-3 w-full rounded-lg
                    @error('password') border-red-500 @enderror"/>

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"><label class="text-gray-500 text-sm">Mantener sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
            </form>
        </div>
    </div>
@endsection
