<?php include 'template/header.php' ?>
<?php
    include_once "Model/Conexion.php";
    $sentenciaBD = $bd -> query("select * from pacientes");
    $persona = $sentenciaBD->fetchAll(PDO::FETCH_OBJ);
?>
<div class="rowr content">
<div class="col-md-12">
            
            <div class="card">
                <div class="card-header">
                    Lista de Pacientes
                </div>
                <div class="p-4">
                    <table class="table align-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombres y Apellidos</th>
                                <th scope="col">Carrera</th>                               
                                <th scope="col">Lugar de Nacimiento</th>
                                <th scope="col">F.Nacimiento</th>
                                <th scope="col">Hora de entrada</th>
                                <th scope="col">Hora de salida</th>
                                <th scope="col">Celular</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($persona as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id_paciente; ?></td>
                                <td><?php echo $dato->nombre_apellido; ?></td>
                                <td><?php echo $dato->carrera; ?></td>
                                <td><?php echo $dato->lugar_nacimiento; ?></td>
                                <td><?php echo $dato->fecha_nacimiento; ?></td>
                                <td><?php echo $dato->hora_entrada; ?></td>
                                <td><?php echo $dato->hora_salida; ?></td>
                                <td><?php echo $dato->celular; ?></td>
                                <td><a class="text-primary" href="Promocion.php?id_paciente=<?php echo $dato->id_paciente; ?>"><i class="bi bi-cash"></i></a></td>
                                <td><a class="text-success" href="editar.php?id_paciente=<?php echo $dato->id_paciente; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id_paciente=<?php echo $dato->id_paciente; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
</div>
<?php include 'template/footer.php' ?>