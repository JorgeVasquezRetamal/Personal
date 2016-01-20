<?php

namespace sistema;
use \BaseController, \View, \Input, \destroy, \Hash, \Redirect, \DB, \Auth, \Utils, \Response,  \Validator, \Excel;



class Import2Controller extends \BaseController 
{
    public function postActionimportar2()
    {
        $input  = Input::all();

        $reglas = array(
            'file' => 'mimes:xlsx,xls|required'
            );

        $messages = array(
            'file.required' => '¡Favor ingrese un archivo!',
            'file.mimes'    => 'El archivo seleccionado no coresponde al formato seleccionado'
            );

        $validacion = Validator::make($input, $reglas, $messages);

        if ($validacion->fails())
        {

            return Redirect::back()->withErrors($validacion);

        }


        //traer nombre del archivo a cargar
        

        $realName    = Input::file('file')->getClientOriginalName();

        $count = Scifi::where('arc_carga', '=', $realName)->count();
        //return $count ;
        if ($count>0)
        {
            return Redirect::back()->with('mensaje','Nombre archivo existe en Base');
        }
        //->delete();

//return $realName;

        Excel::load(Input::file('file'), function($reader) use ($realName) 

        {

             foreach ($reader->get() as $scifi)   
             {
                $new_scifi = new Scifi;
                $new_scifi->personaje = $scifi->personaje; 
                $new_scifi->pelicula = $scifi->pelicula; 
                $new_scifi->arc_carga = $realName; 
                $new_scifi->save(); 
               // Scifi::create([
               //     'personaje'=>$scifi->personaje,
               //     'pelicula'=>$scifi->pelicula,
               //     'arc_carga'=>$realName->arc_carga


               //     ]);
            }

        });
            return Redirect::back()->with('mensaje2','Datos Cargados Correctamente');
         

        //traer nombre del archivo a cargar
        //$realName    = Input::file('file')->getClientOriginalName();
        //Actualizo el nombre del archivo cuando esta vacio
        //Scifi::where('arc_carga', '=', " ")->update(array('arc_carga'=>$realName));

		//return Scifi::all();
        //return View::make('admin');
        //return View::make('sistema.carga.cargas');
        //return Redirect::action('sistema\UsersController@getIndex');

    }


    public function getActionEdit()
    {

        return View::make('sistema.carga.cargas');

    }

}