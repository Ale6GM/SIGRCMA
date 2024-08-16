@extends('layouts.app')

@section('title')
Editar Permiso
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Editar Permiso</h5>

            <div class="container mt-4">

                <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input value="{{ $permission->name }}" type="text" class="form-control" name="name"
                            placeholder="Name" required>

                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Permsiso</button>
                    <a href="{{ route('permissions.index') }}" class="btn btn-default">Atras</a>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection