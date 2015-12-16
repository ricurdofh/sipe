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
$id_tec = $_POST['tec'];
$cantidad = $_POST['cantidad'];
$dias = $_POST['dias_man'];

$query = mysql_query("SELECT cantidad_eq FROM equipos WHERE id_eq=$id");
$cantidad_vieja = mysql_fetch_row($query);
$cantidad_nueva = $cantidad_vieja[0] - $cantidad;
$query = mysql_query("UPDATE equipos SET cantidad_eq=$cantidad_nueva WHERE id_eq=$id");
$query = "INSERT INTO mantenimiento (id_eq, id_tec, cantidad_man, dias_man) VALUES ($id, $id_tec, $cantidad, $dias)";
if (mysql_query($query)){
    echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=mantenimiento" />
		 <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">Equipos en mantenimiento.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=mantenimiento" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
}else{
   echo '<meta http-equiv="refresh" content="15;url=index.php?lugar=equipos" />
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           &nbsp;
                        </div>
                        <div class="panel-body">
                   	    <p align="center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
                            <p align="center">ocurrio un error al registrar el equipo.</p>
                      
                       <hr/>
                          <center><a href="index.php?lugar=equipos" class="btn btn-success"><i class="fa fa-reply-all"></i>&nbsp;Regresar </a></center>
                        </div>
                        
                    </div>
                </div>
		';
}
?>