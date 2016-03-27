<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $fillable = [
        'name','apellido', 'email', 'password','permisos'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Funciones para hacer las relaciones 1 (hasMany) a muchos (belongsTo) 
    // se debe crear una funcion en cada modelo
    public function cliente()
    {
        return $this->hasMany('App\cliente');
    }
}
