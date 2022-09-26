<br>
<br>
<br>
<br>
<div class="alert-danger ancho-form mx-auto fw-bold mt-2 text-center">
  <?php $session = session();?>
  <?="<h3>".
  $session->getFlashdata('mensaje')."</h3>";?>
</div>

<h1 style="text-shadow: 2px 2px 5px yellow; color: red">PRODUCTOS</h1>
 <br>


 <div class="container text-center">
<?php 
echo form_open('mostrar_por_categoria', ['class' => 'form-signin', 'role' => 'form'] );
 $lista['0'] = 'Todos';
    foreach ($categorias as $row){
    $id_categoria = $row['id_categoria'];
    $descripcion_categoria = $row['descripcion_categoria'];
    $lista[$id_categoria] = $descripcion_categoria;
  }
echo form_dropdown('categoria', $lista,'class="form-control"');
?>
  <?php echo form_submit('Buscar','Buscar', "class='btn btn-outline-danger'"); ?>
  <?php echo form_close();?>
</div>


<br>

 <div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($producto as $row) {?>
    <?php if (($row['estado_p'] == 1) && ($row['stock']>0)){?>

      
    <div class="col">
    <div class="card h-100 text-center" style="height: 100%;">
      <img class="card-img-top" src="<?php echo base_url('public/img/'.$row['imagen']);?>" alt="Card image cap">

       <div class="card-body">
        <h4 style="text-shadow: 2px 2px 5px red;text-align: center;"><?php echo $row['nombre_p'] ?> (
          <?php echo $row['stock'] ?> )</h4>
         <p class="text-dark"><?php echo $row['descripcion'] ?></p>
        <h5 style="text-shadow: 2px 2px 5px red;text-align: center;"> $ <?php echo $row['precio'] ?></h5>
    
          
          <div class="card-footer"> 
           <?php if (session('login')) { 
           
      echo form_open('CarritoController/agregar_carrito');
      echo form_hidden('id', $row['id_producto']);
      echo form_hidden('nombre', $row['nombre_p']);
      echo form_hidden('precio', $row['precio']);
      echo form_submit('Agregar al carrito', 'Agregar al carrito',"class='btn btn-success'");
      echo form_close();

       } ?>
       </div>
     </div>
    </div>
     </div>
  <?php } ?>
  <?php } ?>
   </div> 
 </div>

  <br>