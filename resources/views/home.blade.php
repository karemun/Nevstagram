@extends('layouts.app')

@section('titulo')
    Principal
@endsection

@section('contenido')
    
    <!-- Componente: se pasa la variable posts -->
    <x-listar-post :posts="$posts"/>

@endsection
