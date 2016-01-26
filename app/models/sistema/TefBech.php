<?php
namespace sistema;
use \Eloquent;

class TefBech extends Eloquent  {
	protected $table = 'Tef_Bech';

//Modificamos el modelo creado para que se pueda cargar masivamente los datos
	protected $fillable = ['fecha_contable', 'fecha_mov','hora_mov','correlativo','cod_tx','tipo_cuenta','n_cuenta','monto','rut','oficina','canal','arc_carga'];
	public $timestamps=false;
		
}
