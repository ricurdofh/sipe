<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Detalles de prestamos</div>
                <div class="panel-body">
                    <?php
$id = $_GET['id'];?>
                    <form action="index.php?lugar=registrar&type=prestamo_apr&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                    <table id="datos" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Solicitante</th>
                        <th>Fecha Solicitud</th>
                        <th>Status</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody><?php
$Query = mysql_query("SELECT * FROM solicitud WHERE id_sol='$id'");
while ($Datos = mysql_fetch_array($Query)) {
	?>
                    <tr>
                        <td><?php

	$Usuario = mysql_query("SELECT * FROM usuarios WHERE id_user='" . $Datos['id_user'] . "' LIMIT 1");
	$User = mysql_fetch_array($Usuario);
	echo $User['nombres_user'] . " " . $User['apellidos_user'];?></td>
    <td><?php echo $Datos['fecha_sol'];?></td>
                        <td><?php if ($Datos['aprobado_sol'] == "1") {
		echo "APROBADO";
	} else {
		echo "PENDIENTE";
	}

	?>
</td>
                        <td align="center">
                        <button type="submit" id="aprobar_sol" class="btn btn-success" title="Aprobar"><i class="fa fa-check"></i></button>&nbsp;
                        </td>
                    </tr>
                    <?php }
?>
                </tbody>
            </table>
            <div class="panel-heading">Equipos</div>
                <div class="panel-body">
                    <table id="datos" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Equipo</th>
                        <th>Marca</th>
                        <th>Cantidad solicitada</th>
                        <th>Cantidad disponible</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

$Query = mysql_query("SELECT * FROM solicitud_equipos WHERE id_sol= '$id'");
while ($Datos2 = mysql_fetch_array($Query)) {
	?>
    <tr> <?php

	$Equipos = mysql_query("SELECT * FROM equipos WHERE id_eq='" . $Datos2['id_eq'] . "' LIMIT 1");
	$Eq = mysql_fetch_array($Equipos);
	?><td><?php echo $Eq['modelo_eq'];?></td>
      <td><?php echo $Eq['marca_eq'];?></td>
      <td>
      <div class="input-group">
          <input type="text" name="cantidad_apr[]" id="cantidad_sol" value="<?php echo $Datos2['cantidad_eq'];?>" />      </td>
      <td id="disponibles"><?php echo $Eq['cantidad_eq'];?></td></tr><?php

}
?>
                </tbody>
            </table>
        </form>
                </div>

                </div>
            </div>
        </div>
