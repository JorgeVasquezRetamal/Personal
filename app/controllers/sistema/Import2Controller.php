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



        Excel::load(Input::file('file'), function($reader) 

        {

         foreach ($reader->get() as $scifi)   
         {
            Scifi::create([
               'personaje'=>$scifi->personaje,
               'pelicula'=>$scifi->pelicula


               ]);
        }
    });

        //traer nombre del archivo a cargar
        //$realName    = Input::file('file')->getClientOriginalName();
        //Actualizo el nombre del archivo cuando esta vacio
        Scifi::where('arc_carga', '=', " ")->update(array('arc_carga'=>$realName));

		//return Scifi::all();
        return View::make('admin');
    }


    public function getActionEdit()
    {

        return View::make('sistema.carga.cargas');

    }

}