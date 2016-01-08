<?php
namespace sistema;
use \BaseController, \View, \Input, \Hash, \Redirect, \DB, \Auth;

class UsersController extends BaseController {
	public function __construct(){
		$this->beforeFilter('auth');
	}


	public function getIndex(){
		$users_act = User::wherePerfil('root')
						->whereStatus('Activo')
						->orderBy('Nombres')
						->get(array('id', 'Nombres', 'usuario', 'password', 'perfil', 'identificador', 'unidad', 'status', 'created_at', 'updated_at'));

		$users_inact = User::wherePerfil('root')
						->whereStatus('Inactivo')
						->orderBy('Nombres')
						->get(array('id', 'Nombres', 'usuario', 'password', 'perfil', 'identificador', 'unidad', 'status', 'created_at', 'updated_at'));

		//retorna a la vista \usuarios\users\index.blade.php
		return View::make('usuarios.users.index')->with('users_act', $users_act)->with('users_inact', $users_inact);
	}
}