<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagen extends Model
{
    protected $table='imagenes';

    protected $fillable=[
    	'nombre',
    	'producto_id'
    ];
    // Funciones para hacer las relaciones 1 (hasMany) a muchos (belongsTo) 
    // se debe crear una funcion en cada modelo
    public function producto()
    {
        return $this->belongsTo('App\producto');
    }
}
