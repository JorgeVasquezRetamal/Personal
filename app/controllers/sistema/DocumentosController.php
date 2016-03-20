<?php
namespace sistema;
use \BaseController, \View, \Input, \Hash, \Redirect, \DB, \Auth, \Utils, \Response, \Excel;

class DocumentosController extends BaseController {
	public function __construct(){
		$this->beforeFilter('auth');
	}


	public function getIndex(){


		$Document = Documentos::all();
		$Users = User::find(2)->Documentos;


		/*$Users = User::rightjoin('documentos','documentos.usuarios_id','=','usuarios.id')
		->where('usuarios.estado','=','Activo')->get();*/

		

		return View::make('sistema.documentos.index')
		->with('Document', $Document)
		->with('Users', $Users);
		
	}


	public function getCreate()
	{
		$user = User::whereEstado('Activo')->lists('nombre', 'id');
		$user_cmb = array(''=>'--Seleccione un usuario--')+$user;

		
		//nos envia al formulario create.blade.php
		return View::make('sistema.documentos.create')
			->with('user_cmb', $user_cmb);
	}


	public function postCreate()
	{

		//consulta a bd evaluar				
		$query = Documentos::whereNombre(Input::get('nombre'))->count();

		//si el registro no existe 
		if($query==0)
		{

			$Document = new Documentos;
			$Document->nombre       = Input::get('nombre');
			$Document->usuarios_id       = Input::get('user_id');
			$Document->save();

			return Redirect::action('sistema\DocumentosController@getIndex')
				->with('mensaje','Documento grabado correctamente');
		}
		else
		{
			return Redirect::action('sistema\DocumentosController@getIndex')
				->with('mensaje','Documento ya existe en la base de datos');
		}

		
	}


	public function getEdit($Docum_id)
	{
		$Document = Documentos::find($Docum_id);

		$user = User::whereEstado('Activo')->lists('nombre', 'id');
		$user_cmb = array(''=>'--Seleccione un usuario--')+$user;
		
		return View::make('sistema.Documentos.edit')
			->with('Document', $Document)
			->with('user_cmb', $user_cmb);
	}


	public function postEdit()
	{

		$id 			= Input::get('docum_id');

		$Document 			= Documentos::find($id);
		
		$Document->nombre       = Input::get('nombre');
		$Document->usuarios_id       = Input::get('user_id');
		$Document->save();
	return Redirect::action('sistema\DocumentosController@getIndex');

	}

		public function getEliminar($Docum_id)
	{
		//return $Docum_id;
		$Document = Documentos::find($Docum_id);
		$Document->delete();
	return Redirect::action('sistema\DocumentosController@getIndex');

	}

}