<br>
<br>
<br>
<br>
<br>


<h1 style="text-shadow: 2px 2px 5px yellow; color: red">LISTADO DE CONSULTAS</h1>
<br>
<div class="container">
  <table id="mytable" class="table table-bordred table-striped table-hover table-ligth">
    <thead class="table-dark">
      <th>Nombre</th>
      <th>Email</th>
      <th>Motivo</th>
      <th>Mensaje</th>
      <th>Leido/NoLeido</th>
  
    </thead>
    <tbody>
      <?php foreach($consulta as $row) {?>
      <tr>
        <td><?php echo $row['nombre_consulta'];?></td>
        <td><?php echo $row['email_consulta'];?></td>
        <td><?php echo $row['motivo_consulta'];?></td>
        <td><?php echo $row['mensaje_consulta'];?></td>

<?php 
  if ($row['estado_consulta'] == 0){ ?>
  <td> <a class="btn btn-danger" href="<?php echo base_url('ConsultaController/f_consulta_leida/'.$row['id_consulta'])?>">No leido</a>
  </td>
  <?php } else {
    ?> <td> <a class="btn btn-success" href="<?php echo base_url('ConsultaController/f_consulta_noleida/'.$row['id_consulta'])?>">Leido</a>
  </td>    
  <?php } ?>
</tr>
<?php } ?>
</tbody>
</table>
</div>
     