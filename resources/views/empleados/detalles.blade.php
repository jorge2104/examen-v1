@extends('layouts.app')

@section('content')

<div class="row mb-4">
  <div class="col-md-12 text-center">
    <h2 class="m-0 p-0 "> Detalles del empleado {{$empleado->nombre}}</h2>
  </div>
</div>
<h1>Pesos</h1>
@foreach($meses as $key=>$mes )
<div class="row">
  <div class="col-md-12">
    <p>Aumento del mes {{$key+1}}: ${{$mes}} mxn </p>
  </div>
</div>
@endforeach


<h1>Dolares</h1>
<div class="row" id="dls">

</div>

<div class="row">
  <div class="col-md-12 text-center">
    <a href="{{route('home')}}" class="btn btn-info"> Regresar </a>
  </div>
</div>

<input type="hidden" name="valorDolar" id="valorDolar" >
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
getDls();


function getDls(){
  $.getJSON( "/getDls/1", function( data ) {
    var dls = data['result']['amount'];
    console.log(data['result']['amount']);
    $('#valorDolar').val(''+dls);
    calcular();
  });
}

function calcular(){
  @foreach($meses as $key=>$mes)
  var mes = {{$mes}};
  var dolar = $("#valorDolar").val();
  console.log(mes);
  console.log(dolar);
  var total  =  mes*dolar;
  $('#dls').append('<div class="col-md-12"> <p> aumenot del mes '+ {{$key+1}}+": $"+total +'dls</p> </div')
  @endforeach
}


</script>



<script type="text/javascript">

</script>

@endsection
