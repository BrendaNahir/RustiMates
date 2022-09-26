 <header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
  <div class="container-fluid">
  	<img src="public/img/logo3.png" alt="" width="90" height="60">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("index");?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("somos");?>">¿Quiénes Somos?</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("comercializacion");?>">Comercialización</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("contacto");?>">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("terminos_usos");?>">Términos y Usos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("listar_productos");?>">Productos</a>
        </li>
        <!--li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos Est
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo base_url("mates");?>">Mates</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url("bombillas");?>">Bombillas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url("termos");?>">Termos</a></li>
          
          </ul>
        </li-->

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("tips");?>">Tips</a>
        </li>
      </ul>

      <?php if (session('login')){?>
       
         <form class="d-flex">
          <a class="nav-link" href="#" style="color: red"><?php echo session('apellido');?> </a>
        <a class="btn btn-outline-danger" type="submit" href="<?php echo base_url('ver_carrito');?>">Carrito</a>
        <a class="btn btn-outline-danger" type="submit" href="<?php echo base_url("logout");?>">Salir</a>
      </form>

        <?php } else { ?>
            <form class="d-flex">
        <a class="btn btn-outline-danger" type="submit" href="<?php echo base_url("registrarse");?>">Registrarse</a>
        <a class="btn btn-outline-danger" type="submit" href="<?php echo base_url("iniciar_sesion");?>">Iniciar Sesión</a>
      </form>
        <?php } ?>
      
    </div>
  </div>
</nav>
</header>