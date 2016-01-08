<?php
namespace sistema;
use \BaseController, \View, \Input, \Auth, \Redirect, \Asset, \DB;

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
		    if(Auth::user()->perfil=='root') return Redirect::action('sistema\HomeController@getAdmin');
		    //return 'hola';
		    else return Redirect::action('sistema\HomeController@getHome');
		}
		 return Redirect::action('sistema\HomeController@getIndex');
		//return 'no me valida';
	}
	//Termino valida ingreso


	public function getAdmin()
	{
		//Asset::add('js/sistemas/requests.js');
		return View::make('admin');
	}

	public function getHome()
	{
		return View::make('home');
	}

	public function getIndex(){
		
		if (Auth::check()){
			if(Auth::User()->perfil=='root') return Redirect::intended('home/admin');
		    else return Redirect::intended('home/home');
		}

		return View::make('login');
		
		
	}


	public function getLogout(){
		Auth::logout();
		return Redirect::action('sistema\HomeController@getIndex');
	}



	
	
}
