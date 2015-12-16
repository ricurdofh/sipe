<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Devoluciones</div>
				<div class="panel-body">
					<table id="datos" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Codigo</th>
                        <th>Fecha</th>
                        <th>Observacion</th>
                        <th>Acciones</th>
					</tr>
				</thead>
				<tbody>
                	<?php
                    		$Query = mysql_query("SELECT * FROM devolucion");
							while($Datos = mysql_fetch_array($Query)){
					?>
					<tr>
						<td><?php echo $Datos['id_dev']; ?></td>
						<td><?php echo $Datos['fecha_dev']; ?></td>
						<td><?php echo $Datos['observacion_dev']; ?></td>
                        <td align="center"> 
                         <a href="index.php?lugar=detalla&id=<?php echo $Datos['id_sol'];?>" class="btn btn-warning" title="Ver Detalles"><i class="fa fa-server"></i></a>
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