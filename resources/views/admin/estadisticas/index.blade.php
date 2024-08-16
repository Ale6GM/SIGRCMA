@extends('layouts.app')

@section('title')
 Estadisticas
@endsection

@section('breadcrumbs')
<li class="breadcrumb-item">
<!-- if breadcrumb is single--><a href="#">Inicio</a>
</li>
<li class="breadcrumb-item">
<!-- if breadcrumb is single--><a href="#">Estadisticas</a>
</li>
@endsection

@section('content')
    @livewire('Admin\Estadisticas')
@endsection

@section('script')
    

    
@endsection