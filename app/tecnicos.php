<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Usuarios</div>
				<div class="panel-body">
					<table id="datos" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Cedula</th>
                        <th>Nombre</th>
						<th>Apellido</th>
                        <th>Acciones</th>
					</tr>
				</thead>
				<tbody>
                	<?php
                    		$Query = mysql_query("SELECT * FROM tecnico");
							while($Datos = mysql_fetch_array($Query)){
					?>
					<tr>
						<td><?php echo $Datos['cedula_tec']; ?></td>
						<td><?php echo $Datos['nombre_tec']; ?></td>
						<td><?php echo $Datos['apellido_tec']; ?></td>
                        <td align="center"> 
                        <a href="index.php?lugar=detalles&type=tecnicos&id=<?php echo $Datos['id_tec'];?>" class="btn btn-warning" title="Ver Detalles"><i class="fa fa-server"></i></a>&nbsp;
                         <?php
                                	if ($_SESSION['NivelUserLoginSystem']=="1"){
								?>
                        <a href="index.php?lugar=editar&type=tecnicos&id=<?php echo $Datos['id_tec'];?>" class="btn btn-info" title="Editar"><i class="fa fa-pencil"></i></a>&nbsp;
                        <a href="index.php?lugar=delete&type=tecnicos&id=<?php echo $Datos['id_tec'];?>" class="btn btn-danger delete" title="Borrar"><i class="fa fa-trash-o"></i></a>&nbsp;
                        <?php
									}
						?>
                        </td>
					</tr>
                    <?php } ?>
				</tbody>
			</table>

				</div>
			</div>
		</div>
	</div>
</div>   