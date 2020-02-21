<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class empleados extends Model
{
  use SoftDeletes;

  protected $fillale = [
    "codigo",
    "nombre",
    "salarioPesos",
    "salarioDolares",
    "direccion",
    "estado",
    "ciudad",
    "telefono",
    "correo",
    "acivo",
  ];
    //
}
