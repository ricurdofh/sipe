<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Equipos en Mantenimiento</div>
				<div class="panel-body">
					<table id="datos" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Tecnico</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
					</tr>
				</thead>
				<tbody>
                	<?php
                    		$Query = mysql_query("SELECT * FROM mantenimiento");
							while($Datos = mysql_fetch_array($Query)){
					?>
					<tr>
						<td><?php
						
								$Tecnico = mysql_query("SELECT * FROM tecnico WHERE id_tec='".$Datos['id_tec']."' LIMIT 1");
								$Tec = mysql_fetch_array($Tecnico);
								echo $Tec['nombre_tec']." ".$Tec['apellido_tec']; ?></td>
						<td>
                        <?php
						
								$Equipos = mysql_query("SELECT * FROM equipos WHERE id_eq='".$Datos['id_eq']."' LIMIT 1");
								$Eq = mysql_fetch_array($Equipos);
								echo $Eq['modelo_eq']." ".$Eq['marca_eq']; ?>
                        </td>
						<td><?php echo $Datos['cantidad_man']; ?></td>
                        <td align="center"> 
                         <a href="index.php?lugar=planillas&type=mantenimiento&id=<?php echo $Datos['id_man'];?>" class="btn btn-warning" title="Ver Planilla"><i class="fa fa-file-pdf-o"></i></a>&nbsp;
                         <a href="index.php?lugar=detalles&type=mantenimiento&id=<?php echo $Eq['id_eq'];?>" class="btn btn-warning" title="Ver Detalles"><i class="fa fa-server"></i></a>&nbsp;
                         <a href="index.php?lugar=actualizar&type=retirar_man&id=<?php echo $Datos['id_man']; ?>" class="btn btn-danger" title="Retirar de mantenimiento"><i class="fa fa-trash-o"></i></a>&nbsp;
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