@extends('layouts.app')

@section('title')
Editar Usuario
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Editar Usuario</h5>
            <h5>Nombre:</h5>
                <p class="form-control">{{$user->name}}</p>
                {!! Form::model($user, ['route'=>['users.update', $user], 'method' => 'put']) !!}
                    <h5>Listado de Roles</h5>
                        @foreach ($roles as $role)
                            <div>
                                <label>
                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                    {{$role->name}}
                                </label>
                            </div>
                        @endforeach

                    {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
        </div>
    </div>

</div>
@endsection