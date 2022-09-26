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