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
        <input type="number" class="form-control" id="codigo"  name="codigo" required min="0">
      </div>

      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre"  name="nombre" required>
      </div>


      <div class="form-group">
        <label for="salarioPesos">Salario en pesos</label>
        <input type="number" class="form-control" id="salarioPesos"  name="salarioPesos" required min="1">
      </div>


      <div class="form-group">
        <label for="salarioDolares">Salario en dolares</label>
        <input type="text" class="form-control" id="salarioDolares"  name="salarioDolares" readonly="readonly">
        <button type="button" name="button" onclick="getDls();" class="btn btn-info"> Calcular </button>
      </div>


      <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" class="form-control" id="direccion"  name="direccion" required>
      </div>


      <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" id="estado"  name="estado" required>
      </div>


      <div class="form-group">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" id="ciudad"  name="ciudad" required>
      </div>


      <div class="form-group">
        <label for="telefono">Télefono</label>
        <input type="number" class="form-control" id="telefono"  name="telefono" required>
      </div>



      <div class="form-group">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" id="correo"  name="correo" required>
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
