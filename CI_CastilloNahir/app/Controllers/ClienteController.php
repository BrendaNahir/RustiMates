<?php

namespace App\Controllers;
use App\Models\ClienteModel;
use App\Models\CategoriaModel;

class ClienteController extends BaseController
{
   
    //public function f_registrar_cliente(){
    //	echo "datos enviados";die;
    //}

     //public function f_registrar_sesion(){
    	//echo "Los datos fueron capturados";die;
    //}
    public function f_registrarse()
     {

      $categoria = new CategoriaModel();

        $data['categorias'] = $categoria->findAll();
      $data['titulo']='Registro Usuario';
      echo view('plantilla/header',$data);
      echo view('plantilla/nav');
      echo view('contenido/registrarse');
      echo view('plantilla/footer');
     }


    public function f_registrar_cliente()
    {
      $request = \Config\Services::request();
        if ($request->getMethod(true)){
        $rules=[
          'nombre' =>'required|alpha_space',
          'apellido'=> 'required|alpha_space',
          'dni' =>'required|integer|is_unique[usuarios.dni]',
          'provincia'=> 'required|alpha_space',
          'direccion'=> 'required',
          'email'=> 'required|valid_email|is_unique[usuarios.email]',
          'pass' =>'trim|required|min_length[8]',
          'passconf'=> 'trim|required|matches[pass]'
       ];
    
        $validations=$this->validate($rules);
          if ($validations){
            $data=[
                'nombre'=>$request->getPost('nombre'),
                'apellido'=>$request->getPost('apellido'),
                'dni'=>$request->getPost('dni'),
                'provincia'=>$request->getPost('provincia'),
                'direccion'=>$request->getPost('direccion'),
                'email'=>$request->getPost('email'),
                'pass'=> password_hash($request->getPost('pass'), PASSWORD_BCRYPT),
                'perfil_id'=>2
            ];
            
            $userCliente= new ClienteModel();
            $userCliente->insert($data);

            $categoria = new CategoriaModel();
            $data['categorias'] = $categoria->findAll();
             $data['titulo']='Inicio Sesión';
            echo view('plantilla/header',$data);
            echo view('plantilla/nav');
            echo view('mensajes/msjRegistro');
            echo view('contenido/sesion');
            echo view('plantilla/footer');
          } else{
            $data['validation']=$this->validator;
    
    $categoria = new CategoriaModel();

    $data['categorias'] = $categoria->findAll();
    $data['titulo']='Inicio Sesión';
      echo view('plantilla/header',$data);
      echo view('plantilla/nav');
      echo view('contenido/registrarse');
      echo view('plantilla/footer');
    }
  }
  }

public function f_iniciar()
     {
      $categoria = new CategoriaModel();

        $data['categorias'] = $categoria->findAll();
      $data['titulo']='Inicio Sesion';
      echo view('plantilla/header',$data);
      echo view('plantilla/nav');
      echo view('contenido/sesion');
      echo view('plantilla/footer');

     }

    // public function login_usuario(){
    //  $request = \Config\Services::request();
    //  $session = session();

      //Validar los datos ingresados

      //$email = $request->getPost('email');
      //$pass = $request->getPost('pass');
      //$UserModel = new ClienteModel();
      //$user = $UserModel->where('email', $email)->first();

      //if ($user){
        //$pass_user = $user['pass'];
       // $pass_verif = password_verify($pass, $pass_user);
        //if ($pass_verif){
          //$data = [
            //'id' => $user['id'],
            //'nombre' => $user['nombre'],
            //'apellido' => $user['apellido'],
            //'perfil_id' => $user['perfil_id'],
              //'login' => TRUE
          //];
            //$session->set($data);
            //switch (session('perfil_id')){
            //  case '1':
             //   return redirect()->route('user_admin');
              //  break;
              //case '2':
               // return redirect()->route('/');
                //break;
            //} //del switch
        //} else { $session->setFlashdata('mensaje', 'Usuario y/o contraseña incorrecta');
     // }
     // } //if de la verificacion
    // else {$session->setFlashdata('mensaje','Usuario y/o contraseña incorrecto');}
   //if del user
 // return redirect()->route('tips');
  //    }

public function cerrar_sesion(){
  $session = session();
  $session->destroy();
  return redirect()->route('iniciar_sesion');
}     


public function f_iniciar_cliente()
     {
      $categoria = new CategoriaModel();
            $data['categorias'] = $categoria->findAll();
      $request = \Config\Services::request();
      $session = session();

		if ($request->getMethod(true)){
		$rules=[
		'email'=> 'required|valid_email',
		'pass' =>'trim|required|min_length[8]'
		
		 ];
		
		$validations=$this->validate($rules);
		
          if (!$validations){
			$data['validation']=$this->validator;
			}
		}
	     $data['titulo']='Inicio Sesión';
      echo view('plantilla/header',$data);
      echo view('plantilla/nav');
      echo view('contenido/sesion');
      echo view('plantilla/footer');

      //Obtengo los datos del formulario
      $email = $request->getPost('email');
      $pass = $request->getPost('pass');
      $ClienteModel = new ClienteModel();
      //user = compara el email que trae de la tabla de la base de datos con el que ingresamos en el formulario.
      $user = $ClienteModel->where('email',$email)->first();
      //si los emails coinciden, ingresa a este if
      if($user){
        $pass_user = $user['pass']; //recupera la contraseña de la tabla

        $pass_verif = password_verify($pass, $pass_user); //compara la contraseña ingresada desde el form con el de la tabla.
        //Si es correcto, ingresa aca.
        if($pass_verif){
          //creo un array con los datos de la persona que obtengo de la base
          $data = [
            'id' => $user['id'],
            'nombre' => $user['nombre'],
            'apellido' => $user['apellido'],
            'perfil' => $user['perfil_id'],
            'login'=>TRUE,
          ];
          //paso esos datos a la session para tenerlos disponibles y poder mostrarlos como el "perfil" del cliente
          $session->set($data);
          switch (session('perfil')){
            case '1':
            //redirecciona a la ruta user_admin que hace referencia a la función admin que esta en el controller AdminController
              return redirect()->route('user_admin');
            break;
            case '2':
            //echo 'es un cliente';die;
            //si viene por aca, te lleva directamente al inicio
              return redirect()->route('index');
            break;
          }
        }else {
          //echo 'no paso el password';
          $session->setFlashdata('mensaje','Email y/o contraseña incorrecta');
          return redirect()->route('iniciar_sesion');
        }
      }
     // $session->setFlashdata('mensaje','Email y/o contraseña incorrecta');
     // return redirect()->route('iniciar_sesion');
     }
  }