<?php
//error_reporting(0);
//Datos De Conexion
	define ("HOST_SIS",  "localhost");	//Rutal Del Servidor
	define ("USER_SIS" , "root");			//Usuario de MySQL
	define ("PASS_SIS", "123");				//Clave de MySQL
	define ("BD_SIS", "sipe");		//Base de Datos

function MySQLConex(){	
	//Conexion
	$strConex = mysql_connect (HOST_SIS,USER_SIS,PASS_SIS) or die ("Error De Conexion: ".mysql_error());
	//Seleccion de Base de Datos
	$base_datos = mysql_select_db (BD_SIS,$strConex)or die ("Error Al Seleccionar La Base de Datos: ".mysql_error());

return $strConex;
}

MySQLConex();


?>
