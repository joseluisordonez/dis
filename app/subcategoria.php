<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
   	protected $table='subcategorias';
   	protected $fillable=[
   		'nombre','descripcion','categoria_id'
   	];
   	// Funciones para hacer las relaciones 1 (hasMany) a muchos (belongsTo) 
   	// se debe crear una funcion en cada modelo
   	public function categoria()
   	{
   		return $this->belongsTo('App\categoria');
   	}
   	public function producto()
   	{
   		return $this->hasMany('App\producto');
   	}
      //funcion para llamar jquery de select's dinamicos en pagina de editar producto 
      public static function subcategorias($id){
         return Subcategoria::where('categoria_id','=',$id)->get();
      }
}
