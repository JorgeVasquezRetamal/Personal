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


//Route::get('/', array('uses' => 'HomeController@getIndex'));

/* Route::get('/', function()
{
	$teatinos=DB::table('consulta_atm')->get();
	return $teatinos;
}); */

/* Route::get('/', function()
{
	$teatinos2=DB::table('consulta_atm')->find(2);
	dd ($teatinos2); 
}); */

/*App::missing(function($exception)
{
	return Response::View('/error/error404', array(), 404);

});*/

App::missing(function($exception)
{
	return Response::View('/error/error404', array(), 404);

});


Route::get('/', array('uses' => 'sistema\HomeController@getIndex'));
Route::controller('home', 'sistema\HomeController');
Route::controller('users', 'sistema\UsersController');





 Route::get('/consulta', function()
{
	//$teatinos2=DB::table('consulta_atm')->where('atm','=','6323')->get();
	//return $teatinos2;
	$teatinos2 = Consulta::all();
	return $teatinos2;
}); 





