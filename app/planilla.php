<?php
define('FPDF_FONTPATH','../fpdf/font/');
include_once '../inc/config.php';
require("../fpdf/fpdf.php");
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
if ($type != 'mantenimiento') {
    $query = mysql_query("SELECT * FROM solicitud WHERE id_sol = $id");
    $solicitud = mysql_fetch_array($query);
    $id_user = $solicitud['id_user'];
    $query = mysql_query("SELECT * FROM usuarios WHERE id_user=$id_user");
    $usuario = mysql_fetch_array($query);
    $query = mysql_query("SELECT * FROM solicitud_equipos WHERE id_sol=$id");
    $solicitud_equipos = mysql_fetch_array($query);
    $id_sol_eq = $solicitud_equipos['id_sol_eq'];
    $query = mysql_query("SELECT * FROM solicitud_aprobada WHERE id_sol_eq=$id_sol_eq");
    $solicitud_aprobada = mysql_fetch_array($query);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Helvetica","","15");
    $pdf->Cell(0,20,utf8_decode("Préstamo de equipo"),0,1,'C');
    $pdf->SetFont("Helvetica","","9");
    $pdf->Cell(30,10,utf8_decode("Fecha de préstamo"),0,0);
    $pdf->Cell(30,10, $solicitud['fecha_sol'],0,0);
    $pdf->Cell(20,10,"Hora",0,0);
    $pdf->Cell(30,10, $solicitud_aprobada['hora_apr'],0,0);
    $pdf->Cell(40,10,"Nombre de solicitante",0,0);
    $pdf->Cell(30,10, $usuario['nombres_user'] . " " . $usuario['apellidos_user'],0,1);
    $pdf->Cell(0,10,"",0,1);
    $pdf->Cell(35,10,"",0,0,'C');
    $pdf->Cell(40,10,"Modelo",1,0,'C');
    $pdf->Cell(40,10,"Marca",1,0,'C');
    $pdf->Cell(40,10,"Serie",1,1,'C');
    $pdf->Cell(35,10,"",0,0,'C');

    $portatiles = 0;

    $query = mysql_query("SELECT * FROM solicitud_equipos WHERE id_sol=$id");
    while($solicitud_equipos = mysql_fetch_array($query)){
        $id_eq = $solicitud_equipos['id_eq'];
        $query2 = mysql_query("SELECT * FROM equipos WHERE id_eq=$id_eq");
        $equipo = mysql_fetch_array($query2);
        if ($equipo['modelo_eq'] == 'CPU') {
            $pdf->Cell(40,10,"CPU",1,0,'C');
            $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
            $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
            $pdf->Cell(35,10,"",0,0,'C');
        }
        if ($equipo['modelo_eq'] == 'Monitor') {
            $pdf->Cell(40,10,"Monitor",1,0,'C');
            $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
            $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
            $pdf->Cell(35,10,"",0,0,'C');
        }
        if ($equipo['modelo_eq'] == 'Teclado') {
            $pdf->Cell(40,10,"Teclado",1,0,'C');
            $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
            $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
            $pdf->Cell(35,10,"",0,0,'C');
        }
        if ($equipo['modelo_eq'] == 'Mouse') {
            $pdf->Cell(40,10,"Mouse",1,0,'C');
            $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
            $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
            $pdf->Cell(35,10,"",0,0,'C');
        }
        if ($equipo['modelo_eq'] == 'Conetas') {
            $pdf->Cell(40,10,"Cornetas",1,0,'C');
            $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
            $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
            $pdf->Cell(35,10,"",0,0,'C');
        }
        if ($equipo['modelo_eq'] == 'Laptop') {
            $portatiles += $solicitud_equipos['cantidad_eq'];
            $pdf->Cell(40,10,"Laptop",1,0,'C');
            $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
            $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
            $pdf->Cell(35,10,"",0,0,'C');
        }
    }
    $pdf->Cell(0,20,"",0,1);
    $pdf->SetFont("Helvetica","B","9");
    $pdf->Cell(50,10,utf8_decode("Número de equipos portatiles: "), 0,0);
    $pdf->SetFont("Helvetica","","9");
    $pdf->Cell(30,10, $portatiles,0,1);
    $pdf->SetFont("Helvetica","B","9");
    $pdf->Cell(10,5,"Nota: ");
    $pdf->SetFont("Helvetica","","9");
    $pdf->MultiCell(0,5,utf8_decode("El usuario o Departamento debe responder por cualquier pérdida, daño parcial o total, será su responsabilidad devolver los dispositivos o equipos de cómputo en buenas condiciones en el tiempo indicado y dentro del horario establecido de servicios. Para la solicitud de cualquier dispositivo o equipos requeridos deberá ser empleado fijo de la empresa y debe estar registrado en el sistema, todas las solicitudes se harán a través de la intranet y solo serán aprobadas la cantidad especificada por la gerencia del Departamento de Servicios de usuario. De no aceptar los términos y condiciones no se tomaran en consideración las probaciones realizadas por la gerencia."));
    $pdf->Cell(0,10,"",0,1);
    $pdf->Cell(50,10,"Nombre del asesor responsable:",0,0);
    $pdf->Cell(30,10, $usuario['nombres_user'] . " " . $usuario['apellidos_user'],0,1);
    $pdf->Cell(30,10,utf8_decode("Departamento"),0,0);
    switch ($solicitud['departamento_sol']) {
         case 1:
            $pdf->Cell(30,10, utf8_decode("Unidad de Trasmisión"),0,1);
            break;
         case 2:
            $pdf->Cell(30,10, utf8_decode("Unidad de Conmutación"),0,1);
            break;
         case 3:
            $pdf->Cell(30,10, utf8_decode("Unidad de Datos"),0,1);
            break;
         case 4:
            $pdf->Cell(30,10, utf8_decode("Unidad de Planta Externa"),0,1);
            break;
         case 5:
            $pdf->Cell(30,10, utf8_decode("Oficina de Atención Al Cliente CANTV"),0,1);
            break;
         case 6:
            $pdf->Cell(30,10, utf8_decode("Oficina de Atención Al Cliente Movilnet"),0,1);
            break;
     }
    $pdf->Cell(40,10,utf8_decode("Fecha de devolución"),0,0);
    $pdf->Cell(30,10, $solicitud['fecha_dev_sol'],0,1);
    $pdf->Cell(0,10,"Nombre y firma de quien recibe",0,1);
    $pdf->Cell(0,10,"Nombre y firma del usuario",0,1);
    $pdf->Cell(30,10,utf8_decode("Observación"),0,0);
    $pdf->Cell(30,10, $solicitud['observacion_sol'],0,1);
    $pdf->Output();
} else {
    $query = mysql_query("SELECT * FROM mantenimiento WHERE id_man=$id");
    $mantenimiento = mysql_fetch_array($query);
    $id_eq = $mantenimiento['id_eq'];
    $id_tec = $mantenimiento['id_tec'];
    $query = mysql_query("SELECT * FROM equipos WHERE id_eq=$id_eq");
    $equipo = mysql_fetch_array($query);
    $query = mysql_query("SELECT * FROM tecnico WHERE id_tec=$id_tec");
    $tecnico = mysql_fetch_array($query);
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Helvetica","","15");
    $pdf->Cell(0,20,utf8_decode("Equipos en mantenimiento"),0,1,'C');
    $pdf->SetFont("Helvetica","","9");
    $pdf->Cell(0,10,"",0,1);
    $pdf->Cell(35,10,"",0,0,'C');
    $pdf->Cell(40,10,"Modelo",1,0,'C');
    $pdf->Cell(40,10,"Marca",1,0,'C');
    $pdf->Cell(40,10,"Serie",1,1,'C');
    $pdf->Cell(35,10,"",0,0,'C');
    if ($equipo['modelo_eq'] == 'CPU') {
        $pdf->Cell(40,10,"CPU",1,0,'C');
        $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
        $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
        $pdf->Cell(35,10,"",0,0,'C');
    }
    if ($equipo['modelo_eq'] == 'Monitor') {
        $pdf->Cell(40,10,"Monitor",1,0,'C');
        $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
        $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
        $pdf->Cell(35,10,"",0,0,'C');
    }
    if ($equipo['modelo_eq'] == 'Teclado') {
        $pdf->Cell(40,10,"Teclado",1,0,'C');
        $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
        $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
        $pdf->Cell(35,10,"",0,0,'C');
    }
    if ($equipo['modelo_eq'] == 'Mouse') {
        $pdf->Cell(40,10,"Mouse",1,0,'C');
        $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
        $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
        $pdf->Cell(35,10,"",0,0,'C');
    }
    if ($equipo['modelo_eq'] == 'Conetas') {
        $pdf->Cell(40,10,"Cornetas",1,0,'C');
        $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
        $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
        $pdf->Cell(35,10,"",0,0,'C');
    }
    if ($equipo['modelo_eq'] == 'Laptop') {
        $portatiles += $solicitud_equipos['cantidad_eq'];
        $pdf->Cell(40,10,"Laptop",1,0,'C');
        $pdf->Cell(40,10,$equipo['marca_eq'],1,0,'C');
        $pdf->Cell(40,10,$equipo['serie_eq'],1,1,'C');
        $pdf->Cell(35,10,"",0,0,'C');
    }
    $pdf->Cell(0,10,"",0,1);
    $pdf->Cell(0,10,"",0,1);
    $pdf->Cell(40,10,utf8_decode("Cantidad"),0,0);
    $pdf->Cell(30,10, $mantenimiento['cantidad_man'],0,1);
    $pdf->Cell(30,10,utf8_decode("Técnico"),0,0);
    $pdf->Cell(30,10, $tecnico['nombre_tec'] . " " . $tecnico['apellido_tec'],0,1);
    $pdf->Cell(40,10,utf8_decode("Días en mantenimiento"),0,0);
    $pdf->Cell(30,10, $mantenimiento['dias_man'],0,1);
    $pdf->Output();
}
?>