<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function($table)
		{		
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre');	
			$table->string('usuario');
			$table->string('password');
			$table->enum('perfil', array('Administrador', 'Publico'));
			$table->enum('estado', array('Activo', 'Inactivo'));
			$table->string('direccion');
			$table->integer('pais_id');
			$table->integer('ciudad_id');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
