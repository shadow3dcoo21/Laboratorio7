<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id_paciente'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['id_paciente'];

    $sentenciaBD = $bd->prepare("select * from pacientes where id_paciente = ?;");
    $sentenciaBD->execute([$codigo]);
    $pacientes = $sentenciaBD->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
<style> body{
  background-image: url('Imagenes/pasillo-hospital-1895367.webp');
  background-repeat: no-repeat;
  background-size: cover;
 } 
 </style>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos de paciente:
                </div>
                <form class="p-4" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nombres y Apellidos: </label>
                        <input type="text" class="form-control" name="nombre_apellido" required 
                         value="<?php echo $pacientes->nombre_apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Carrera: </label>
                        <input type="text" class="form-control" name="carrera" autofocus required
                         value="<?php echo $pacientes->carrera; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lugar de Nacimiento: </label>
                        <input type="text" class="form-control" name="lugar_nacimiento" autofocus required
                         value="<?php echo $pacientes->lugar_nacimiento; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Nacimiento: </label>
                        <input type="text" class="form-control" name="fecha_nacimiento" autofocus required
                         value="<?php echo $pacientes->fecha_nacimiento; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Hora de Entrada: </label>
                        <input type="time" class="form-control" name="hora_entrada" autofocus required
                         value="<?php echo $pacientes->hora_entrada; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora de Salida: </label>
                        <input type="time" class="form-control" name="hora_salida" autofocus required
                         value="<?php echo $pacientes->hora_salida; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="number" class="form-control" name="celular" 
                        value="<?php echo $pacientes->celular; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $pacientes->id_paciente; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                        <?php 
                            if(isset($_POST['codigo'])){

                                $codigo = $_POST['codigo'];
                                $nombres = $_POST['nombre_apellido'];
                                $carrera = $_POST['carrera'];
                                $lugar_nacimiento = $_POST['lugar_nacimiento'];
                                $fecha_nacimiento = $_POST['fecha_nacimiento'];
                                $hora_entrada = $_POST['hora_entrada'];
                                $hora_salida = $_POST['hora_salida'];
                                $celular = $_POST['celular'];
                                $sentenciaBD = $bd->prepare("UPDATE pacientes SET nombre_apellido = ?, carrera = ?, lugar_nacimiento = ?, fecha_nacimiento = ?,hora_entrada = ?,hora_salida = ?,celular = ? where id_paciente = ?;");
                                $resultado = $sentenciaBD->execute([$nombres,$carrera,$lugar_nacimiento, $fecha_nacimiento, $hora_entrada, $hora_salida,$celular,$codigo]);

                                if ($resultado === TRUE) {
                                    echo 'bien';
                                    
                                } else {
                                    #header('Location: index.php?mensaje=hubo un error');
                                    #exit();
                                    echo 'mal';
                                }
                            };
                        
                        
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>