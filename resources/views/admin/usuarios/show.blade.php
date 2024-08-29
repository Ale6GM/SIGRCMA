@extends('layouts.app')

@section('title')
Detalles Usuario
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalles Usuario</h5>

            <div class="container mt-4">
                <div>
                    Nombre: {{ $usuario->name }}
                </div>
                <div>
                    Correo: {{ $usuario->email }}
                </div>
                <div>
                    Nombre de Usuario: {{ $usuario->username }}
                </div>

                <div class="mt-4">
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-info">Atras</a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection