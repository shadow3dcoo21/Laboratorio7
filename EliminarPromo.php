<?php 
    if(!isset($_GET['id_paciente'])){
        echo 'codigo mal';
    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];
    echo 'codigo', $codigo;
    $sentenciaBD = $bd->prepare("DELETE FROM promociones where id= ?;");
    $resultado = $sentenciaBD->execute([$codigo]);

    if ($resultado === TRUE){
        echo 'codigo', $codigo;
        #header("Location: promocion.php?mensaje=",$codigo);
    } else {
        #header('Location: index.php?mensaje=Surgio un error');
    }
?>