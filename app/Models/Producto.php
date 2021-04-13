<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {
  protected $fillable = ['sku', 'nombre', 'descripcion', 'precio', 'iva', 'foto'];
}