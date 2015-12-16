<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Usuario</div>
				<div class="panel-body">
                		<form action="index.php?lugar=registrar&type=usuario" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Usuario">Usuario</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" required/>
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Clave">Clave</label>
                                    <input type="password" class="form-control" id="clave" name="clave"  required/>
                                  </div>
                                </div>
                                <div class="col-md-12">
                            <hr/>
                            </div>
                            	 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nombres">Nombres</label>
                                     <input type="text" class="form-control" id="nombres" name="nombres" required/>
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Apellidos">Apellidos</label>
                                     <input type="text" class="form-control" id="apellidos" name="apellidos" required />
                                  </div>
                                </div>
                                 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="CI">CI</label>
                                     <input type="text" class="form-control" id="ci" name="ci" required />
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Telefono">Teléfono</label>
                                     <input type="text" class="form-control" id="telefono" name="telefono" required />
                                  </div>
                                </div>
                                 <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="E-mail">E-mail</label>
                                     <input type="text" class="form-control" id="email" name="email" required />
                                  </div>
                                  </div>
                                  <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Cargo">Cargo</label>
                                     <select name="cargo" id="cargo" class="form-control">
                                       <option value="1">Gerente</option>
                                       <option value="2">Personal</option>
                                     </select>
                                  </div>
                                  </div>
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