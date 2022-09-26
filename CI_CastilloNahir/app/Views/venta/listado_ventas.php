<br>
<br>
<br>
<br>
<br>


<h1 style="text-shadow: 2px 2px 5px yellow; color: red">LISTADO DE VENTAS</h1>
<br>
<div class="container">
  <table id="mytable" class="table table-bordred table-striped table-hover table-light">
    <thead class="table-dark">
      <th>N° Factura</th>
      <th>Apellido</th>
      <th>Nombre</th>
      <th>Fecha</th>
      <th>Detalle</th>
  
    </thead>
    <tbody>
      <?php foreach($venta as $row){?>
      <tr>
        <td><?php echo $row['venta_id'];?></td>
        <td><?php echo $row['apellido'];?></td>
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['venta_fecha'];?></td>
        <td>
          <a class="btn btn-success" href="<?php echo base_url('ver_detalle_venta/'.$row['venta_id']);?>">Ver</a></td>
    
     
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>



</div>