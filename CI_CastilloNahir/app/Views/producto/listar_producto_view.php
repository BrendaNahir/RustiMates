<br>
<br>
<br>
<br>
<br>

<div class="alert-danger ancho-form mx-auto fw-bold mt-2 text-center">
  <?php $session = session();?>
  <?="<h3>".
  $session->getFlashdata('mensaje')."</h3>";?>
</div>

<h1 style="text-shadow: 2px 2px 5px yellow; color: red">GESTIÓN DE PRODUCTOS</h1>
<br>
<div class="container">
	<table id="mytable" class="table table-bordred table-striped table-hover table-ligth">
		<thead class="table-dark">
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Precio</th>
			<th>Stock</th>
			<th>Categoría</th>
			<th>Imagen</th>
			<th>Editar</th>
			<th>Activar/Eliminar</th>
		</thead>
		<tbody>
			<?php foreach($producto as $row){?>
			<tr>
				<td><?php echo $row['nombre_p'];?></td>
				<td><?php echo $row['descripcion'];?></td>
				<td><?php echo $row['precio'];?></td>
				<td><?php echo $row['stock'];?></td>
				<td><?php echo $row['descripcion_categoria'];?></td>
				<td><img src="<?php echo base_url('public/img/'.$row['imagen']); ?>" alt="" height="100" width="100"/></td>
				<td>
					<a class="btn btn-success" href="<?php echo base_url('editar/'.$row['id_producto']);?>">Editar</a></td>
						<?php 
						if ($row['estado_p'] == 1){?>
						<td><a class="btn btn-danger" href="<?php echo base_url('ProductoController/eliminar_producto/'.$row['id_producto']);?>">Eliminar</a></td>
						<?php } else {
							?><td><a class="btn btn-danger" href="<?php echo base_url('ProductoController/activar_producto/'.$row['id_producto']);?>">Activar</a></td>
						<?php } ?>
			</tr>
			<?php }?>
		</tbody>
	</table>
	<br>
	<br>
</div>



</div>