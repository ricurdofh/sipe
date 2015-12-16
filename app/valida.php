<?php
//Archivo de Configuracion
include "../inc/config.php";

session_start();
//Variables
$strUsuario = $_POST['user'];
$strClave = md5($_POST['pass']);

//Campos Vacios
if ($strUsuario == "" || $strClave == "") {

	echo "<meta http-equiv=\"refresh\" content=\"0;url=../index.php?msg=1\" />";

} else {

	//Consultando Usuario
	$strQuery = "SELECT * FROM usuarios WHERE usuario_user='$strUsuario' LIMIT 1";
	$strResultado = mysql_query($strQuery) or die(mysql_error());
	$strDatos = mysql_num_rows($strResultado);

	if ($strDatos == 0) {

		echo "<meta http-equiv=\"refresh\" content=\"0;url=../index.php?msg=2\" />";

	} else {

		//Consultando Usuario y Clave
		$strQuery = "SELECT * FROM usuarios WHERE usuario_user='$strUsuario' AND clave_user='$strClave' LIMIT 1";
		$strResultado = mysql_query($strQuery) or die(mysql_error());
		$strDatos = mysql_num_rows($strResultado);

		if ($strDatos == 0) {

			echo "<meta http-equiv=\"refresh\" content=\"0;url=../index.php?msg=3\" />";

		} else {

			//Consulta Usuario, Clave y Status
			$strQuery = "SELECT * FROM usuarios WHERE usuario_user='$strUsuario' AND clave_user='$strClave' LIMIT 1";
			$strResultado = mysql_query($strQuery) or die(mysql_error());
			$strDatos = mysql_num_rows($strResultado);

			$strLog = mysql_fetch_array($strResultado);
			$strNombres = $strLog['nombres_user'] . " " . $strLog['apellidos_user'];
			$strIDUsr = $strLog['id_user'];
			$strNvl = $strLog['cargo_user'];

			//Registro la session del Usuario Online
			$_SESSION['NombreUserLoginSystem'] = $strNombres;
			$_SESSION['IDUserLoginSystem'] = $strIDUsr;
			$_SESSION['NivelUserLoginSystem'] = $strNvl;

			echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php\" />";

		}

	}
}

?>