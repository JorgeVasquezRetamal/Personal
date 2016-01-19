<?php
namespace sistema;
use \BaseController, \View, \Input, \Hash, \Redirect, \DB, \Auth, \Utils, \Response, \Excel;

class UsersController extends BaseController {
	public function __construct(){
		$this->beforeFilter('auth');
	}

	// 1.-
	public function getIndex(){
		$users_act = User::wherePerfil('Administrador')
						->whereEstado('Activo')
						->orderBy('nombre')
						->get(array('id', 'created_at', 'updated_at','nombre', 'usuario', 'password', 'perfil', 'estado', 'direccion','pais_id','ciudad_id','remember_token'));

		
		$users_inact = User::wherePerfil('Administrador')
						->whereEstado('Inactivo')
						->orderBy('nombre')
						->get(array('id', 'created_at', 'updated_at','nombre', 'usuario', 'password', 'perfil', 'estado', 'direccion','pais_id','ciudad_id','remember_token'));

		
		$paises = Pais::whereEstado('Activo')
						->get(array('id', 'created_at', 'updated_at','nombre', 'estado'));


		//retorna a la vista \sistema\usuarios\index.blade.php  pasamos los datos de los usuarios
		return View::make('sistema.usuarios.index')->with('users_act', $users_act)->with('users_inact', $users_inact)->with('paises', $paises);
		
	}


	//al pinchar en nuevo administrador nos envia acá
	// 2.-
	public function getCreate()
	{
		$pais = Pais::whereEstado('Activo')->lists('nombre', 'id');
		$pais_cmb = array(''=>'--Seleccione una país--')+$pais;

		//$ciudad = Ciudad::whereEstado('Activo')->lists('nombre', 'id');
		//$ciudad_cmb = array(''=>'--Seleccione una ciudad--')+$ciudad;
		$ciudad_cmb = array(''=>'--Seleccione una ciudad--');
		
		//nos envia al formulario create.blade.php
		return View::make('sistema.usuarios.create')
			->with('ciudad_cmb', $ciudad_cmb)
			->with('pais_cmb', $pais_cmb);
	}

	//opción VER
	public function getVer($user_id){

		$user = User::find($user_id);

		($user->pais_id)? $pais_cmb = Pais::whereEstado('Activo')->whereId($user->pais_id)->pluck('nombre') : $pais_cmb = '';
		($user->ciudad_id)? $ciudad_cmb = Ciudad::whereEstado('Activo')->whereId($user->ciudad_id)->pluck('nombre') : $ciudad_cmb = '';

		return View::make('sistema.usuarios.ver')
				->with('ciudad_cmb', $ciudad_cmb)
				->with('pais_cmb', $pais_cmb)
				->with('user', $user);
	}

		public function getEdit($user_id){
		$user = User::find($user_id);

		$pais_cmb = Pais::whereEstado('Activo')->orderBy('nombre')->lists('nombre', 'id');
		$pais_cmb = array(''=>'--Seleccione un país--')+$pais_cmb;

		$ciudad_cmb = Ciudad::whereEstado('Activo')->wherePais_id($user->pais_id)->orderBy('nombre')->lists('nombre', 'id');
		if($ciudad_cmb) $ciudad_cmb = $ciudad_cmb = array(''=>'--Seleccione una ciudad--')+$ciudad_cmb;
		else $ciudad_cmb = array(''=>'--No existen ciudades--');

		
		return View::make('sistema.usuarios.editar')
				->with('ciudad_cmb', $ciudad_cmb)
				->with('pais_cmb', $pais_cmb)
				->with('user', $user);
	}


		public function getActive($user_id){
		$user = User::find($user_id);
		$user->estado = 'Activo';
		$user->save();

		return Redirect::back();
	}

	public function getDesactive($user_id){
		$user = User::find($user_id);
		$user->estado = 'Inactivo';
		$user->save();

		return Redirect::back();
	}

		//al presionar en guardar en create o editar aca valida y guarda
		public function postCreate(){
		$user = new User;
		$user->nombre       = Input::get('nombre');
		$user->usuario       = Input::get('usuario');
		$user->password   = Hash::make(Input::get('password'));
		$user->direccion 	  = Input::get('direccion');
		$user->ciudad_id 	  = Input::get('ciudad_id');
		$user->pais_id = Input::get('pais_id', DB::raw('NULL'));
		$user->perfil    = (Input::get('perfil')) ? Input::get('perfil') : 'Administrador';
		$user->pais_id = Input::get('pais_id', DB::raw('NULL'));
		$user->fechanacimiento = Utils::date_es_to_en(Input::get('fnacimiento'));
		$user->save();

		if($user->perfil=='Administrador')
			return Redirect::action('sistema\UsersController@getIndex');

		return Redirect::action('sistema\UsersController@getCoordinates');
	}


	public function postEdit(){

		$id 			= Input::get('user_id');

		$user 			= User::find($id);
		$user->nombre 	= Input::get('nombre');
		$user->usuario 	= Input::get('usuario');
		if(Input::get('password')!=''):
			$user->password   = Hash::make(Input::get('password'));
		endif;
		$user->direccion 	  = Input::get('direccion');
		$user->ciudad_id 	  = Input::get('ciudad_id');
		$user->pais_id = Input::get('pais_id', DB::raw('NULL'));
		$user->pais_id = Input::get('pais_id', DB::raw('NULL'));
		$user->save();

		if($user->perfil=='Administrador')
			return Redirect::action('sistema\UsersController@getIndex');

		return Redirect::action('sistema\UsersController@getCoordinates');
	}




}