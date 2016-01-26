<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTefbechTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tef_Bech', function($table)
		{		
			$table->increments('id');
			
			$table->date('fecha_contable')->index();	
			$table->date('fecha_mov')->index();
			$table->time('hora_mov');
			$table->integer('correlativo')->index();
			$table->string('cod_tx');
			$table->string('tipo_cuenta');
			$table->string('n_cuenta');
			$table->integer('monto');
			$table->string('rut')->index();
			$table->integer('oficina');
			$table->integer('canal');
			$table->string('arc_carga')->index();
			//$table->timestamps();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Tef_Bech');
	}

}
