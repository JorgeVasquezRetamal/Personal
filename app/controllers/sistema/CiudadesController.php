<?php

namespace sistema;
use \BaseController, \View, \Input, \Hash, \Redirect, \DB, \Auth, \Utils, \Response, \Excel;

class CiudadesController extends BaseController 
{
	public function __construct()
	{
		$this->beforeFilter('auth');
	}


	


	public function getCiudad($pais_id)
		{
			$ciudad = Ciudad::wherepais_id($pais_id)->whereEstado('Activo')->orderBy('nombre')->get(array('nombre','id'));
			
			return Response::json($ciudad);
		}



}