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
    case 'usuario':
        $old_clave = $_POST['old_clave'] != "" ? md5($_POST['old_clave']) : "";
        $new_clave = $_POST['new_clave'] != "" ? md5($_POST['new_clave']) : "";
        $new_clave2 = $_POST['new_clave2'] != "" ? md5($_POST['new_clave2']) : "";
        if ($old_clave) {
            $query = mysql_query("SELECT clave_user FROM usuarios WHERE id_user=$id");
            $clave = mysql_fetch_row($query);
            if ($old_clave !== $clave[0]) {
                exit('Error al actualizar - Clave incorrecta');
            } else if($new_clave != $new_clave2 || $new_clave == ''){
                exit('Error al actualizar - Error en nueva clave');
            } else {
                $query = "UPDATE usuarios SET clave_user = $new_clave";
            }
        }
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $ci = $_POST['ci'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $cargo = $_POST['cargo'];
		$departamento = $_POST['departamento'];
        if(mysql_query("UPDATE usuarios SET 
		nombres_user='$nombres', 
		apellidos_user='$apellidos', 
		ci_user='$ci', 
		telefono_user='$telefono', 
		email_user='$email', 
		cargo_user='$cargo',
		departamento_user='$departamento' 
		WHERE id_user=$id")){
           
		   echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=usuarios" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">Usuario actualizado correctamente.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=usuarios" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}else {
            echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=usuarios" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">Error no se puede actualizar.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=usuarios" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}
        break;

    case 'solicitud':
        $equipo = $_POST['equipo'];
        $fecha_sol = $_POST['fecha_sol'];
        $fecha_dev = $_POST['fecha_dev'];
        $cantidad = $_POST['cantidad'];
        $observacion = $_POST['observacion'];
        $id_sol_eq = $_POST['id_sol_eq'];
        $query = "UPDATE solicitud set fecha_sol='$fecha_sol', fecha_dev_sol='$fecha_dev', observacion_sol='$observacion' WHERE id_sol=$id";
        $strResultado = mysql_query($query) or die(mysql_error());
        for ($i = 0; $i < count($id_sol_eq); $i++) {
            $query = "UPDATE solicitud_equipos SET id_eq=$equipo[$i], cantidad_eq=$cantidad[$i] WHERE id_sol_eq=$id_sol_eq[$i]";
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
                            <p align="center">Solicitud actualizada correctamente.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=solicitudes" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
        break;

    case 'equipos':
        $modelo = $_POST['modelo'];
        $marca = $_POST['marca'];
        $serie = $_POST['serie'];
        $cantidad = $_POST['cantidad'];
        $detalles = $_POST['detalles'];
        if(mysql_query("UPDATE equipos SET modelo_eq='$modelo', marca_eq='$marca', serie_eq='$serie', cantidad_eq='$cantidad', detalle_eq='$detalles' WHERE id_eq=$id")){
           echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=equipos" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">El equipo fue actualizada correctamente.</p>
                      
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
                            <p align="center">Error al actualizar.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=equipos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}
        break;

    case 'tecnicos':
        $nombre = $_POST['nombres'];
        $apellido = $_POST['apellidos'];
        $cedula = $_POST['ci'];
        $telefono = $_POST['telefono'];
        if(mysql_query("UPDATE tecnico SET nombre_tec='$nombre', apellido_tec='$apellido', cedula_tec='$cedula', telefono_tec='$telefono' WHERE id_tec=$id")){
            echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=tecnicos" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">El Tecnico fue actualizado correctamente.</p>
                      
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
                            <p align="center">Error al actualizar.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=tecnicos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}
        break;

    case 'retirar_man':
    ?>
    <div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">Retirar equipo de mantenimiento</div>
        <div class="panel-body">
        <form action="index.php?lugar=delete&type=mantenimiento&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
          <table id="datos" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Tecnico</th>
            <th>Tipo</th>
            <th>Cantidad</th>
          </tr>
        </thead>
        <tbody>
                  <?php
                        $Query = mysql_query("SELECT * FROM mantenimiento WHERE id_man=$id");
              while($Datos = mysql_fetch_array($Query)){
          ?>
          <tr>
            <td><?php
            
                $Tecnico = mysql_query("SELECT * FROM tecnico WHERE id_tec='".$Datos['id_tec']."' LIMIT 1");
                $Tec = mysql_fetch_array($Tecnico);
                echo $Tec['nombre_tec']." ".$Tec['apellido_tec']; ?></td>
            <td>
                        <?php
            
                $Equipos = mysql_query("SELECT * FROM equipos WHERE id_eq='".$Datos['id_eq']."' LIMIT 1");
                $Eq = mysql_fetch_array($Equipos);
                echo $Eq['modelo_eq']." ".$Eq['marca_eq']; ?>
                        </td>
            <td>
              <?php echo $Datos['cantidad_man']; ?>
              <input type="hidden" name="cantidad" value="<?php echo $Datos['cantidad_man']; ?>">
            </td>
          </tr>
                    <?php } ?>
        </tbody>
      </table>
                            <div class="row">
                                  <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="estatus">Seleccione el estatus del equipo</label>
                                     <select name="estatus" id="estatus" class="form-control">
                                       <option value="1">Arreglado -> Regresar al inventario</option>
                                       <option value="2">Dañado -> Descontinuar</option>
                                     </select>
                                  </div>
                                  </div>
                                 <div class="col-md-12">
                                  <hr/>
                                 <button type="submit" class="btn btn-info">&nbsp;Aceptar </button>
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