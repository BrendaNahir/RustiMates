	<br>
<br>
<br>
<br>
<h1 style="text-shadow: 2px 2px 5px yellow; color: red">REGISTRARSE</h1>
<br>
 <div class= container>
      <img class="d-block w-100" src="<?php echo base_url("public/img/carrousel2.jpg");?>" class="img-reposive d-none d-sm-block" alt="First slide">
 </div>
<br>


  <div class="card container text-center">
	<h4 class="card-header text-center py-4" style="text-shadow: 2px 2px 5px red; color: yellow; background-color: red" >
       Regístrese para tener acceso completo a nuestra web
    </h4>
	<br>

<?php if(isset($validation)){ ?>
  <div class="alert-danger">
  <?=$validation->listErrors(); ?>
  </div>
  <?php }?>

<?php echo form_open('registro_cliente') ?>


	<div class="well bs-component form-horizontal">
			
				<fieldset>
					<div class="form-row">
				<div class="form-group">
        <strong><label for="nombre" class="form-label">Ingrese su nombre</label></strong>
        <input name="nombre" id="nombre" class="form-control" value="<?=set_value('nombre');?>">
      </div>

<div class="form-group">
        <strong><label for="apellido" class="form-label">Ingrese su apellido</label></strong>
        <input name="apellido" id="apellido" class="form-control" value="<?=set_value('apellido');?>">
      </div>
					</div>


					<div class="md-form mt-0">
						
					<div class="form-group">
        <strong><label for="dni" class="form-label">Ingrese su dni</label></strong>
        <input name="dni" id="dni" class="form-control" value="<?=set_value('dni');?>">
      </div>
  </div>

      	<div class="md-form mt-0">
						
						
					<div class="form-group">
        <strong><label for="provincia" class="form-label">Ingrese su provincia</label></strong>
        <input name="provincia" id="provincia" class="form-control" value="<?=set_value('provincia');?>">
      </div>

						
					</div>


					<div class="md-form mt-0">
						
					<div class="form-group">
        <strong><label for="direccion" class="form-label">Ingrese su direccion</label></strong>
        <input name="direccion" id="direccion" class="form-control" value="<?=set_value('direccion');?>">
      </div>
  </div>

				<div class="md-form mt-0">
						
						
					<div class="form-group">
        <strong><label for="email" class="form-label">Ingrese su email</label></strong>
        <input name="email" id="email" class="form-control" value="<?=set_value('email');?>">
      </div>

						
					</div>
		
					<div class="md-form">
						
						<div class="form-group">
        <strong><label for="password" class="form-label">Ingrese su contraseña</label></strong>
        <input type="password" name="pass" id="pass" class="form-control" value="<?=set_value('pass');?>">
      </div>

						
					</div>
					<div class="md-form">
						
					<div class="form-group">
        <strong><label for="passconf" class="form-label">Repita su contraseña</label></strong>
        <input type="password" name="passconf" id="passconf" class="form-control" value="<?=set_value('passconf');?>">
      </div>
						
					</div>
					<br>
  <div class="col-lg-12 col-lg-offset-4 text-center">
            <?php echo form_submit('submit', 'Registrarse',"class='btn btn-danger' "); ?>
            <?php echo form_reset ('Reestablecer', 'Reestablecer', "class='btn btn-danger'"); ?><br>
            <?php echo form_close(); ?>
          </div>
          <br>
				</fieldset>
			</div>
		</div>
	