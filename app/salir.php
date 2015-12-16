<?php
//Archivo de Configuracion
include("../inc/config.php");

session_start();
session_destroy();
unset($_SESSION['NombreUserLoginSystem']);
unset($_SESSION['IDUserLoginSystem']);
unset($_SESSION['NivelUserLoginSystem']);

echo	"<META HTTP-EQUIV=Refresh CONTENT='0; URL=../index.php'>";

?>