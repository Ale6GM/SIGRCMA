@extends('layouts.app')

@section('title')
Crear Permiso
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Permiso</h5>

            <div class="container mt-4">

                <form method="POST" action="{{ route('permissions.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Nombre"
                                required>
    
                            @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
    
                        <div class="col-6 mb-3">
                            <label for="name" class="form-label">Descripción</label>
                            <input value="{{ old('description') }}" type="text" class="form-control" name="description" placeholder="Descripcion"
                                required>
    
                            @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Permiso</button>
                    <a href="{{ route('permissions.index') }}" class="btn btn-default">Atras</a>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection