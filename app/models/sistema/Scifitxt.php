<?php
namespace sistema;
use \Eloquent;

class Scifitxt extends Eloquent  {
	protected $table = 'scifitxt';

//Modificamos el modelo creado para que se pueda cargar masivamente los datos
	protected $fillable = ['personaje', 'pelicula'];

		
}
