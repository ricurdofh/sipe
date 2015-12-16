<?php

session_start();

//Verificamos que la session nombres_usuario excista
if (isset($_SESSION['NombreUserLoginSystem'])) {

} else {
    //Si la session no esta creada se reenvia a la pantalla del login
    header("Location: ../index.php");
    exit();
}

$type = $_GET['type'];
$id = $_GET['id'];

switch ($type) {
    case 'usuarios':
        $query = mysql_query("SELECT * FROM usuarios WHERE id_user=$id");
        $usuario = mysql_fetch_array($query);
    ?>
        <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Usuario</div>
                <div class="panel-body">
                        <form id="form_edit"action="index.php?lugar=actualizar&type=usuario&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Usuario">Usuario</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario['usuario_user']; ?>" readonly/>
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Clave">Vieja Clave</label>
                                    <input type="password" class="form-control" id="old_clave" name="old_clave"  />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Clave">Nueva Clave</label>
                                    <input type="password" class="form-control" id="new_clave" name="new_clave"  />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Clave">Repita nueva clave</label>
                                    <input type="password" class="form-control" id="new_clave2" name="new_clave2"  />
                                  </div>
                                </div>
                                <div class="col-md-12">
                            <hr/>
                            </div>
                                 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nombres">Nombres</label>
                                     <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $usuario['nombres_user']; ?>" />
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Apellidos">Apellidos</label>
                                     <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuario['apellidos_user']; ?>" />
                                  </div>
                                </div>
                                 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="CI">CI</label>
                                     <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $usuario['ci_user']; ?>" />
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Telefono">Teléfono</label>
                                     <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $usuario['telefono_user']; ?>" />
                                  </div>
                                </div>
                                 <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="E-mail">E-mail</label>
                                     <input type="text" class="form-control" id="email" name="email" value="<?php echo $usuario['email_user']; ?>" />
                                  </div>
                                  </div>
                                  <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Cargo">Cargo</label>
                                     <select name="cargo" id="cargo" class="form-control">
                                       <option value="1" <?php echo $usuario['cargo_user'] == '1' ? "SELECTED" : ""; ?>>Gerente</option>
                                       <option value="2" <?php echo $usuario['cargo_user'] == '2' ? "SELECTED" : ""; ?>>Personal</option>
                                     </select>
                                  </div>
                                  </div>
                                  <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Departamento">Departamento</label>
                                     <select name="departamento" id="departamento" class="form-control">
                                       <option value="1" <?php echo $usuario['departamento_user'] == '1' ? "selected" : ""; ?>>Unidad de Trasmision</option>
                                       <option value="2" <?php echo $usuario['departamento_user'] == '2' ? "selected" : ""; ?>>Unidad de Conmutacion</option>
                                       <option value="3" <?php echo $usuario['departamento_user'] == '3' ? "selected" : ""; ?>>Unidad de Datos</option>
                                       <option value="4" <?php echo $usuario['departamento_user'] == '4' ? "selected" : ""; ?>>Unidad de Planta Externa</option>
                                       <option value="5" <?php echo $usuario['departamento_user'] == '5' ? "selected" : ""; ?>>Oficina de Atencion Al Cliente CANTV</option>
                                       <option value="6" <?php echo $usuario['departamento_user'] == '6' ? "selected" : ""; ?>>Oficina de Atencion Al Cliente Movilnet</option>
                                     </select>
                                  </div>
                                  </div>

                                   <div class="col-md-12">
                                  <hr/>
                                 <button type="submit" id="actualizar_user" class="btn btn-info">&nbsp;Actualizar </button>
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
<?php
        break;

    case 'solicitud':
        $query = mysql_query("SELECT * FROM solicitud WHERE id_sol=$id");
        $solicitud = mysql_fetch_array($query);
        $id_user = $solicitud['id_user'];
        $query = mysql_query("SELECT * FROM usuarios WHERE id_user=$id_user");
        $usuario = mysql_fetch_array($query);
        ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Solicitud</div>
                <div class="panel-body">
                        <form action="index.php?lugar=actualizar&type=solicitud&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div id="equipos">
                                <?php
                                    $Query_sol_eq = mysql_query("SELECT * FROM solicitud_equipos WHERE id_sol=$id");
                                    while($Datos_sol_eq = mysql_fetch_array($Query_sol_eq)) {
                                        $id_eq = $Datos_sol_eq['id_eq'];
                                        $Query_eq = mysql_query("SELECT * FROM equipos WHERE id_eq=$id_eq");
                                        $Dato_eq = mysql_fetch_array($Query_eq);
                                ?>
                                <div id="eq">
                                <div class="col-md-8">
                                <div class="form-group">
                                    <label for="Equipo">Equipo</label>
                                    <input type="hidden" name="id_sol_eq[]" value="<?php echo $Datos_sol_eq['id_sol_eq'] ?>"> 
                                    <select class="form-control" id="equipo" name="equipo[]">
                                    <?php
$Query = mysql_query("SELECT * FROM equipos");
while ($Dato = mysql_fetch_array($Query)) {
    ?>
                                                <option value="<?php echo $Dato['id_eq'];?>" <?php echo $Dato_eq['id_eq'] == $Dato['id_eq'] ? "SELECTED" : "" ; ?> >
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
                                     <input type="text" class="form-control" id="cantidad" name="cantidad[]" value="<?php echo $Datos_sol_eq['cantidad_eq']; ?>" />
                                 </div>
                                </div>
                            </div>
                            <?php } ?>
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
                                    <label for="solicitante">Solicitante</label>
                                     <input type="text" class="form-control" id="solicitante" name="solicitante" value="<?php echo $usuario['nombres_user'] . ' ' . $usuario['apellidos_user']; ?>" readonly/>
                                 </div>
                                </div>
                                 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Fecha Solicitud">Fecha Solicitud</label>
                                     <input type="text" class="form-control datepicker" id="fecha_sol" name="fecha_sol" value="<?php echo $solicitud['fecha_sol']; ?>" />
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Fecha Devolución">Fecha Devolución</label>
                                     <input type="text" class="form-control datepicker" id="fecha_dev" name="fecha_dev" value="<?php echo $solicitud['fecha_dev_sol']; ?>" />
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
                                    <label for="Observación">Observación</label>
                                     <textarea class="form-control" rows="3" name="observacion" id="observacion"><?php echo $solicitud['observacion_sol']; ?></textarea>
                                  </div>
                                </div>
                                 <div class="col-md-12">
                                  <hr/>
                                 <button type="submit" class="btn btn-info">&nbsp;Actualizar </button>
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
        <?php

        break;

    case 'equipos':
        $query = mysql_query("SELECT * FROM equipos WHERE id_eq = $id");
        $equipo = mysql_fetch_array($query);
        ?>
        <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Equipo</div>
                <div class="panel-body">
                        <form action="index.php?lugar=actualizar&type=equipos&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Modelo">Modelo</label>
                                    <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $equipo['modelo_eq']; ?>" />
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Marca">Marca</label>
                                    <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $equipo['marca_eq']; ?>" />
                                  </div>
                                </div>
                                <div class="col-md-12">
                            </div>
                                 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Serie">Serie</label>
                                     <input type="text" class="form-control" id="serie" name="serie" value="<?php echo $equipo['serie_eq']; ?>" />
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Cantidad">Cantidad</label>
                                     <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo $equipo['cantidad_eq']; ?>" />
                                  </div>
                                </div>
                                 <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Detalles">Detalles</label>
                                     <textarea class="form-control" id="detalles" name="detalles"><?php echo $equipo['detalle_eq']; ?></textarea>
                                 </div>
                                </div>

                                  </div>

                                   <div class="col-md-12">
                                  <hr/>
                                 <button type="submit" class="btn btn-info">&nbsp;Actualizar </button>
                                 &nbsp;&nbsp;|&nbsp;&nbsp;
                                  <button type="reset" class="btn btn-danger">&nbsp;Limpiar </button>
                                </div>
                      
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
        <?php
        break;

    case "tecnicos":
        $query = mysql_query("SELECT * FROM tecnico WHERE id_tec=$id");
        $tecnico = mysql_fetch_array($query);
        ?>
        <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Técnico</div>
                <div class="panel-body">
                        <form action="index.php?lugar=actualizar&type=tecnicos&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nombres">Nombres</label>
                                     <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $tecnico['nombre_tec'];?>" />
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Apellidos">Apellidos</label>
                                     <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $tecnico['apellido_tec'];?>" />
                                  </div>
                                </div>
                                 <div class="col-md-6">
                                <div class="form-group">
                                    <label for="CI">CI</label>
                                     <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $tecnico['cedula_tec'];?>" />
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Telefono">Teléfono</label>
                                     <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $tecnico['telefono_tec'];?>" />
                                  </div>
                                </div>
                                   <div class="col-md-12">
                                  <hr/>
                                 <button type="submit" class="btn btn-info">&nbsp;Actualizar </button>
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
        <?php
        break;
    
    default:
        echo "Opción desconocida";
        break;
}

?>