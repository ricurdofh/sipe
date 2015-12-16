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

$query = mysql_query("SELECT * FROM equipos WHERE id_eq = $id");
$equipo = mysql_fetch_array($query);

?>

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
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $equipo['modelo_eq']; ?></td>
                        <td><?php echo $equipo['marca_eq']; ?></td>
                        <td><?php echo $equipo['serie_eq']; ?></td>
                        <td id="disponibles"><?php echo $equipo['cantidad_eq']; ?></td>
                        <td><?php echo $equipo['detalle_eq']; ?></td>
                    </tr>
                </tbody>
            </table>
<form action="index.php?lugar=asignar&id=<?php echo $id?>" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tec">Asignar a:</label>
                                    <select class="form-control" id="tec" name="tec">
                                    <?php
$Query = mysql_query("SELECT * FROM tecnico");
while ($Dato = mysql_fetch_array($Query)) {
    ?>
                                                <option value="<?php echo $Dato['id_tec'];?>">
                                                <?php echo $Dato['nombre_tec'] . " " . $Dato['apellido_tec'];?></option>
                                    <?php
}
?>

                                            </select>
                                 </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad" required/>
                                 </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dias_man">Dias en mantenimiento</label>
                                    <input type="text" class="form-control" id="dias_man" name="dias_man" required/>
                                 </div>
                                </div>
                                   <div class="col-md-12">
                                  <hr/>
                                  <button id="asignar" type="submit" class="btn btn-info">&nbsp;Asignar </button>
                                </div>
</form>

                </div>
            </div>
        </div>
    </div>
</div>   