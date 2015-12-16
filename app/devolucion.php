<?php
session_start();

//Verificamos que la session nombres_usuario excista
if (isset($_SESSION['NombreUserLoginSystem'])) {

} else {
    //Si la session no esta creada se reenvia a la pantalla del login
    header("Location: ../index.php");
    exit();
}

$id = $_GET['id'];

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
                        <form action="index.php?lugar=registrar&type=devolucion&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
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
                                    <input type="hidden" name="equipo[]" value="<?php echo $Dato_eq['id_eq']; ?>"> 
                                    <select class="form-control" id="equipos" name="equipos" disabled="disabled">
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
                                     <input type="text" class="form-control" id="cantidad" name="cantidad[]" value="<?php echo $Datos_sol_eq['cantidad_eq']; ?>" readonly/>
                                 </div>
                                </div>
                            </div>
                            <?php } ?>
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
                                     <input type="text" class="form-control datepicker" id="fecha_sol" name="fecha_sol" value="<?php echo $solicitud['fecha_sol']; ?>" readonly/>
                                 </div>
                                </div>
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="Fecha Devolución">Fecha Devolución</label>
                                     <input class="form-control datepicker" id="fecha_dev" name="fecha_dev" />
                                    <input type="hidden" name="fecha_dev_sol" id="fecha_dev_sol" value="<?php echo $solicitud['fecha_dev_sol']; ?>"> 
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
                                 <button type="submit" id="dev" class="btn btn-info">&nbsp;Aceptar </button>
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
