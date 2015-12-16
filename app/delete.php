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
        $query = "DELETE FROM usuarios WHERE id_user=$id";
        if (mysql_query($query))
            echo "Usuario eliminado";
        else
            echo "Ocurrió un error al eliminar";
        break;
    case 'solicitud':
        $query = mysql_query("SELECT * FROM solicitud_equipos WHERE id_sol=$id");
        while ($Datos = mysql_fetch_array($query)) {
            $id_sol_eq = $Datos['id_sol_eq'];
            $query_del = mysql_query("DELETE FROM solicitud_aprobada WHERE id_sol_eq=$id_sol_eq");
        }
        $query = "DELETE FROM solicitud_equipos WHERE id_sol=$id";
        $strResultado = mysql_query($query) or die(mysql_error());
        $query = "DELETE FROM solicitud WHERE id_sol=$id";
        if (mysql_query($query)){
            echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=solicitudes" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">La solicitud fue eliminada correctamente.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=solicitudes" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}else{
            echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=solicitudes" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">Ocurrio un error.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=solicitudes" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}
        break;
    case 'equipos':
        $query = "DELETE FROM equipos WHERE id_eq=$id";
        if (mysql_query($query)){
            echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=equipos" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">El equipo fue eliminado correctamente.</p>
                      
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
                            <p align="center">Ocurrio un problema.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=equipos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}
        break;
    case 'tecnicos':
        $query = "DELETE FROM tecnico WHERE id_tec=$id";
        if (mysql_query($query)){
            echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=tecnicos" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">El tecnico fue eliminado correctamente.</p>
                      
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
                            <p align="center">Ocurrio un problema.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=tecnicos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
		}
        break;
    case 'mantenimiento':
      $query = mysql_query("SELECT * FROM mantenimiento WHERE id_man = $id");
      $mantenimiento = mysql_fetch_array($query);
      $id_eq = $mantenimiento['id_eq'];
      if ($_POST['estatus'] == '1') {
        $query = mysql_query("SELECT * FROM equipos WHERE id_eq=$id_eq");
        $equipos = mysql_fetch_array($query);
        $cantidad_nueva = $mantenimiento['cantidad_man'] + $equipos['cantidad_eq'];
        $query = mysql_query("UPDATE equipos SET cantidad_eq=$cantidad_nueva WHERE id_eq = $id_eq");
        $query = mysql_query("DELETE FROM mantenimiento WHERE id_man=$id");
    		echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=mantenimiento" />
    		 <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                               &nbsp;
                            </div>
                            <div class="panel-body">
                       	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                                <p align="center">El equipo fue enviado al inventario.</p>
                          
                           <hr/>
                              <center><a href="index.php?lugar=mantenimiento" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                            </div>
                            
                        </div>
                    </div>
    		';
      } else {
        $query = mysql_query("SELECT * FROM danados WHERE id_eq=$id_eq");
        if ($danados = mysql_fetch_array($query)) {
          $cantidad = $_POST['cantidad'] + $danados['cantidad_da'];
          $query = mysql_query("UPDATE danados SET cantidad_da=$cantidad WHERE id_eq=$id_eq");
        } else {
          $cantidad = $_POST['cantidad'];
          $query = mysql_query("INSERT INTO danados (id_eq, cantidad_da) VALUES ($id_eq, $cantidad)");
        }
        $query = mysql_query("DELETE FROM mantenimiento WHERE id_man=$id");
        echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=mantenimiento" />
         <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                               &nbsp;
                            </div>
                            <div class="panel-body">
                            <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                                <p align="center">Equipo descontinuado.</p>
                          
                           <hr/>
                              <center><a href="index.php?lugar=mantenimiento" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                            </div>
                            
                        </div>
                    </div>
        ';
      }
      break;
    
    default:
        echo "Opción desconocida";
        break;
}

?>