<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('rfc');
            $table->string('cp');
            $table->string('email');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('condiciones_pago');
            $table->char('telefono',10);
            $table->string('persona_contacto');
            $table->char('telefono_contacto',10);
            $table->float('limite_credito');
            $table->string('precio_lista');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes');
    }
}
