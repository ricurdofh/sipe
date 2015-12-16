<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Usuarios</div>
				<div class="panel-body">
					<table id="datos" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Cedula</th>
						<th>Usuario</th>
                        <th>Nombre</th>
						<th>Apellido</th>
                        <th>Acciones</th>
					</tr>
				</thead>
				<tbody>
                	<?php
$Query = mysql_query("SELECT * FROM usuarios");
while ($Datos = mysql_fetch_array($Query)) {
	?>
					<tr>
						<td><?php echo $Datos['ci_user'];?></td>
						<td><?php echo $Datos['usuario_user'];?></td>
						<td><?php echo $Datos['nombres_user'];?></td>
						<td><?php echo $Datos['apellidos_user'];?></td>
                        <td align="center">
                        <a href="index.php?lugar=detalles&type=usuarios&id=<?php echo $Datos['id_user'];?>" class="btn btn-warning" title="Ver Detalles"><i class="fa fa-server"></i></a>&nbsp;
                        <a href="index.php?lugar=editar&type=usuarios&id=<?php echo $Datos['id_user'];?>" class="btn btn-info" title="Editar"><i class="fa fa-pencil"></i></a>&nbsp;
                        <a href="index.php?lugar=delete&type=usuarios&id=<?php echo $Datos['id_user'];?>" class="btn btn-danger delete" title="Borrar"><i class="fa fa-trash-o"></i></a>&nbsp;
                        </td>
					</tr>
                    <?php }
?>
				</tbody>
			</table>

				</div>
			</div>
		</div>
	</div>
</div>