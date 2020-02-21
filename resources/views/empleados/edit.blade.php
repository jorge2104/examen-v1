@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
  <div class="col-md-8 offset-md-2">
    <form action="{{route('empleados.update', $empleado->id)}}" method="post" class="form-control">
      @csrf
      <div class="form-group">
        <label for="codigo">Código</label>
        <input type="number" class="form-control" id="codigo"  name="codigo" value="{{$empleado->codigo}}" min="0">
      </div>

      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre"  name="nombre" value="{{$empleado->nombre}}">
      </div>


      <div class="form-group">
        <label for="salarioPesos">Salario en pesos</label>
        <input type="number" class="form-control" id="salarioPesos"  name="salarioPesos" value="{{$empleado->salarioPesos}}" min="1" onchange="getDls()">
      </div>


      <div class="form-group">
        <label for="salarioDolares">Salario en dolares</label>
        <input type="text" class="form-control" id="salarioDolares"  name="salarioDolares" value="{{$empleado->salarioDolares}}" readonly="readonly">
      </div>


      <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" class="form-control" id="direccion"  name="direccion" value="{{$empleado->direccion}}" required>
      </div>


      <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" id="estado"  name="estado" value="{{$empleado->estado}}" required>
      </div>


      <div class="form-group">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" id="ciudad"  name="ciudad" value="{{$empleado->ciudad}}" required>
      </div>


      <div class="form-group">
        <label for="telefono">Télefono</label>
        <input type="number" class="form-control" id="telefono"  name="telefono" value="{{$empleado->telefono}}" required>
      </div>



      <div class="form-group">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" id="correo"  name="correo"  value="{{$empleado->correo}}" required>
      </div>




      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{route('home')}}" class="btn btn-info"> Regresar </a>

    </form>
  </div>
</div>




<script type="text/javascript">
 function getDls(){
   var salario  =  $("#salarioPesos").val();
   if(salario == 0){
       $('#salarioDolares').val(0);
   }
   else{
     $.getJSON( "/getDls/"+salario, function( data ) {
       var dls = data['result']['amount'];
       console.log(data['result']['amount']);
       $('#salarioDolares').val(dls);
     });
   }
}
</script>
@endsection
