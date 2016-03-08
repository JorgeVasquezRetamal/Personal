<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});*/




App::missing(function($exception)
{
	return Response::View('/error/error404', array(), 404);

});


Route::get('/', array('uses' => 'sistema\HomeController@getIndex'));
Route::controller('home', 'sistema\HomeController');
//Route::controller('users', 'sistema\UsersController');

Route::controller('usuarios', 'sistema\UsersController');

//Ruta necesaria para cargar combo ciudad//
Route::controller('ciudad', 'sistema\CiudadesController');

//Ruta necesaria para descargar Excel//
//Ruta mostrada navegador excel  
Route::controller('excel', 'sistema\OtrosController');

//rutas de cargas
Route::controller('carga', 'sistema\Import2Controller');


Route::controller('vista1','sistema\VistaController');







 






