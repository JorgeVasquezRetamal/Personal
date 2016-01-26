<?php

namespace sistema;
use \BaseController, \View, \Input, \destroy, \Hash, \Redirect, \DB, \Auth, \Utils, \Response,  \Validator, \Excel;



class Import2Controller extends \BaseController 
{
    public function __construct()
    {
    //procesa el archivo y se sube
    ini_set('max_execution_time','0');
    ini_set('memory_limit','1024M');
    ini_set('post_max_size','800M'); 
    ini_set('upload_max_filesize','800M');
    ini_set('max_file_uploads','2000000000');
    ini_set('mysql.connect_timeout','6000'); 
    }

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
            }
        });
            
            return Redirect::back()->with('mensaje2','Archivo Cargado Correctamente');
    }




public function postActionimportartxt()
{
    $input  = Input::all();

    $reglas = array(
        'file' => 'mimes:txt,TXT|required'
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

    $realName    = Input::file('file')->getClientOriginalName();

    $count = Scifitxt::where('arc_carga', '=', $realName)->count();

    if ($count>0)
    {
        return Redirect::back()->with('mensaje','Nombre archivo existe en Base');
    }


DB::Begintransaction();
try {
        $file = fopen(Input::file('file'), "r");
        while(!feof($file)) 
        {
            $info = fgets($file);

            if($info != '')
            {
                $info = explode(';', $info);

                $new_scifi = new Scifitxt;
                $new_scifi->personaje = $info[0]; 
                $new_scifi->pelicula = $info[1]; 
                $new_scifi->arc_carga = $realName; 
                $new_scifi->save();   
            }
        }
        fclose($file);

    }//termino Try

    catch (\Exception $e)
     {
         DB::rollback();
             return 'ERROR (' . $e->getCode() . '): ' . $e->getMessage();
     }//termino catch

        DB::commit();

    return Redirect::back()->with('mensaje2','Archivo Cargado Correctamente');
}



public function postActionimportartefbech()
{


    $input  = Input::all();

    $reglas = array(
        'file' => 'mimes:txt,TXT|required'
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

    $realName    = Input::file('file')->getClientOriginalName();

    $count = TefBech::where('arc_carga', '=', $realName)->count();

    if ($count>0)
    {
        return Redirect::back()->with('mensaje','Nombre archivo existe en Base');
    }


DB::Begintransaction();
try {
        $file = fopen(Input::file('file'), "r");
        while(!feof($file)) 
        {
            $info = fgets($file);

            if($info != '')
            {
                $info = explode(';', $info);

                $new_scifi = new TefBech;
                $new_scifi->fecha_contable = $info[0]; 
                //$new_scifi->fecha_mov = "20" . $info[1];
                $new_scifi->fecha_mov = $info[1];
                $new_scifi->hora_mov = $info[2]; 
                $new_scifi->correlativo = $info[3]; 
                $new_scifi->cod_tx = $info[4]; 
                $new_scifi->tipo_cuenta = $info[6]; 
                $new_scifi->n_cuenta = ltrim($info[7],'0'); 
                $new_scifi->monto = $info[8]; 
                $new_scifi->rut = $info[9]; 
                $new_scifi->oficina = $info[10]; 
                $new_scifi->canal = $info[11];
                $new_scifi->arc_carga = $realName; 
                $new_scifi->save();   
            }
        }
        fclose($file);

    }//termino Try

    catch (\Exception $e)
     {
         DB::rollback();
             return 'ERROR (' . $e->getCode() . '): ' . $e->getMessage();
     }//termino catch

        DB::commit();

    return Redirect::back()->with('mensaje2','Archivo Cargado Correctamente');

}

    public function getActionEdit()
    {
        return View::make('sistema.carga.cargas');
    }



     public function getActionEdit2()
    {
        return View::make('sistema.carga.cargatxt');
    }


    public function getActionEdittefbech()
    {
        return View::make('sistema.carga.cargatefbech');
    }

}