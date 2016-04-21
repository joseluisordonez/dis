<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
    		'nombre'		=> 		'Abrasivos',
        	'Descripcion' 	=> 		'Discos de corte',
        ]);

        DB::table('categorias')->insert([
    		'nombre'		=> 		'Seguridad',
        	'Descripcion' 	=> 		'Equipo de seguridad personal',
        ]);

        DB::table('categorias')->insert([
    		'nombre'		=> 		'Soldadura',
        	'Descripcion' 	=> 		'Maquinas de soldar y consumibles',
        ]);
    }
}
