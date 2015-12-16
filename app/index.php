<?php
//Archivo de Configuracion
include "../inc/config.php";

session_start();

//Verificamos que la session nombres_usuario excista
if (isset($_SESSION['NombreUserLoginSystem'])) {

} else {
	//Si la session no esta creada se reenvia a la pantalla del login
	header("Location: ../index.php");
	exit();
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
   <title>SIPE CANTV ME</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css"/>
    <!-- FONT AWESOME ICONS  -->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css" />
    <!-- CUSTOM STYLE  -->
    <link rel="stylesheet" type="text/css" href="../css/_style.css" />
    <link rel="shortcut icon" href="../favicon.ico" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script type="text/javascript" language="javascript" src="../js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script type="text/javascript" language="javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="../js/jquery.validate.min.js"></script>
	<script type="text/javascript" language="javascript" src="../js/demo.js"></script>
  <script type="text/javascript" language="javascript" src="../js/scripts.js"></script>
	<script type="text/javascript" language="javascript" class="init">
		$(document).ready(function() {
			$('#datos').DataTable();
		} );
	</script>
</head>
<body>
     <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <img src="../img/topi.jpg" width="1139" height="84">
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">

                    <img src="../img/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="../img/64-64.jpg" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">


                                    </div>
                                </div>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section" style="background-color:#FFF">
        <div class="container" style="background-color:#222">

            <div class="row">
                    <div class="col-md-12">
                    	  <ul id="menu-top" class="nav navbar-nav navbar-right">
                              <li><a class="menu-top-active" href="index.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Inicio</a></li>
                              <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i>&nbsp;&nbsp;Usuarios
                                <span class="caret"></span></a>
                                <?php
                                	if ($_SESSION['NivelUserLoginSystem']=="1"){
								?>
                                <ul class="dropdown-menu" style="background-color:#222">
                                  <li><a href="index.php?lugar=usuario"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Registrar</a></li>
                                  <li><a href="index.php?lugar=usuarios"><i class="fa fa-bars"></i>&nbsp;&nbsp;Ver Todos</a></li>
                                </ul>
                                <?php } ?>
                              </li>
                               <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-book"></i>&nbsp;&nbsp;Solicitudes
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu" style="background-color:#222">
                                  <li><a href="index.php?lugar=solicitud"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Registrar</a></li>
                                  <li><a href="index.php?lugar=solicitudes"><i class="fa fa-bars"></i>&nbsp;&nbsp;Ver Todas</a></li>
                                </ul>
                              </li>
                               <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-check-circle-o"></i>&nbsp;&nbsp;Prestamos
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu" style="background-color:#222">
                                 <?php
                                	if ($_SESSION['NivelUserLoginSystem']=="1"){
								?>
                                   <li><a href="index.php?lugar=prestamos"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Registrar</a></li>
                                  <?php
									}
								  ?>
                                  <li><a href="index.php?lugar=ver_prestamos"><i class="fa fa-bars"></i>&nbsp;&nbsp;Ver Todos</a></li>
                                </ul>
                              </li>
                               <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-desktop"></i>&nbsp;&nbsp;Equipos
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu" style="background-color:#222">
                                 <?php
                                	if ($_SESSION['NivelUserLoginSystem']=="1"){
								?>
                                  <li><a href="index.php?lugar=equipo"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Registrar</a></li>
                                  <li><a href="index.php?lugar=mantenimiento"><i class="fa fa-cogs"></i>&nbsp;&nbsp;En Mantenimiento</a></li>
                                  <li><a href="index.php?lugar=devoluciones"><i class="fa fa-undo"></i>&nbsp;&nbsp;Devoluciones</a></li>
                                   <li><a href="index.php?lugar=prestados"><i class="fa fa-google-wallet"></i>&nbsp;&nbsp;Prestados</a></li>
                                   <?php } ?>
                                  <li><a href="index.php?lugar=equipos"><i class="fa fa-bars"></i>&nbsp;&nbsp;Ver Todos</a></li>
                                </ul>
                              </li>
                               <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-wrench"></i>&nbsp;&nbsp;Tecnicos
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu" style="background-color:#222">
                                 <?php
                                	if ($_SESSION['NivelUserLoginSystem']=="1"){
								?>
                                 <li><a href="index.php?lugar=tecnico"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Registrar</a></li>
                                  <?php
									}
								  ?>
                                  <li><a href="index.php?lugar=tecnicos"><i class="fa fa-bars"></i>&nbsp;&nbsp;Ver Todos</a></li>
                                </ul>
                              </li>
                              <li><a href="salir.php"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Salir</a></li>
                			</ul>
                    </div>
             </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">

           <?php
//Obtenemos el nombre del url
$lugar = $_GET["lugar"];

//Verificamos que no sea ninguno de los que estan excluidos
if ($lugar == "" || $lugar == "index" || $lugar == "principal") {
	include "home.php";
} else {

	//Verificamos que el archivo exista y parseamos los caracteres especiales
	if (file_exists("$lugar.php")) {
		$lugar = htmlspecialchars(trim($_GET["lugar"]));
		$lugar = str_replace("<[^>]*>", "", $lugar);
		$lugar = str_replace(".*//", "", $lugar);

		//Si el archivo esta lo incluimos para ser mostrado
		include "$lugar.php";
	} else {
		//Si no se encuentra mostramos el error 404
		include "404.php";
	}
}
?>

           </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12" align="center">
                    &copy; 2015 Todos Los Derechos Reservados a SIPE CANTV M&Eacute;RIDA
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
</body>
</html>
