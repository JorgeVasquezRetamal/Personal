<?php
namespace sistema;
use \BaseController, \View, \Input, \Hash, \Redirect, \DB, \Auth, \Utils, \Response, \Excel;

class HomeController extends BaseController {
	public function __construct(){
         $this->beforeFilter('auth', array('except' => array('getIndex', 'postLogin')));
    }


	//Inicio valida ingreso
	public function postLogin()
	{

		// return User::all();

		// return \Hash::make('jorge2');

		// return Input::all();
		//if (Auth::attempt(array('usuario' => Input::get('user'), 'password' => Input::get('password'), 'status'=>'Activo')))
		if (Auth::attempt(array('usuario' => Input::get('user'), 'password' => Input::get('password'))))
		{
			//return 'hola2';
		    if(Auth::user()->perfil=='Administrador') return Redirect::action('sistema\HomeController@getAdmin');
		    //return 'hola';
		    else return Redirect::action('sistema\HomeController@getHome');
		}
		 return Redirect::action('sistema\HomeController@getIndex');
		//return 'no me valida';
	}
	//Termino valida ingreso


	public function getAdmin()
	{
		/*$usuarios = User::orderBy('nombre')
						->get(array('id', 'created_at', 'updated_at','nombre', 'usuario', 'password', 'perfil', 'estado', 'direccion','pais_id','ciudad_id','remember_token'));*/
		
		//consulta tabla usuarios ordenado por Nombre
		$query = User::orderBy('nombre');
		
		//Input has(evalua si el combobox trae datos )
		if(Input::has('name_id')) 
		{
			//consulta cuando el id del combobox 
			$query->whereId(Input::get('name_id'));
		}	

		//Input has(evalua si el combobox trae datos )
		if(Input::has('pais_id')) 
		{
			$query->wherePaisId(Input::get('pais_id'));
		}

		//Input has(evalua si el combobox trae datos )
		if(Input::has('ciudad_id')) 
		{
			$query->whereCiudadId(Input::get('ciudad_id'));
		}

		//Input has(evalua si el combobox trae datos )
		if(Input::has('usuario_id')) 
		{
			$query->whereUsuario(Input::get('usuario_id'));
			
		}

		//Input has(evalua si el combobox trae datos )
		if(Input::has('usuario_id2')) 
		{
			$query->where('Usuario', 'like', Input::get('usuario_id2').'%');
				
		}

		//Input has(evalua si el combobox trae datos )
		if(Input::has('nombre_id2')) 
		{
			$query->where('nombre', 'like', Input::get('nombre_id2').'%');
				
		}


		$usuarios = $query->get(array('id', 'created_at', 'updated_at','nombre', 'usuario', 'password', 'perfil', 'estado', 'direccion','pais_id','ciudad_id','remember_token'));


		
		$user2 = User::orderBy('nombre')->lists('nombre', 'id');
 		$user_cmb = array(''=>'--Todos--')+$user2;

 		$pais = Pais::orderBy('nombre')->lists('nombre', 'id');
 		$pais_cmb = array(''=>'--Todos--')+$pais;

 		$ciudad = ciudad::orderBy('nombre')->lists('nombre', 'id');
 		$ciudad_cmb = array(''=>'--Todos--')+$ciudad;
		
		return View::make('admin')
		->with('usuarios', $usuarios)
		->with('user_cmb', $user_cmb)
		->with('pais_cmb', $pais_cmb)
		->with('ciudad_cmb', $ciudad_cmb)
		;

	}

	public function getHome()
	{
		return View::make('home');
	}

	public function getIndex(){
		
		if (Auth::check()){
			if(Auth::User()->perfil=='Administrador') return Redirect::intended('home/admin');
		    else return Redirect::intended('home/home');
		}

		return View::make('login');
		
		
	}


	public function getLogout(){
		Auth::logout();
		return Redirect::action('sistema\HomeController@getIndex');
	}



	
	
}
