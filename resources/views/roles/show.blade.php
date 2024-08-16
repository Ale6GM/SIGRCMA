@extends('layouts.app')

@section('title')
Detalles Rol
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ ucfirst($role->name) }} Rol</h5>

            <div class="container mt-4">
                <table class="table table-striped">
                    <thead>
                        <th scope="col" width="20%">Nombre</th>
                        <th scope="col" width="1%">Guarda</th>
                    </thead>

                    @foreach($rolePermissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                    </tr>
                    @endforeach
                </table>
                <div class="mt-4">
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Editar</a>
                    <a href="{{ route('roles.index') }}" class="btn btn-default">Atras</a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection