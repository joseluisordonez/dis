<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   	protected $table='clientes';

   	protected $fillable=[
   		'nombre',
         'rfc',
         'cp',
         'email',
   		'direccion',
         'ciudad',
         'estado',
         'condiciones_pago',
   		'telefono',
   		'persona_contacto',
   		'telefono_contacto',
   		'limite_credito',
   		'user_id'
   	];

      // Funciones para hacer las relaciones 1 (hasMany) a muchos (belongsTo) 
      // se debe crear una funcion en cada modelo
      public function user()
      {
         return $this->belongsTo('App\User');
      }
}
