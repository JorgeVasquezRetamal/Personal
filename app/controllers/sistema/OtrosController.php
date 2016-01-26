<?php 

namespace sistema;
use \BaseController, \View, \Input, \Hash, \Redirect, \DB, \Auth, \Utils, \Response, \Excel, \Delimiter;

class OtrosController extends \BaseController
{ 

  public function getActionExcel() 
  {
      /*$prospects = User::join('ciudad', 'usuarios.ciudad_id', '=', 'ciudad.id')           
                ->join('pais', 'usuarios.pais_id', '=', 'pais.id')            
                ->orderBy('usuarios.nombre','desc')           
                ->select(array(DB::raw('usuarios.nombre as nombre,usuarios.usuario as usuario,            
                  usuarios.perfil as perfil,usuarios.estado as estado,usuarios.direccion as direccion,            
                  usuarios.created_at as created_at, usuarios.updated_at as updated_at,
                  ciudad.nombre as ciudad,pais.nombre as pais')))->get();*/

       $prospects = User::join('ciudad', 'usuarios.ciudad_id', '=', 'ciudad.id')           
                ->join('pais', 'usuarios.pais_id', '=', 'pais.id')            
                ->orderBy('usuarios.nombre','desc')           
                ->select('usuarios.nombre as nombre','usuarios.usuario as usuario',            
                  'usuarios.perfil as perfil','usuarios.estado as estado','usuarios.direccion as direccion',            
                  'usuarios.created_at as created_at', 'usuarios.updated_at as updated_at',
                  'ciudad.nombre as ciudad','pais.nombre as pais')->get();
                
//dd($prospects);

    //$prospects = User::orderBy('nombre','desc')->get(['nombre','    usuario','perfil','estado','direccion','created_at','updated_at']);

    Excel::create('Lista de Usuarios ' .'-' .date('d-m-Y his'), function($excel) use($prospects)

    {
      $excel->sheet('Lista_Usuarios', function($sheet) use($prospects)
      {        
        $data=[];

        array_push($data, array('Nombre','Usuario','Perfil','Estado','Dirección','Pais','Ciuadad','Ingresado','Actualizado'));

        foreach($prospects as $key => $value)
        {
          array_push($data, array($value->nombre,$value->usuario,$value->perfil,$value->estado,$value->direccion,$value->pais,$value->ciudad,Utils::date_en_to_es($value->created_at), Utils::datetime_en_to_es($value->updated_at)));

        }

        $sheet->fromArray($data, null, 'A1', false, false);


       // $sheet->protectCells('A1:G1', $password);
        $sheet->setPageMargin(array( 2.25, 2.30, 2.25, 2.30 ));
        $sheet->setAutoSize(true);
      //Autofiltro
        $sheet->setAutoFilter();
      //inmovilizar los titulos
        $sheet->freezeFirstRow();
      // Pinta color Titulos rango 
        $sheet->row(1, function($row) 
        {
         $row->setBackground('#228B22');
       });
                  // Manipula celdas
        $sheet->cells('A1:I1', function($cells) 
        {
          $cells->setAlignment('center');
          $cells->setFont(array(
            'family'     => 'Calibri',
            'size'       => '12',
            'bold'       =>  true
            ));


        });



        });
  })->download('xlsx');




  }


  public function getActionTXT() 
  {
    

       $prospects = User::join('ciudad', 'usuarios.ciudad_id', '=', 'ciudad.id')           
                ->join('pais', 'usuarios.pais_id', '=', 'pais.id')            
                ->orderBy('usuarios.nombre','desc')           
                ->select('usuarios.nombre as nombre','usuarios.usuario as usuario',            
                  'usuarios.perfil as perfil','usuarios.estado as estado','usuarios.direccion as direccion',            
                  'usuarios.created_at as created_at', 'usuarios.updated_at as updated_at',
                  'ciudad.nombre as ciudad','pais.nombre as pais')->get();        

    //$prospects = User::orderBy('nombre','desc')->get(['nombre','usuario','perfil','estado','direccion','created_at','updated_at']);

    Excel::create('Lista de Usuarios ' .'-' .date('d-m-Y his'), function($excel) use($prospects)

    {
      $excel->sheet('Lista_Usuarios', function($sheet) use($prospects)
      {        
        $data=[];
      
         array_push($data, array('Nombre','Usuario','Perfil','Estado','Dirección','Pais','Ciuadad','Ingresado','Actualizado'));

        foreach($prospects as $key => $value)
        {
          //array_push($data, array($value->nombre,$value->usuario,$value->perfil,$value->estado,$value->direccion, Utils::date_en_to_es($value->created_at), Utils::datetime_en_to_es($value->updated_at)));
          array_push($data, array($value->nombre,$value->usuario,$value->perfil,$value->estado,$value->direccion,$value->pais,$value->ciudad,Utils::date_en_to_es($value->created_at), Utils::datetime_en_to_es($value->updated_at)));
        }

        $sheet->fromArray($data, null, 'A1', false, false);






        });
  //})->download('xlsx');

  })->export('txt');


  }




 public function getActionTXT2() 
 {

   $prospects = User::join('ciudad', 'usuarios.ciudad_id', '=', 'ciudad.id')           
   ->join('pais', 'usuarios.pais_id', '=', 'pais.id')            
   ->orderBy('usuarios.nombre','desc')           
   ->select('usuarios.nombre as nombre','usuarios.usuario as usuario',            
    'usuarios.perfil as perfil','usuarios.estado as estado','usuarios.direccion as direccion',            
    'usuarios.created_at as created_at', 'usuarios.updated_at as updated_at',
    'ciudad.nombre as ciudad','pais.nombre as pais')->get();        


   $fecha=date('d-m-Y his');
   $cabecera = 'Nombre;Usuario;Perfil;Estado;Dirección;Pais;Ciuadad;Ingresado;Actualizado';

   echo  (rtrim($cabecera."\n"));
   echo PHP_EOL;

   $output='';


   foreach ($prospects as $row) 
   {

          //$output.=  implode(";",$row->toArray())."\r\n";
    $output.=  implode(";",$row->toArray()) .PHP_EOL;
  }


  $headers = array(
    'Content-Type' => 'text/plain',
    'Content-Disposition' => 'attachment;    filename="Listado Usuarios"' . $fecha .".txt",
    );


  return Response::make(rtrim($output, PHP_EOL), 200, $headers);

}




   public function getActionEdit()
    {
       
        return View::make('sistema.descargas.descarga');
       
    }



}
