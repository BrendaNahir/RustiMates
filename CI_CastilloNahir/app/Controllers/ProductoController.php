<?php

namespace App\Controllers;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;


class ProductoController extends BaseController
{
   
    public function f_agregar()
    {   
        $categoria = new CategoriaModel();
        $data['categorias'] = $categoria->findAll();

        $data['titulo'] = 'RustiMates';
        echo view('plantilla/header',$data);
        echo view('plantilla/nav_admin');
        echo view('producto/agregar');
    }

    public function f_agregar_producto()
    {

$request = \Config\Services::request();
      $session = session();

        if ($request->getMethod(true)){
        $rules=[
          'nombre_p'=> 'required|alpha_space|is_unique[producto.nombre_p]',
          'descripcion'=> 'required',
          'precio'=> 'required|decimal',
          'stock'=> 'required|is_natural_no_zero',
          'categoria'=> 'required|is_not_unique[producto_categoria.id_categoria]',
          'imagen'=> 'is_image[imagen]|uploaded[imagen]',
       ];
    
        $validations=$this->validate($rules);
            if ($validations){
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'public/img', $nombre_aleatorio);

            $data=[
                'nombre_p'=>$request->getPost('nombre_p'),
                'descripcion'=>$request->getPost('descripcion'),
                'precio'=>$request->getPost('precio'),
                'stock'=>$request->getPost('stock'),
                'categoria_id'=>$request->getPost('categoria'),
                'imagen'=>$nombre_aleatorio,
                'estado_p'=> 1,
            ];

            
            //Se instancia el objeto modelo
            $producto= new ProductoModel();
            //Se insertan los datos a través del modelo
            $producto->insert($data);

            //redireccionar a la pagina del get donde esta el form
            $session->setFlashdata('mensaje','¡El producto se agregó correctamente!');
            return redirect()->route('agregar_producto');

          } else {
            //Errores de validación
            $categoria = new CategoriaModel();
            $data['categorias'] = $categoria->findAll();
             $data['validation']=$this->validator;
          }

    $data['titulo']='Agregar producto';
   // $data['categorias'] = $categoria->findAll();
      echo view('plantilla/header',$data);
      echo view('plantilla/nav_admin');
      echo view('producto/agregar');
    }
  }


public function gestionar_producto()
  {
    $categoria= new CategoriaModel();
    $producto=new ProductoModel();

    $data['categorias']=$categoria->findAll();
    $data['producto']=$producto->getProductoAll();
    $data['titulo']='Listar Producto';
    return view ('plantilla/header',$data).view('plantilla/nav_admin').view('producto/listar_producto_view');
  }

public function editar_producto($id=null)
  {
    $categoria= new CategoriaModel();
    $producto=new ProductoModel();
    $data['categorias']=$categoria->findAll();
    $data['producto']=$producto->where('id_producto',$id)->first();

    $data['titulo']='Editar Producto';
    return view ('plantilla/header',$data).view('producto/editar_producto_view');
  }

public function actualizar_producto()
  {
    $request=\Config\Services::request();
 $session = session();

        if ($request->getMethod(true)){
          $categoria = new CategoriaModel();
          $data['categorias'] = $categoria->findAll();
          $producto = new ProductoModel();

            $id = $request->getPost('id');
   $rules=[
          'nombre_p' =>'required|alpha_space',
          'descripcion'=> 'required',
          'precio'=> 'required|decimal',
          'stock'=> 'required|is_natural_no_zero',
          'categoria'=> 'required|is_not_unique[producto_categoria.id_categoria]',
          'imagen'=> 'is_image[imagen]',
          ];
    
    $validations=$this->validate($rules);
            if ($validations){
       $data = [
      'nombre_p'=>$request->getPost('nombre_p'),
      'descripcion'=>$request->getPost('descripcion'),
      'precio'=>$request->getPost('precio'),
      'stock'=>$request->getPost('stock'),
      'categoria_id'=> $request->getPost('categoria'),
      'estado_p'=> 1,
              ];
               $producto->update($id,$data);

      $img = $this->request->getFile('imagen'); //tomo la imagen desde el formulario
      $rules = [
            'imagen'=>'is_image[imagen]|uploaded[imagen]',
          ];

          $validations=$this->validate($rules);
      if ($img->isValid()){
          $nombre_aleatorio = $img->getRandomName(); //le doy un nombre aleatorio
          $img->move(ROOTPATH.'public/img', $nombre_aleatorio); //guarda la imagen ahi
          $data = [
            'imagen' => $img->getName(),
          ];
      }
            //Se insertan los datos a través del modelo
             $producto->update($id,$data);
      //Mensaje el producto se actualizo correctamente

            //redireccionar a la pagina del get donde esta el form
            $session->setFlashdata('mensaje','¡El producto se actualizó correctamente!');
            return redirect()->route('listar_producto');
 } else {
            //Errores de validación
             $data['validation']=$this->validator;
          }
$data['titulo']='Editar producto';
$data['producto']=$producto->where('id_producto',$id)->first();
      echo view('plantilla/header',$data);
     echo view('plantilla/nav_admin');
      echo view('producto/editar_producto_view');
   }
  }



public function activar_producto($id=null)
  {
    $producto=new ProductoModel();

    $data= array('estado_p'=>'1');
    $producto->update($id,$data);
    return redirect()->route('listar_producto');
  }

public function eliminar_producto($id=null)
  {
    $producto=new ProductoModel();

    $data['producto']=$producto->getProductoAll();
    $data= array('estado_p'=>'0');
    $producto->update($id,$data);
    return redirect()->route('listar_producto');
  }
  
  public function categoria_productos($id=null){
    $request=\Config\Services::request();
    $id=$request->getPost('categoria');
    $categoria = new CategoriaModel();
    $data['categorias'] = $categoria->findAll();
    $producto = new ProductoModel();

    if ($id == "0"){
      $data['producto'] = $producto->getProductoAll();
    } else {
      $data['producto'] = $producto->where('categoria_id',$id)->findAll();
    }

    $data['titulo'] = 'Productos';
    echo view('plantilla/header',$data);
      echo view('plantilla/nav');
      echo view('producto/listar_productos_view');
      echo view('plantilla/footer');
  }

}
