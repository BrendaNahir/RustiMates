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
<br>


<h1 style="text-shadow: 2px 2px 5px yellow; color: red">DETALLE DE VENTA</h1>
<br>

<div class="container">
	<table id="mytable" class="table table-bordred table-striped table-hover table-ligth">
	

			<thead class="table-dark">
			<th>Producto</th>
			<th>Descripción</th>
			<th>Cantidad</th>
			<th>Precio unitario</th>
			<th>Precio total</th>
		</thead>

		<tbody>
			<?php 
			$total = 0;

			foreach($detalle_venta as $row){ ?>
			<tr>
				<td><?php echo $row['nombre_p'];?></td>
				<td> <?php echo $row['descripcion']; ?> </td>
 				<td><?php echo $row['detalle_cantidad']; ?> </td>
 				<td> <?php echo number_format($row['detalle_precio'],2); ?> </td>
				<td><?php echo number_format ($row['detalle_precio']*$row['detalle_cantidad'],2); ?></td>
				<?php $total = $total + $row['detalle_precio'] * $row['detalle_cantidad']; ?>
				
			</tr>
			<?php }?>
			<td>Total de la compra: $<?php echo number_format($total,2); ?> </td>
		</tbody>
		
	</table>
	<br>
	<br>
</div>
