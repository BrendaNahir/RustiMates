<?php

namespace App\Controllers;
use App\Models\ConsultaModel;

use App\Models\CategoriaModel;

class ConsultaController extends BaseController
{
   
    
    public function contacto()
     {
      $categoria = new CategoriaModel();

        $data['categorias'] = $categoria->findAll();
        $data['titulo']='Contacto';
        echo view('plantilla/header',$data);
        echo view('plantilla/nav');
        echo view('contenido/contacto_view');
        echo view('plantilla/footer');

     } 
   
     public function f_registrar_consulta()
{
  
    $request = \Config\Services::request();
        if ($request->getMethod(true)){
        $rules=[
        'nombre' =>'required|alpha_space',
        'email'=> 'required|valid_email',
        'motivo' =>'required',
        'mensaje' =>'required'
        
         ];

        $validations=$this->validate($rules);
        
          if ($validations){
            $data=[
                'nombre'=>$request->getPost('nombre_consulta'),
                'email'=>$request->getPost('email_consulta'),
                'motivo'=>$request->getPost('motivo_consulta'),
                'mensaje'=>$request->getPost('mensaje_consulta'),
                'estado_consulta'=>0,
            ];
            
            $userConsulta= new ConsultaModel();
            $userConsulta->insert($data);
            echo view('mensajes/msjConsulta');
        } else{
            $data['validation']=$this->validator;
    }
    $categoria = new CategoriaModel();

        $data['categorias'] = $categoria->findAll();

      $data['titulo']='Contacto';
      echo view('plantilla/header',$data);
      echo view('plantilla/nav');
      echo view('contenido/contacto_view');
      echo view('plantilla/footer');
    }
}

public function f_listar_consulta(){
  
$consulta = new ConsultaModel();
$data['consulta'] = $consulta->getConsultaAll();
$data['titulo'] = 'Listado de consultas';
echo view('plantilla/header',$data);
echo view('plantilla/nav_admin');
echo view('contenido/listado_consultas');
}

public function f_consulta_leida($id=null)
     {
     $consulta = new ConsultaModel();
     $data['consulta'] = $consulta->getConsultaAll();
     $data = array('estado_consulta'=>'1');
     $consulta->update($id,$data);
     return redirect()->route('listado_consultas');

     } 

public function f_consulta_noleida($id=null)
     {
     $consulta = new ConsultaModel();
     $data = array('estado_consulta'=>'0');
     return redirect()->route('listado_consultas');

     } 


}
