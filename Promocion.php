<?php include 'template/header.php' ?>


<?php
    include_once 'model/Conexion.php';
    $codigo = $_GET['id_paciente'];
    
    echo 'este es el codgio ',$codigo;
    
    $sentenciaBD = $bd->prepare("select * from pacientes where id_paciente = ?;");
    $sentenciaBD->execute([$codigo]);
    $pacientes = $sentenciaBD->fetch(PDO::FETCH_OBJ);

    $senten_promo = $bd->prepare("select * from promociones where id_paciente = ?;");
    $senten_promo->execute([$codigo]);
    $promocion = $senten_promo->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
<style> body{
  background-image: url('Imagenes/pasillo-hospital-1895367.webp');
  background-repeat: no-repeat;
  background-size: cover;
 } 
 </style>
    <div class="row">
     <div class="col-3">
        <div class="card">
            <div class="card-body">
                <br><?php echo 'Nombre de paciente: '.$pacientes->nombre_apellido; ?>
                <br>
                <br>Ingresar datos para promocion:
            </div>
            <form class="p-4" method="POST" action="RegistrarPromo.php">
                <div class="mb-3">
                    <label class="form-label">Promocion: </label>
                    <input type="text" class="form-control" name="txtPromocion" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Duracion que tendra esta promocion: </label>
                    <input type="text" class="form-control" name="txtduracionpr" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Archivo pdf: </label>
                    <input type="file" class="form-control" id="archivo" name="archivo" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagen: </label>
                    <input type="file" class="form-control" id="imagen" name="imagen" autofocus required>
                </div>
                <div class="d-grid">
                <input type="hidden" name="id_paciente" value="<?php echo $pacientes->id_paciente; ?>"><P></P>
                     <input type="submit" class="btn btn-primary" value="Registrar promocion">
                </div>
            </form>
        </div>
    </div>
        <div class="col-sm-8">
          <div class="card">
            <div class="card-header">
                Lista de Promociones
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">
                            <th scope="col">Promociones</th>
                            <th scope="col">Duracion</th>
                            <th scope="col">Archivo</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col" colspan="4">Enviar Mensaje</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        foreach ($promocion as $dato) {
                            $valor=$dato->id;
                            
                        ?>
                          <tr>
                            <?php echo $valor;?>
                            <td scope="row"><?php echo $dato->id; ?></td>
                            <td><?php echo $dato->promocion_paciente; ?></td>
                            <td><?php echo $dato->duracion_promo; ?></td>
                            
                            <td><a href="descargar_archivo.php?tipo=pdf&id=<?php echo $dato->pdf_file; ?>">Descargar PDF</a></td>
                            <td><a href="descargar_archivo.php?tipo=imagen&id=<?php echo $dato->imagen; ?>">Descargar Imagen</a></td>    
                            <td><a onclick="return confirm('Estas seguro de eliminar esta promo?');" class="text-danger" href="EliminarPromo.php?<?php $valor?>=<?php 
                             echo $dato->id_paciente; 
                             ?>"><i class="bi bi-trash"></i></a></td>
                             
                            <td><a onclick="return confirm('Desea enviar el mensaje?');" class="text-success" href="enviarMensajewhats.php?id=<?php 
                             echo $dato->id; ?>"><i class="bi bi-whatsapp"></i></i></a></td>
                        </tr>
                          
                        <?php 
                            }
                        ?>
                    </tbody>
               </div>
         </div>
    </div>
</div>
    