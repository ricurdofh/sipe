<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Equipos Prestados</div>
				<div class="panel-body">
					<table id="datos" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Solicitante</th>
                        <th>Tipo</th>
						<th>Fecha Solicitud</th>
                        <th>Cantidad</th>
                       
                        <th>Acciones</th>
					</tr>
				</thead>
				<tbody>
                	<?php
                    		$Query = mysql_query("SELECT * FROM solicitud WHERE  aprobado_sol='1'");
							while($Datos = mysql_fetch_array($Query)){
					?>
					<tr>
						<td><?php
						
								$Usuario = mysql_query("SELECT * FROM usuarios WHERE id_user='".$Datos['id_user']."' LIMIT 1");
								$User = mysql_fetch_array($Usuario);
								echo $User['nombres_user']." ".$User['apellidos_user']; ?></td>
						<td>
                        <?php
						
								$Equipos = mysql_query("SELECT * FROM equipos WHERE id_eq='".$Datos['id_eq']."' LIMIT 1");
								$Eq = mysql_fetch_array($Equipos);
								echo $Eq['modelo_eq']." ".$Eq['marca_eq']; ?>
                        </td>
						<td><?php echo $Datos['fecha_sol']; ?></td>
						<td><?php echo $Datos['cantidad_sol']; ?></td>
                        <td align="center"> 
                         <a href="planilla.php?id=<?php echo $Datos['id_sol'];?>" class="btn btn-warning" title="Ver Planilla"><i class="fa fa-file-pdf-o"></i></a>&nbsp;
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