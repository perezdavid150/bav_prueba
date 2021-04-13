<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model {
  protected $fillable = ['factura', 'cliente', 'telefono', 'email', 'iva', 'foto'];
}