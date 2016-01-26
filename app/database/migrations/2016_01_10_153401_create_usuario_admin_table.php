<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		$user = new sistema\User;
		$user->nombre       = 'Jorge Vásquez';
		$user->password   = Hash::make('jo112110');
		$user->direccion 	  = 'casa';
		$user->ciudad_id 	  = '1';
		$user->pais_id = '1';
		$user->estado    = 'Activo';
		$user->perfil    = 'Administrador';
		$user->usuario    = 'jorge';
		$user->save();


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		$user = sistema\User::where('nombre','=',DB::raw('jorge'))
					->where('estado', '=', DB::raw('Activo'));

		$user->delete();
	}

}
