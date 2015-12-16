<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Equipos</div>
				<div class="panel-body">
					<table id="datos" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Modelo</th>
                        <th>Marca</th>
						<th>Serie</th>
                        <th>Cantidad</th>
                         <?php
                                	if ($_SESSION['NivelUserLoginSystem']=="1"){
								?>
                        <th>Acciones</th>
						<?php
									}
						?>
        					</tr>
				</thead>
				<tbody>
                	<?php
                    		$Query = mysql_query("SELECT * FROM equipos");
							while($Datos = mysql_fetch_array($Query)){
					?>
					<tr>
						<td><?php echo $Datos['modelo_eq']; ?></td>
                        <td><?php echo $Datos['marca_eq']; ?></td>
						<td><?php echo $Datos['serie_eq']; ?></td>
						<td><?php echo $Datos['cantidad_eq']; ?></td>
                         <?php
                                	if ($_SESSION['NivelUserLoginSystem']=="1"){
								?>
                        <td align="center"> 
                          <a href="index.php?lugar=enviar_mantenimiento&id=<?php echo $Datos['id_eq'];?>" class="btn btn-warning" title="Enviar a Mantienimiento"><i class="fa fa-cogs"></i></a>&nbsp;
                        <a href="index.php?lugar=editar&type=equipos&id=<?php echo $Datos['id_eq'];?>" class="btn btn-info" title="Editar"><i class="fa fa-pencil"></i></a>&nbsp;
                        <a href="index.php?lugar=delete&type=equipos&id=<?php echo $Datos['id_eq'];?>" class="btn btn-danger delete" title="Borrar"><i class="fa fa-trash-o"></i></a>&nbsp;
                        </td>
                        <?php
									}
						?>
					</tr>
                    <?php } ?>
				</tbody>
			</table>

				</div>
			</div>
		</div>
	</div>
</div>   