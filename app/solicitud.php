<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Solicitud</div>
				<div class="panel-body">
                		<form action="index.php?lugar=registrar&type=solicitud" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div id="equipos">
                                <div id="eq">
                                <div class="col-md-8">
                                <div class="form-group">
                                    <label for="Equipo">Equipo</label>
                                    <select class="form-control" id="equipo" name="equipo[]">
                                    <?php
								$Query = mysql_query("SELECT * FROM equipos");
								while ($Dato = mysql_fetch_array($Query)) {
									?>
                                                <option value="<?php echo $Dato['id_eq'];?>">
												<?php echo "Modelo&nbsp;&nbsp;=>&nbsp;&nbsp;" . $Dato['modelo_eq'] . " " . "Marca&nbsp;&nbsp;=>&nbsp;&nbsp;" . $Dato['marca_eq'] . " " . "Disponibles&nbsp;&nbsp;=>&nbsp;&nbsp;" . $Dato['cantidad_eq'];?></option>
                                    <?php
}
?>

                                            </select>
                                 </div>
                                </div>
                                <div class="col-md-2">
                                 <div class="form-group">
                                    <label for="Cantidad">Cantidad</label>
                                     <input type="text" class="form-control" id="cantidad" name="cantidad[]"  />
                                 </div>
                                </div>
                            </div>
                            </div>
                                <div class="col-md-2">
                                 <div class="form-group">
                                 <br/>
                                      <a href="#" class="btn btn-success" id="add_eq"> ( + )</a>
                                 </div>
                                </div>




                                <div class="col-md-12">
                            <hr/>
                            </div>
                            	 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Fecha Solicitud">Fecha Solicitud</label>
                                     <input type="text" class="form-control datepicker" id="fecha_sol" name="fecha_sol"  />
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Fecha Devolución">Fecha Devolución</label>
                                     <input type="text" class="form-control datepicker" id="fecha_dev" name="fecha_dev"  />
                                  </div>
                                </div>
              <!--                    <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Cantidad">Cantidad</label>
                                     <input type="text" class="form-control" id="cantidad" name="cantidad"  />
                                 </div>
                                </div> -->
                                  <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Cargo">Departamento</label>
                                     <select name="departamento" id="departamento" class="form-control">
                                       <option value="1">Unidad de Trasmisión</option>
                                       <option value="2">Unidad de Conmutación</option>
                                       <option value="3">Unidad de Datos</option>
                                       <option value="4">Unidad de Planta Externa</option>
                                       <option value="5">Oficina de Atención Al Cliente CANTV</option>
                                       <option value="6">Oficina de Atención Al Cliente Movilnet</option>
                                     </select>
                                  </div>
                                  </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Observación">Observación</label>
                                     <textarea class="form-control" rows="3" name="observacion" id="observacion"></textarea>
                                  </div>
                                </div>
                                 <div class="col-md-12">
                                  <hr/>
                                 <button type="submit" class="btn btn-info">&nbsp;Registrar </button>
                                 &nbsp;&nbsp;|&nbsp;&nbsp;
                                  <button type="reset" class="btn btn-danger">&nbsp;Limpiar </button>
                                </div>
                      </div>
                      </form>
				</div>
			</div>
		</div>
	</div>
</div>