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
                    Nombre: {{ $user->name }}
                </div>
                <div>
                    Correo: {{ $user->email }}
                </div>
                <div>
                    Nombre de Usuario: {{ $user->username }}
                </div>

                <div class="mt-4">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Editar</a>
                    <a href="{{ route('users.index') }}" class="btn btn-default">Atras</a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection