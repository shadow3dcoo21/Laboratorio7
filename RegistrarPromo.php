<?php
if(empty($_POST["txtPromocion"]) || empty($_POST["txtduracionpr"])) {
    header('Location: index.php');
    exit();
}

include_once 'model/conexion.php';
$promocion = $_POST["txtPromocion"];
$duracion = $_POST["txtduracionpr"];
$codigo = $_POST["id_paciente"];
$archivo_pdf = $_POST["archivo"];
$imagen = $_POST["imagen"];

$sentencia = $bd->prepare("Insert into promociones(promocion_paciente,duracion_promo,pdf_file,imagen,id_paciente) values (?,?,?,?,?);");
$resultado = $sentencia->execute([$promocion,$duracion,$archivo_pdf,$imagen,$codigo]);

if ($resultado === TRUE){
    echo 'holaaaaaa',$codigo;
    header("Location: Promocion.php?id_paciente=".$codigo);
    
}
?>


