<?php

namespace App\Controllers;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use App\Models\VentaModel;
use App\Models\DetalleVentaModel;


class VentaController extends BaseController
{

   public function realizar_pedido(){
      $cart = \Config\Services::cart();
      $session = session();
      $venta = new VentaModel();
      $detalle = new DetalleVentaModel();
      $producto = new ProductoModel();

          $data = array(
      'usuarios_id' => session('id'),
      'venta_fecha'=> date('Y-m-d'),
  
      );
  	//Se lee el ultimo id de la factura
  	$venta_id = $venta->insert($data);


//Cuerpo de la factura (detalle de la factura)
    $cart1 = $cart->contents();
       foreach ($cart1 as $item){
          $detalle_venta = array(
        'id_venta'=>$venta_id,
        'producto_id'=>$item['id'],
        'detalle_cantidad'=>$item['qty'],
        'detalle_precio'=>$item['price'],
      );
  	
     $productoStock = $producto->where('id_producto', $item['id'])->first();
         //Controlar el stock (si existe stock del producto entonces agregar)
         // var_dump($productoStock['stock']);die; Para probar que datos muestra
         if($item['qty'] <= $productoStock['stock'] ){
             $data=[
                 'stock' => $productoStock['stock'] - $item['qty'],
             ];
             $producto->update($item['id'], $data);
         }else{

           //echo ('no hay stock del producto id: '.$producto->nombre);
          $session->setFlashdata('mensaje','No hay stock suficiente del producto: '.$item['name']);
           return redirect()->route('ver_carrito');
            
         }
  	
  		$detalle->insert($detalle_venta);
    }
      $cart->destroy();
      $session->setFlashdata('mensaje','¡Su compra se realizó con éxito!');
      return redirect()->route('listar_productos');
  	
      }



public function realizar_pedidooo(){
      $cart = \Config\Services::cart();
      $session = session();
      $venta = new VentaModel();
      $detalle = new DetalleVentaModel();
      $producto = new ProductoModel();


//Cuerpo de la factura (detalle de la factura)
      $cart1 = $cart->contents();
       foreach ($cart1 as $item){
         $stock = $producto->where('id_producto', $item['id'])->first();
         if($item['qty'] <= $stock['stock'] ){
             $data = array(
      'usuarios_id' => session('id'),
      'venta_fecha'=> date('Y-m-d'),
      );
    //Se lee el ultimo id de la factura
    $venta_id = $venta->insert($data);}

    else {
       $session->setFlashdata('mensaje','¡No hay stock suficiente!');
           return redirect()->route('ver_carrito');
    }



      $cart1 = $cart->contents();
       foreach ($cart1 as $item){
          $detalle_venta = array(
        'id_venta'=>$venta_id,
        'producto_id'=>$item['id'],
        'detalle_cantidad'=>$item['qty'],
        'detalle_precio'=>$item['price'],
      );
    
    // $productoStock = $producto->where('id_producto', $item['id'])->first();
         //Controlar el stock (si existe stock del producto entonces agregar)
         // var_dump($productoStock['stock']);die; Para probar que datos muestra
         if($item['qty'] <= $stock['stock'] ){
             $data=[
                 'stock' => $stock['stock'] - $item['qty'],
             ];
             $producto->update($item['id'], $data);
           }
      
         else{

           //echo ('no hay stock del producto id: '.$producto->nombre);
          $session->setFlashdata('mensaje','¡No hay stock suficiente!');
           return redirect()->route('ver_carrito');
            
         }
    
      $detalle->insert($detalle_venta);}
      $cart->destroy();
      $session->setFlashdata('mensaje','¡Su compra se realizó con éxito!');
      return redirect()->route('listar_productos');
    }
    
}




  public function f_listar_ventas()
    {   
        $venta = new VentaModel();
        $data['venta'] = $venta->getVentasAll();

        $data['titulo'] = 'Listado de las Ventas';
        echo view('plantilla/header',$data);
        echo view('plantilla/nav_admin');
        echo view('venta/listado_ventas');
    }


    public function f_venta_detalle($id=null)
  {
    $request = \Config\Services::request();
    $detalle_venta=new DetalleVentaModel();
    $data['detalle_venta']=$detalle_venta->DetalleVentaId($id);

    $data['titulo']='Detalle Venta';
    return view ('plantilla/header',$data).view('venta/venta_detalle');
  }

}







