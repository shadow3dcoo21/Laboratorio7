<?php

if(isset($_POST['btn_registrar'])){//ESTA LINEA isset $post significa que verifica si se presiono al boton registrar , en caso sea cierto seguira su camino
    if (empty($_POST["nombre_apellido"]) || empty($_POST["carrera"]) || empty($_POST["lugar_nacimiento"])) {// en esta linea verifica si estan vacias los campos con empty
        header('Location: index.php?mensaje=no_completado');
        exit();
    }
}





include_once 'model/Conexion.php';
$nombres_apellidos = $_POST["nombre_apellido"];
$carrera = $_POST["carrera"];
$lugar_nacimiento= $_POST["lugar_nacimiento"];
$fecha_nacimiento = $_POST["FechaNacimiento"];
$hora_entrada = $_POST["hora_llegada"];
$hora_salida = $_POST["hora_salida"];
$celular = $_POST["Celular"];


$sentenciaBD = $bd->prepare("INSERT INTO pacientes(nombre_apellido,carrera,lugar_nacimiento,fecha_nacimiento,hora_entrada,hora_salida,celular) VALUES (?,?,?,?,?,?,?);");
$resultado = $sentenciaBD->execute([$nombres_apellidos,$carrera,$lugar_nacimiento,$fecha_nacimiento,$hora_entrada,$hora_salida,$celular]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');//se le da como valor a mensaje reistrado esto ara efecto en index como alerta 
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
?>