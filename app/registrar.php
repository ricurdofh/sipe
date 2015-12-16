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

switch ($type) {
	case 'usuario':
		$usuario = $_POST['usuario'];
		$clave = md5($_POST['clave']);
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$ci = $_POST['ci'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$cargo = $_POST['cargo'];
		$departamento = $_POST['departamento'];
		$query = "INSERT INTO usuarios (usuario_user, clave_user, nombres_user, apellidos_user, ci_user, telefono_user, email_user, cargo_user, departamento_user) VAlUES ('$usuario', '$clave', '$nombres', '$apellidos', '$ci', '$telefono', '$email', '$cargo', '$departamento')";
		$strResultado = mysql_query($query) or die(mysql_error()); 
		echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=usuarios" />
		<div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">El usuario fue registrado correctamente.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=usuarios" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		break;

	case 'solicitud':
		$usuario = $_SESSION['IDUserLoginSystem'];
		$equipo = $_POST['equipo'];
		$fecha_sol = $_POST['fecha_sol'];
		$fecha_dev = $_POST['fecha_dev'];
		$cantidad = $_POST['cantidad'];
		$observacion = $_POST['observacion'];
		$departamento = $_POST['departamento'];
		$query = "INSERT INTO solicitud (id_user, fecha_sol, fecha_dev_sol, observacion_sol, aprobado_sol, departamento_sol, hora_sol) VAlUES ('$usuario', '$fecha_sol', '$fecha_dev', '$observacion', 2, $departamento, NOW())";
		$strResultado = mysql_query($query) or die(mysql_error());
		$id_sol = mysql_insert_id();
		for ($i = 0; $i < count($equipo); $i++) {
			$query = "INSERT INTO solicitud_equipos (id_sol, id_eq, cantidad_eq) VALUES ($id_sol, $equipo[$i], $cantidad[$i])";
			$strResultado = mysql_query($query) or die(mysql_error());
		} 
        echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=solicitudes" />
		<div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">La solicitud fue registrada correctamente.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=solicitudes" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		break;

	case 'equipo':
		$modelo = $_POST['modelo'];
		$marca = $_POST['marca'];
		$serie = $_POST['serie'];
		$cantidad = $_POST['cantidad'];
		$detalles = $_POST['detalles'];
		if(mysql_query("INSERT INTO equipos (modelo_eq, marca_eq, serie_eq, cantidad_eq, detalle_eq) VAlUES ('$modelo', '$marca', '$serie', '$cantidad', '$detalles')")){
			 echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=equipos" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">El equipo fue registrado correctamente.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=equipos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}else{
		
			 echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=equipos" />
			 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">Ocurrio un error.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=equipos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}
		break;

		break;

	case 'tecnico':
		$nombre = $_POST['nombres'];
		$apellido = $_POST['apellidos'];
		$cedula = $_POST['ci'];
		$telefono = $_POST['telefono'];
		if(mysql_query("INSERT INTO tecnico (nombre_tec, apellido_tec, cedula_tec, telefono_tec) VAlUES ('$nombre', '$apellido', '$cedula', '$telefono')")){
				 echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=tecnicos" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">El tecnico fue registrado correctamente.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=tecnicos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}else{
			 echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=tecnicos" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">Ocurrio un error.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=tecnicos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}
		break;

	case 'prestamo_apr':
		$cantidad_apr = $_POST['cantidad_apr'];
		$id = $_GET['id'];
		$query = "UPDATE solicitud SET aprobado_sol=1 WHERE id_sol=$id";
		$strResultado = mysql_query($query) or die(mysql_error());
		$query = mysql_query("SELECT * FROM solicitud_equipos WHERE id_sol = $id");
		$i = 0;
		while ($Datos = mysql_fetch_array($query)) {
			$id_sol_eq = $Datos['id_sol_eq'];
			$id_eq = $Datos['id_eq'];
			$query2 = "INSERT INTO solicitud_aprobada (id_sol_eq, cantidad_apr, hora_apr) VALUES ($id_sol_eq, $cantidad_apr[$i], NOW())";
			$strResultado = mysql_query($query2) or die(mysql_error());
			$query2 = mysql_query("SELECT cantidad_eq FROM equipos WHERE id_eq=$id_eq");
			$cantidad = mysql_fetch_row($query2);
			$cantidad_nueva = $cantidad[0] - $cantidad_apr[$i];
			$query2 = mysql_query("UPDATE equipos SET cantidad_eq=$cantidad_nueva WHERE id_eq=$id_eq");
			$i++;
		}
		 echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=ver_prestamos" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">Prestamo aprobado correctamente.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=ver_prestamos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		break;

	case 'devolucion':
		$id = $_GET['id'];
		$fecha_dev = $_POST['fecha_dev'];
		$observacion = $_POST['observacion'];
		$equipos = $_POST['equipo'];
		$cantidad = $_POST['cantidad'];
		$query = mysql_query("INSERT INTO devolucion (id_sol, fecha_dev, observacion_dev) VALUES ($id, '$fecha_dev', '$observacion')");
		for ($i = 0; $i < count($equipos); $i++) {
			$query = mysql_query("SELECT * FROM equipos WHERE id_eq=$equipos[$i]");
			$equipo = mysql_fetch_array($query);
			$cantidad_nueva = $cantidad[$i] + $equipo['cantidad_eq'];
			$query = mysql_query("UPDATE equipos SET cantidad_eq=$cantidad_nueva WHERE id_eq=$equipos[$i]");
			$query = mysql_query("UPDATE solicitud SET aprobado_sol=0 WHERE id_sol=$id");
		}
		echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=ver_prestamos" />
		 <div class="col-md-12">
	                <div class="panel panel-info">
	                    <div class="panel-heading">
	                       &nbsp;
	                    </div>
	                    <div class="panel-body">
	               	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">Prestamo devuelto correctamente.</p>
	                  
	                   <hr/>
	                      <center><a href="index.php?lugar=ver_prestamos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
	                    </div>
	                    
	                </div>
	            </div>
		';
		break;

	default:
        echo "Opción desconocida";
		break;
}

?>