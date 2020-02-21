@extends('layouts.app')

@section('content')



<div class="row">
  <div class="col-md-6 text-center">
    <a href="{{route('empleados.create')}}" class="btn btn-info"> + Agregar empleado </a>
  </div>
  <div class="col-md-6">
    <a class="btn btn-warning" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</div>


<div class="row">
  <div class="col-md-1">
    <p>  codigo </p>
  </div>

  <div class="col-md-2">
    <p>  nombre </p>
  </div>
  <div class="col-md-2">
    <p>  salario en pesos </p>
  </div>

  <div class="col-md-2">
    <p>  salario en dolares </p>
  </div>
  <div class="col-md-2">
    <p> direccion </p>
  </div>

  <div class="col-md-2">
    <p>  estado </p>
  </div>
  <div class="col-md-2">
    <p>  ciudad </p>
  </div>

  <div class="col-md-2">
    <p>  telefono </p>
  </div>

  <div class="col-md-2">
    <p>  correo </p>
  </div>

  <div class="col-md-4">
    Acciones
  </div>
</div>

<hr>

@foreach($empleados as $empleado)
<div class="row">
  <div class="col-md-1">
    <p>  {{$empleado->codigo}} </p>
  </div>

  <div class="col-md-2">
    <p>  {{$empleado->nombre}} </p>
  </div>
  <div class="col-md-2">
    <p>  {{$empleado->salarioPesos}} </p>
  </div>

  <div class="col-md-2">
    <p>  {{$empleado->salarioDolares}} </p>
  </div>
  <div class="col-md-2">
    <p>  {{$empleado->direccion}} </p>
  </div>

  <div class="col-md-2">
    <p>  {{$empleado->estado}} </p>
  </div>
  <div class="col-md-2">
    <p>  {{$empleado->ciudad}} </p>
  </div>

  <div class="col-md-2">
    <p>  {{$empleado->telefono}} </p>
  </div>

  <div class="col-md-2">
    <p>  {{$empleado->correo}} </p>
  </div>

  @if($empleado->activo == 1)
  <div class="col-md-2">
    <a href="{{route('empleados.desactivar', $empleado->id)}}" class="btn btn-danger">Desactivar</a>
  </div>
  @else
  <div class="col-md-2">
    <a href="{{route('empleados.activar', $empleado->id)}}" class="btn btn-success">Activar</a>
  </div>
  @endif
  <div class="col-md-2">
    <a href="{{route('empleados.delete', $empleado->id)}}" class="btn btn-warning">Eliminar</a>
  </div>

  <div class="col-md-2">
    <a href="{{route('empleados.show', $empleado->id)}}" class="btn btn-info">Editar</a>
  </div>

  <div class="col-md-12">
    <a href="{{route('empleados.aumento' , $empleado->id)}}" class="btn btn-warning">proyección salarial</a>
  </div>

</div>
<hr>
@endforeach
@endsection
