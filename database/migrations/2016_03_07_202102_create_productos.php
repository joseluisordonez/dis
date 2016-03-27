<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->char('codigo',20);
            $table->float('costo');
            $table->string('unidad_medida');
            $table->float('precio_mayoreo');
            $table->float('precio_mediomayoreo');
            $table->float('precio_menudeo');
            $table->integer('stock');
            $table->integer('stock_min');
            $table->integer('stock_max');

            $table->integer('categoria_id')->unsigned();
            $table->integer('subcategoria_id')->unsigned();

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
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
        Schema::drop('productos');
    }
}
