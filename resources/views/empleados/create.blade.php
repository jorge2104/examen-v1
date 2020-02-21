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
    <form action="{{route('empleados.store')}}" method="post" class="form-control">
      @csrf
      <div class="form-group">
        <label for="codigo">Código</label>
        <input type="number" class="form-control" id="codigo" aria-describedby="emailHelp" name="codigo" required min="0">
      </div>

      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre" required>
      </div>


      <div class="form-group">
        <label for="salarioPesos">Salario en pesos</label>
        <input type="number" class="form-control" id="salarioPesos" aria-describedby="emailHelp" name="salarioPesos" required min="1">
      </div>


      <div class="form-group">
        <label for="salarioDolares">Salario en dolares</label>
        <input type="text" class="form-control" id="salarioDolares" aria-describedby="emailHelp" name="salarioDolares" readonly="readonly">
        <button type="button" name="button" onclick="getDls();" class="btn btn-info"> Calcular </button>
      </div>


      <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" class="form-control" id="direccion" aria-describedby="emailHelp" name="direccion" required>
      </div>


      <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" id="estado" aria-describedby="emailHelp" name="estado" required>
      </div>


      <div class="form-group">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" id="ciudad" aria-describedby="emailHelp" name="ciudad" required>
      </div>


      <div class="form-group">
        <label for="telefono">Télefono</label>
        <input type="number" class="form-control" id="telefono" aria-describedby="emailHelp" name="telefono" required>
      </div>



      <div class="form-group">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" name="correo" required>
      </div>




      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>


<script type="text/javascript">
 function getDls(){
   var salario  =  $("#salarioPesos").val();
  $.getJSON( "/getDls/"+salario, function( data ) {
    var dls = data['result']['amount'];
    console.log(data['result']['amount']);
    $('#salarioDolares').val(dls);
  });
}
</script>
@endsection
