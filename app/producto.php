<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='productos';

    protected $fillable=[
    	'nombre',
    	'descripcion',
    	'codigo',
    	'costo',
        'unidad_medida',
    	'precio_mayoreo',
    	'precio_mediomayoreo',
    	'precio_menudeo',
    	'categoria_id',
    	'subcategoria_id',
        'stock',
        'stock_min',
        'stock_max'
    ];

    // Funciones para hacer las relaciones 1 (hasMany) a muchos (belongsTo) 
    // se debe crear una funcion en cada modelo
    public function subcategoria()
    {
        return $this->belongsTo('App\subcategoria');
    }
    public function categoria()
    {
        return $this->belongsTo('App\categoria');
    }
    public function imagen()
    {
        return $this->hasOne('App\imagen');
    }
    //funcion para hacer la busqueda de productos, estar funciones deben tener al inicio la palabra reservada scope
    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'LIKE', "%$nombre%");
    }
}
