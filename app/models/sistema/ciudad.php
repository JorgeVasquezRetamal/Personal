<?php
namespace sistema;
use \Eloquent;

class ciudad extends Eloquent {
	protected $table = 'ciudad';

	public function pais(){return $this->belongsTo('sistema\pais', 'pais_id');}
	
}



