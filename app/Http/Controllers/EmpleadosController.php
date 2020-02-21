<?php

namespace App\Http\Controllers;

use App\empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validatedData = $request->validate([
       'codigo' => 'required|unique:empleados,codigo|max:255',
       'nombre' => 'required|String|',
       'salarioPesos' => 'required|numeric|min:1',
       'salarioDolares' => 'required|numeric|min:1',
       'direccion' => 'required|String|',
       'estado' => 'required|String|',
       'ciudad' => 'required|String|',
       'telefono' => 'required|String|',
       'correo' => 'required|E-mail|',
     ]);

     $empleado = new empleados;
     $empleado->codigo = $request->codigo;
     $empleado->nombre = $request->nombre;
     $empleado->salarioPesos = $request->salarioPesos;
     $empleado->salarioDolares = $request->salarioDolares;
     $empleado->direccion = $request->direccion;
     $empleado->estado = $request->estado;
     $empleado->ciudad = $request->ciudad;
     $empleado->telefono = $request->telefono;
     $empleado->correo = $request->correo;
     $empleado->activo = 1;
     $empleado->save();


     return redirect()->route('home')->with('ok', 'ok');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit(empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empleados $empleados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $empleado =  empleados::FindOrFail($id);
      $empleado->delete();
      return redirect()->back();
    }

    public function desactivar($id)
    {
      $empleado =  empleados::FindOrFail($id);
      $empleado->activo = 0 ;
      $empleado->save();
      return redirect()->back();
    }

    public function activar($id)
    {
      $empleado =  empleados::FindOrFail($id);
      $empleado->activo = 1 ;
      $empleado->save();
      return redirect()->back();
    }

    public function getDls($salario)
    {
    $sUrl = "https://api.cambio.today/v1/quotes/MXN/USD/json?quantity=".$salario."&key=3009|pA~b7s2PaiNxkVtTpSKZOBBkrYcUX7kE";
    $cURLConnection =  curl_init($sUrl);
    $result =   curl_exec($cURLConnection);
    curl_close($cURLConnection);
    return $result['data'];
    }
}
