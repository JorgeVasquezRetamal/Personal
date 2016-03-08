<?php
namespace sistema;
use \BaseController, \View, \Input, \Hash, \Redirect, \DB, \Auth, \Utils, \Response, \Excel;

class VistaController extends BaseController {
	public function __construct(){
		$this->beforeFilter('auth');
	}


	public function getIndex(){
		
		return View::make('sistema.vistas.vista1');
		
	}

}