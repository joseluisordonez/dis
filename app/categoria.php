<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categorias';

    protected $fillable=[
    	'nombre','descripcion'
    ];

    // Funciones para hacer las relaciones 1 (hasMany) a muchos (belongsTo) 
   	// se debe crear una funcion en cada modelo
    public function subcategoria()
    {
    	return $this->hasMany('App\subcategoria');
    }
    public function producto()
   	{
   		return $this->hasMany('App\producto');
   	}
}