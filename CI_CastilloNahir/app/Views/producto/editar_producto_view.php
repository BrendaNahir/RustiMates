<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
  <div class="container-fluid">
    <!--img src="public/img/logo3.png" alt="" width="90" height="60"-->

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("listado_consultas");?>">Listar consultas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("listar_productos_admi");?>">Listar productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("listar_ventas");?>">Listar ventas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("agregar_producto");?>">Agregar producto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("listar_producto");?>">Gestionar producto</a>
        </li>
       
      </ul>
      
        <form class="d-flex">
          <a class="nav-link" href="#" style="color: red"><?php echo session('apellido');?> </a>
        <a class="btn btn-outline-danger" type="submit" href="<?php echo base_url("logout");?>">Salir</a>
      </form>

    </div>
  </div>
</nav>
</header>

<br>
<br>
<br>
<br>


<!--head><link rel="stylesheet" href="public/assets/css/estilos.css"></head-->
 
<h1 style="text-shadow: 2px 2px 5px yellow; color: red">EDITAR PRODUCTO</h1>
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

<?php echo form_open_multipart('ProductoController/actualizar_producto') ?>

 <div class="form-group">
        <strong><label for="nombre_p" class="form-label">Nombre del producto</label></strong>
        <?php echo form_input(['name'=>'nombre_p', 'id'=>'nombre_p', 'class'=>'form-control', 'autofocus'=>'autofocus', 'value'=>$producto['nombre_p']]); ?>
      </div>

<div class="form-group">
        <strong><label for="descripcion" class="form-label">Descripción del producto</label></strong>
        <?php echo form_input(['name'=>'descripcion', 'id'=>'descripcion', 'class'=>'form-control', 'autofocus'=>'autofocus', 'value'=>$producto['descripcion']]); ?>
      </div>

<div class="form-group">
        <strong><label for="precio" class="form-label">Precio</label></strong>
        <?php echo form_input(['name'=>'precio', 'id'=>'precio', 'class'=>'form-control', 'autofocus'=>'autofocus', 'value'=>$producto['precio']]); ?>
      </div>

<div class="form-group">
        <strong><label for="stock" class="form-label">Stock</label></strong>
       <?php echo form_input(['name'=>'stock', 'id'=>'stock', 'class'=>'form-control', 'autofocus'=>'autofocus', 'value'=>$producto['stock']]); ?>
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
echo form_dropdown('categoria', $lista, $producto['categoria_id'],'class="form-control"');
?>
</div>
  
<br>
             <div class="form-group">
<label for="imagen"><strong class="text-dark">Imagen</strong></label><br>
<img src="<?php echo base_url('public/img/' .$producto['imagen'])?>" alt="" height="100">
     <?php echo form_input(['name'=>'imagen', 'id'=>'imagen', 'type'=>'file']); ?>
</div>
<br>

<?php echo form_hidden('id',$producto['id_producto']); ?>

<div class="col-12">
    <?php echo form_submit('Modificar','Modificar',"class='btn btn-danger'") ?>
     <button type="reset" class="btn btn-danger btn-block">Reestablecer</button>
  </div>
   <?php echo form_close(); ?>
</div>

<br>
<br>