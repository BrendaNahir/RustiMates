<br>
<br>
<br>
<br>

<link rel="stylesheet" href="public/assets/css/estilos">

<h1 style="text-shadow: 2px 2px 5px yellow; color: red">INICIARrrrr SESIÓN</h1>

<br>
 <div class= container>
      <img class="d-block w-100" src="<?php echo base_url("public/img/carrousel2.jpg");?>" class="img-reposive d-none d-sm-block" alt="First slide">
    </div>
<br>

<div class="container text-center">
  <h4 style="text-shadow: 2px 2px 5px red; color: red;">Ingrese a su cuenta para realizar las compras</h4>
  <br>

<?php if(isset($validation)){ ?>
  <div class="alert-danger">
  <?=$validation->listErrors(); ?>
  </div>
  <?php }?>
   
   <?php echo form_open('inicio_cliente') ?>

<div class="alert-danger ancho-form mx-auto fw-bold mt-2 text-center">
  <?php $session = session();?>
  <?="<h3>".
  $session->getFlashdata('mensaje')."</h3>";?>
</div>

 <div class="form-group">
        <strong><label for="email" class="form-label">Ingrese su email</label></strong>
        <input name="email" id="email" class="form-control" value="<?=set_value('email');?>">
      </div>

<div class="form-group">
        <strong><label for="password" class="form-label">Ingrese su contraseña</label></strong>
        <input type="password" name="pass" id="pass" class="form-control" value="<?=set_value('pass');?>">
      </div>

<!--div class="form-group">
  <label for="nombre">Ingrese su email</label>
  <?php echo form_input(['name' => 'email','id' => 'email','class' => 'form-control','placeholder' => 'Email']);?>
</div>
<div class="form-group">
  <label for="nombre">Ingrese su contraseña</label>
  <?php echo form_password(['name' => 'pass','id' => 'pass','class' => 'form-control','placeholder' => 'Pass']);?>
</div-->
<br>
<div class="col-12">
    <?php echo form_submit('Iniciar Sesión','Iniciar Sesión',"class='btn btn-danger'") ?>
     <button type="reset" class="btn btn-danger btn-block">Reestablecer</button>
  </div>
   <?php echo form_close(); ?>

</div>

<br>

