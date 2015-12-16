<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Solicitud</div>
				<div class="panel-body">
                		<?php
                        	$id = $_GET['id'];	
							$query = mysql_query("SELECT * FROM solicitud WHERE id_sol = $id");
							$solicitud = mysql_fetch_array($query);
							$id_user = $solicitud['id_user'];
							$query = mysql_query("SELECT * FROM usuarios WHERE id_user=$id_user");
							$usuario = mysql_fetch_array($query);
							$querys = mysql_query("SELECT * FROM devolucion WHERE id_sol=$id");
							$dev = mysql_fetch_array($querys);
							
						
													
						?>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Usuario">Nombre del Solicitante</label>
                                    <?php echo $usuario['nombres_user']." ".$usuario['apellidos_user'];?>
                                 </div>
                                </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Clave">Fecha de Solicitud</label>
                                     <?php echo $solicitud['fecha_sol'];?>
                                </div>
                                </div>
							</div>
                           <?php $query = mysql_query("SELECT * FROM solicitud_equipos WHERE id_sol=$id");
								while ($solicitud_equipos = mysql_fetch_array($query)){
                            
							?>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Usuario">Equipo</label>
                                    <?php 
										
										$NEquipo = mysql_query("SELECT * FROM equipos WHERE id_eq ='".$solicitud_equipos['id_eq']."'");	
											$REquipo = mysql_fetch_array($NEquipo);
											echo $REquipo['modelo_eq']." ".$REquipo['marca_eq'];
									?>
                                 </div>
                                </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Clave">Cantidad</label>
                                      <?php 
									  
									  	echo $solicitud_equipos['cantidad_eq'];
									  ?>
                                </div>
                                </div>
							</div>
                            
                            <?php
								}
							?>
                                  <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Usuario">Fecha de Devolución</label>
                                    <?php 
									  
									  	echo $dev['fecha_dev'];
									  ?>
                                 </div>
                                </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Clave">Detalle</label>
                                      <?php 
									  
									  	echo $dev['observacion_dev'];
									  ?>
                                </div>
                                </div>
							</div>  
                             <hr/>
                             <center><a href="index.php?lugar=equipos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>  
                              </div>
                      </div>

				</div>
			</div>
		</div>
	</div>
</div>