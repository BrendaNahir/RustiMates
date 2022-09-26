<br>
<br>
<br>
<br>

<?php $cart = \Config\Services::cart(); 
$carrito = $cart->contents();
?>

<div class="alert-danger ancho-form mx-auto fw-bold mt-2 text-center">
  <?php $session = session();?>
  <?="<h3>".
  $session->getFlashdata('mensaje')."</h3>";?>
</div>

<h1 style="text-shadow: 2px 2px 5px yellow; color: red">CARRITO DE COMPRAS</h1>
<br>
		<!--a href="<?php echo base_url('Lista_de_Productos2'); ?>" class="btn btn-success"
		role="button">Continuar comprando</a-->
	<div class="table-responsive">
	<table id="mytable" class="table table-bordered table-striped" style="background-image: url(assets/img/fondo.jpg);">
	
			<thead>
				<td class="table-danger">Nº item</td>
				<td class="table-danger">Nombre</td>
				<td class="table-danger">Precio</td>
				<td class="table-danger">Cantidad</td>
				<td class="table-danger">Subtotal</td>
				<td class="table-danger">Acción</td>
			</thead>
<tbody>
	<?php
	$total = 0;
		$i = 1;
	
			foreach($carrito as $item){?>
			<tr>

				<td><?php echo $i++ ;?></td>
				<td><?php echo $item['name'];?></td>
				<td>$ <?php echo number_format($item['price'], 2); ?></td>
				<!--td><?php echo $item['qty'];?></td-->
					<td class="table-success">
			<?php echo $item['qty']; ?>
			<?php echo anchor('CarritoController/aumentar/'.$item['rowid'],'+','class="btn btn-success"'); ?>
			<?php echo anchor('CarritoController/disminuir/'.$item['rowid'],'-','class="btn btn-success"'); ?>
		</td>
				<td> $ <?php echo number_format($item['subtotal'], 2); $total = $total + $item['subtotal']?></td>
				<td><a class="btn btn-danger" href="<?php echo base_url('CarritoController/borrar/'.$item['rowid']);?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>

	<tbody>

	<tr>
	
		<td> Total Compra:$ <?php echo number_format($total,2); ?></td>

	<td> <a class="btn btn-danger"
	<?php echo anchor('CarritoController/borrar/all','Vaciar carrito'); ?></a></td>
		<td class="table-success"><a href="<?php echo base_url('VentaController/realizar_pedido'); ?>" class="btn btn-success"
		role="button">Ordenar compra</a></td>
	</tr>

	</tbody>
  </table>
</div>
<br>
<br>