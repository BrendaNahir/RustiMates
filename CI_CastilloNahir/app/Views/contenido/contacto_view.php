<br>
<br>
<br>
<br>
<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 mb-4">
<div class="col-md-12 col-md-offset-3 col-sm-12 col-sm-offset-2 col-lg-12">
    <h1 style="text-shadow: 2px 2px 5px yellow; color: red;">INFORMACIÓN DE CONTACTO</h1>
    <div class="container d-flex justify-content-center text-dark">
      <img class="d-block w-100" src="<?php echo base_url("public/img/carrousel2.jpg");?>" class="img-reposive d-none d-sm-block" alt="First slide">
    </div>

<br>
<h4 style="text-shadow: 2px 2px 5px red; text-align: center;"> ¡Dejanos tu consulta, mensaje o comentario y te responderemos en breve!</h4> 
<br>

<div class = "container text-center">
<div class="row">
  <div class="col-md-6">

  <?php if(isset($validation)){ ?>
  <div class="alert-danger">
  <?=$validation->listErrors(); ?>
  </div>
  <?php }?>

  <?php echo form_open('registro_consulta') ?>
<!--form role="form"-->   
      
  <div class="form-group">
        <strong><label for="_consulta" class="form-label">Ingrese su nombre</label></strong>
          <input name="nombre" id="nombre_consulta" class="form-control" value="<?=set_value('nombre_consulta');?>">
      </div>

    <div class="form-group">
        <strong><label for="email_consulta" class="form-label">Ingrese su email</label></strong>
          <input name="email" id="email_consulta" class="form-control" value="<?=set_value('email_consulta');?>">
      </div>

        <div class="form-group">
        <strong><label for="motivo_consulta" class="form-label">Ingrese motivo</label></strong>
        <input name="motivo" id="motivo_consulta" class="form-control" value="<?=set_value('motivo_consulta');?>">
      </div>

      
    <div class="form-group">
        <strong><label for="mensaje_consulta" class="form-label">Ingrese mensaje</label></strong>
         <input name="mensaje" id="mensaje_consulta" class="form-control" value="<?=set_value('mensaje_consulta');?>">
      </div>
 
 <!--/form-->
 <br> 
 <!--button type="button" class="btn btn-secondary">Enviar</button-->
  <?php echo form_submit('Enviar', 'Enviar',"class='btn btn-danger pull-right'"); ?>
 <button type="reset" class="btn btn-danger btn-block">Reestablecer</button>
<?php echo form_close();?>

</div>

<div class="col-md-6">
  <h4 class="text-dark"><strong> ¿Cómo llegar al local? </strong></h4>
  <div class="map-responsive">
    
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.735529163846!2d-58.834754485277735!3d-27.477491823612162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456c9e9d51269b%3A0xdb60a3e5f6191fb9!2sLavalle%201500%2C%20W3410BDF%20Corrientes!5e0!3m2!1ses-419!2sar!4v1650141727892!5m2!1ses-419!2sar" width=100% height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</div>
</div>
</div>
</div>
</div>

<br>