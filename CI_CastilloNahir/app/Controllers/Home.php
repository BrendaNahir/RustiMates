<?php

namespace App\Controllers;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class Home extends BaseController

{
   
    public function index()
    {   
        $data['titulo'] = 'RustiMates';
        echo view('plantilla/header',$data);
        echo view('plantilla/nav');
        echo view('contenido/principal.php');
        echo view('plantilla/footer');
    }

public function quienes()
{
    $data['titulo'] = 'Quiénes somos';
        echo view('plantilla/header',$data).view('plantilla/nav').view('contenido/quienesSomos_view').view('plantilla/footer');

}
	public function comerc()
    {   
        $data['titulo'] = 'Comercialización';
        echo view('plantilla/header',$data);
        echo view('plantilla/nav');
        echo view('contenido/comercializacion_view');
        echo view('plantilla/footer');
    }


    public function term_us()
    {
        $data['titulo'] = 'Términos y usos';
        echo view('plantilla/header',$data);
        echo view('plantilla/nav');
        echo view('contenido/terminosUsos_view');
        echo view('plantilla/footer');
    }

    public function tips()
    {
        $data['titulo'] = 'Tips';
        echo view('plantilla/header',$data);
        echo view('plantilla/nav');
        echo view('contenido/tips_view');
        echo view('plantilla/footer');
    }

      public function f_listar_productos($id=null){
         $categoria = new CategoriaModel();
        $data['categorias'] = $categoria->findAll();

  $producto=new ProductoModel();
  $data['producto']=$producto->findAll();
  #$data['producto_categoria']=$producto_categoria->where('categoria_id',$id)->findAll();

     $data['titulo'] = 'Listado productos';
        echo view('plantilla/header',$data);
        echo view('plantilla/nav');
        echo view('producto/listar_productos_view');
        echo view('plantilla/footer');
}

      public function f_listar_productos_admi($id=null){
      $categoria= new CategoriaModel();
    $producto=new ProductoModel();

    $data['categorias']=$categoria->findAll();
    $data['producto']=$producto->getProductoAll();
    $data['titulo']='Listar Producto';
    return view ('plantilla/header',$data).view('plantilla/nav_admin').view('producto/listar_productos_admi');
  }


//ESTATICO
     public function f_mates()
    {
        $data['titulo'] = 'Mates';
        echo view('plantilla/header',$data);
        echo view('plantilla/nav');
        echo view('producto/mates');
        echo view('plantilla/footer');
    }

     public function f_bombillas()
    {
        $data['titulo'] = 'Bombillas';
        echo view('plantilla/header',$data);
        echo view('plantilla/nav');
        echo view('producto/bombillas');
        echo view('plantilla/footer');
    }

     public function f_termos()
    {
        $data['titulo'] = 'Termos';
        echo view('plantilla/header',$data);
        echo view('plantilla/nav');
        echo view('producto/termos');
        echo view('plantilla/footer');
    }

}
