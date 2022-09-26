<br>
<br>
<br>
<br>
<div class="alert-danger ancho-form mx-auto fw-bold mt-2 text-center">
  <?php $session = session();?>
  <?="<h3>".
  $session->getFlashdata('mensaje')."</h3>";?>
</div>
<h1 style="text-shadow: 2px 2px 5px yellow; color: red">AGREGAR PRODUCTOS</h1>

<br>
 <div class= container>
      <img class="d-block w-100" src="<?php echo base_url("public/img/carrousel2.jpg");?>" class="img-reposive d-none d-sm-block" alt="First slide">
 </div>
<br>


 <div class="card container text-center">
  <h4 class="card-header text-center py-4" style="text-shadow: 2px 2px 5px red; color: yellow; background-color: red" >
       Complete todos los campos para agregar un nuevo producto
    </h4>
  <br>

<?php if(isset($validation)){ ?>
  <div class="alert-danger">
  <?=$validation->listErrors(); ?>
  </div>
  <?php }?>

<?php echo form_open_multipart('agrego_producto') ?>

 <div class="form-group">
        <strong><label for="nombre_p" class="form-label">Nombre del producto</label></strong>
        <input name="nombre_p" id="nombre_p" class="form-control" value="<?=set_value('nombre_p');?>">
      </div>

<div class="form-group">
        <strong><label for="descripcion" class="form-label">Descripción del producto</label></strong>
        <input name="descripcion" id="descripcion" class="form-control" value="<?=set_value('descripcion');?>">
      </div>

<div class="form-group">
        <strong><label for="precio" class="form-label">Precio</label></strong>
        <input name="precio" id="precio" class="form-control" value="<?=set_value('precio');?>">
      </div>

<div class="form-group">
        <strong><label for="stock" class="form-label">Stock</label></strong>
        <input name="stock" id="stock" class="form-control" value="<?=set_value('stock');?>">
      </div>

<div class="form-group">
  <label for="categoria"><strong class="text-dark">Categoria</strong></label>
<?php
  $lista['0'] = 'Seleccione categoria';

  foreach ($categorias as $row){
    $id_categoria = $row['id_categoria'];
    $descripcion_categoria = $row['descripcion_categoria'];
    $lista[$id_categoria] = $descripcion_categoria;
  }
echo form_dropdown('categoria', $lista, set_value('categoria'),'class="form-control"');
?>
</div>
  

<br>
             <div class="form-group">
<label for="imagen"><strong class="text-dark">Ingrese imagen</strong></label><br>
<?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type' => 'file','placeholder' => '', 'value'=>set_value('imagen')]); ?>
</div>
<br>

<div class="col-12">
    <?php echo form_submit('Agregar','Agregar',"class='btn btn-danger'") ?>
     <button type="reset" class="btn btn-danger btn-block">Reestablecer</button>
  </div>
   <?php echo form_close(); ?>
</div>

<br>
<br>

