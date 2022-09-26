<br>
<br>
<br>
<br>
<br>


<h1 style="text-shadow: 2px 2px 5px yellow; color: red">LISTADO DE PRODUCTOS</h1>
<br>
<div class="container">
  <table id="mytable" class="table table-bordred table-striped table-hover table-light">
    <thead class="table-dark">
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Precio</th>
      <th>Stock</th>
      <th>Categoría</th>
      <th>Imagen</th>
  
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
    
     
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>



</div>