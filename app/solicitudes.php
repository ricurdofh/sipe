<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Solicitudes</div>
				<div class="panel-body">
					<table id="datos" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Solicitante</th>
						<th>Fecha Solicitud</th>
                        <th>Acciones</th>
					</tr>
				</thead>
				<tbody>
                	<?php
                    		$Query = mysql_query("SELECT * FROM solicitud WHERE aprobado_sol!=0");
							while($Datos = mysql_fetch_array($Query)){
					?>
					<tr>
						<td><?php
						
								$Usuario = mysql_query("SELECT * FROM usuarios WHERE id_user='".$Datos['id_user']."' LIMIT 1");
								$User = mysql_fetch_array($Usuario);
								echo $User['nombres_user']." ".$User['apellidos_user']; ?></td>
						
						<td><?php echo $Datos['fecha_sol']; ?></td>
						
                        <td align="center">
                        <?php
                        if ($Datos['aprobado_sol'] == 1) {
                         ?><a href="index.php?lugar=planillas&id=<?php echo $Datos['id_sol'];?>" class="btn btn-warning" title="Ver Planilla"><i class="fa fa-file-pdf-o"></i></a>&nbsp;<?php
                        }
                        ?>
                         <?php
                        if ($Datos['aprobado_sol'] == 2) {
                         ?>
                        <a href="index.php?lugar=editar&type=solicitud&id=<?php echo $Datos['id_sol'];?>" class="btn btn-info" title="Editar"><i class="fa fa-pencil"></i></a>&nbsp;
                        <a href="index.php?lugar=delete&type=solicitud&id=<?php echo $Datos['id_sol'];?>" class="btn btn-danger delete" title="Borrar"><i class="fa fa-trash-o"></i></a>&nbsp;
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