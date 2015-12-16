<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>SIPE CANTV ME</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="favicon.ico" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
$("#alerta").fadeOut(0);
<?php
//Mensajes de Alerta
switch ($_GET['msg']) {
	case 1:
		?>
			$("#alerta").fadeIn(0);
		$("#alerta").fadeOut(7000);
	<?php
	break;
	case 2:
		?>
		 	$("#alerta").fadeIn(0);
		$("#alerta").fadeOut(7000);
	<?php
	break;
	case 3:
		?>
		 	$("#alerta").fadeIn(0);
		$("#alerta").fadeOut(7000);
	<?php
	break;
	case 4:
		?>
		 	$("#alerta").fadeIn(0);
		$("#alerta").fadeOut(7000);
	<?php
	break;
}
?>
});
</script>

</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <img src="img/topi.jpg" width="1139" height="84">
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

                    <img src="img/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <i class="login-icon" ></i>
        </div>
            </div>
        </div>
    <!-- LOGO HEADER END-->

    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-line"></div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                  <form action="app/valida.php" method="post" enctype="multipart/form-data">
                    <br />
                     <label>Usuario : </label>
                        <input type="text" name="user" id="user" class="form-control" />
                        <label>Clave :  </label>
                        <input type="password" name="pass" id="pass" class="form-control" />
                        <hr />
                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Iniciar Sesi&oacute;n </button>&nbsp;
                        </form>
                        <p>&nbsp;</p>



                       <?php
if (isset($_GET['msg'])) {

	?>
            <div id="alerta" class="alert alert-danger alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                  &times;
               </button>
               <div align="center">
               <?php
switch ($_GET['msg']) {
		case 1:
			echo "Disculpe los campos estan vacios!";
			break;
		case 2:
			echo "Disculpe el nombre de usuario no existe!";
			break;
		case 3:
			echo "Disculpe la clave es incorrecta!";
			break;

	}
	?>
               </div>
            </div>
               <?php }
?>










                </div>
                <div class="col-md-6">
                    <div class="alert alert-info">
                        SIPE.
                        Sistema Integral de Prestamo de Equipos.
                        <br />
                         <strong> Caracteristicas del Sistema :</strong>
                        <ul>
                        	<li>
                                Inventario de Equipos
                            </li>
                            <li>
                               Solicitud de Equipo
                            </li>
                            <li>
                                Aprobaci&oacute;n de Prestamo de Equipos
                            </li>
                            <li>
                                Equipos en Mantenimiento
                            </li>
                             <li>
                                T&eacute;cnicos Responsables
                            </li>
                        </ul>

                    </div>

                </div>

            </div>
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
