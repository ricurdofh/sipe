<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Prestamos Pendientes Por Aprobar</div>
				<div class="panel-body">
					<table id="datos" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Solicitante</th>
                       
						<th>Fecha Solicitud</th>
						<th>Hora Solicitud</th>
                       
                        <th>Status</th>
                        <th>Acciones</th>
					</tr>
				</thead>
				<tbody>
                	<?php
$Query = mysql_query("SELECT * FROM solicitud WHERE aprobado_sol='2'");
while ($Datos = mysql_fetch_array($Query)) {
	?>
					<tr>
						<td><?php

	$Usuario = mysql_query("SELECT * FROM usuarios WHERE id_user='" . $Datos['id_user'] . "' LIMIT 1");
	$User = mysql_fetch_array($Usuario);
	echo $User['nombres_user'] . " " . $User['apellidos_user'];?></td>
						
						<td><?php echo $Datos['fecha_sol'];?></td>
						<td><?php echo $Datos['hora_sol'];?></td>
						
                        <td><?php if ($Datos['aprobado_sol'] == "1") {
		echo "APROBADO";
	} else {
		echo "PENDIENTE";
	}

	?></td>
                        <td align="center">
                        <a href="index.php?lugar=prestamos_estatus&id=<?php echo $Datos['id_sol'];?>" class="btn btn-info" title="Cambiar Status"><i class="fa fa-refresh"></i></a>&nbsp;
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