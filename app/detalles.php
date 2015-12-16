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
		$query = mysql_query("SELECT * FROM usuarios WHERE id_user = $id");
		$usuario = mysql_fetch_array($query);
		?>
        <table id="datos" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $usuario['ci_user'];?></td>
                    <td><?php echo $usuario['usuario_user'];?></td>
                    <td><?php echo $usuario['nombres_user'];?></td>
                    <td><?php echo $usuario['apellidos_user'];?></td>
                    <td><?php echo $usuario['telefono_user'];?></td>
                    <td><?php echo $usuario['email_user'];?></td>
                    <td><?php echo $usuario['cargo_user'] == 1 ? 'Gerente' : 'Personal';?></td>
                </tr>
            </tbody>
        </table>
    		<?php

		break;

    case 'tecnicos':
        $query = mysql_query("SELECT * FROM tecnico WHERE id_tec = $id");
        $usuario = mysql_fetch_array($query);
        ?>
        <table id="datos" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $usuario['cedula_tec'];?></td>
                    <td><?php echo $usuario['nombre_tec'];?></td>
                    <td><?php echo $usuario['apellido_tec'];?></td>
                    <td><?php echo $usuario['telefono_tec'];?></td>
                </tr>
            </tbody>
        </table>
            <?php        
        break;

    case 'mantenimiento':
        $query = mysql_query("SELECT * FROM equipos WHERE id_eq = $id");
        $equipo = mysql_fetch_array($query);
        $query = mysql_query("SELECT * FROM mantenimiento WHERE id_eq = $id");
        $mantenimiento = mysql_fetch_array($query);
        $id_tec = $mantenimiento['id_tec'];
        $query = mysql_query("SELECT * FROM tecnico WHERE id_tec =$id_tec");
        $tecnico = mysql_fetch_array($query);
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
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tec">Asignado a:</label>
                                    <?php
                                    echo $tecnico['nombre_tec'] . " " . $tecnico['apellido_tec'];
    ?>
                                 </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <?php
                                     echo $mantenimiento['cantidad_man'];
                                    ?>
                                 </div>
                                </div>
                                   <div class="col-md-12">
                                </div>
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