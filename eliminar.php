<?php 
    if(!isset($_GET['id_paciente'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['id_paciente'];
    
    $sentenciaBD = $bd->prepare("DELETE FROM pacientes where id_paciente = ?;");
    $resultado = $sentenciaBD->execute([$codigo]);

    if ($resultado === TRUE){
        header('Location: gestion.php?mensaje=Datos de paciente eliminado correctamente');
    } else {
        header('Location: index.php?mensaje=Surgio un error');
    }
?>
