<?php
namespace sistema;
use \Eloquent;

class Scifi extends Eloquent  {
	protected $table = 'scifi';

//Modificamos el modelo creado para que se pueda cargar masivamente los datos
	protected $fillable = ['personaje', 'pelicula'];

		
}
