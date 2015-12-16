<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Prestamos</div>
				<div class="panel-body">
					<table id="datos" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Solicitante</th>
						<th>Fecha Solicitud</th>
                        <th>Status</th>
                        <th>Acciones</th>
					</tr>
				</thead>
				<tbody>
                	<?php
                    		$Query = mysql_query("SELECT * FROM solicitud");
							while($Datos = mysql_fetch_array($Query)){
                                if ($Datos['aprobado_sol'] == 1) {
					?>
					<tr>
						<td><?php
						
								$Usuario = mysql_query("SELECT * FROM usuarios WHERE id_user='".$Datos['id_user']."' LIMIT 1");
								$User = mysql_fetch_array($Usuario);
								echo $User['nombres_user']." ".$User['apellidos_user']; ?></td>
						
						<td><?php echo $Datos['fecha_sol']; ?></td>
                        <td><?php if($Datos['aprobado_sol']=="1"){
									echo "APROBADO";
						}else{
									echo "PENDIENTE";	
						}
							
							 ?></td>
                        <td align="center"> 
                         <a href="index.php?lugar=planillas&id=<?php echo $Datos['id_sol'];?>" class="btn btn-warning" title="Ver Planilla"><i class="fa fa-file-pdf-o"></i></a>&nbsp;
                         
                         
                         	<?php
                            		$QueryS = mysql_query("SELECT * FROM devolucion WHERE id_sol='".$Datos['id_sol']."' LIMIT 1");
									$Con = mysql_num_rows($QueryS);
									if ($Con==0){
							?>

                         <a href="index.php?lugar=devolucion&id=<?php echo $Datos['id_sol'];?>" class="btn btn-info" title="Devolver"><i class="fa fa-undo"></i></a>
                         <?php
                         
									}
						 		
						 ?>
                         
                        </td>
					</tr>
                    <?php } } ?>
				</tbody>
			</table>

				</div>
			</div>
		</div>
	</div>
</div>   