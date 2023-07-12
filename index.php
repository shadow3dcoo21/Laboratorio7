<?php include 'template/header.php' ?>
<div class="container-fluid bg-dark ">
          <div class="row">
              <div class="col-md">
                  <header class="py-3">
                      <h3 class="text-center" style="color: white;">Registro de Pacientes</h3>
                  </header>
              </div>
          </div>
      </div>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
<?php 
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
?>
<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    Se registro exitosamente
  </div>
</div>
<?php 
   }else{
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'no_completado'){

?>
<div class="alert alert-success d-flex align-items-center" role="alert" style="background-color:brown;color:aliceblue;">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    Falta llenar datos
  </div>
</div>
<?php    
    }
   }
?> 



<div class="container mt-5">
    <div class="row justify-content-center">
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar_paciente.php">
                    <div class="mb-3">
                        <label class="form-label">Nombres y Apellidos: </label>
                        <input type="text" class="form-control" name="nombre_apellido" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Carrera: </label>
                        <input type="text" class="form-control" name="carrera" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lugar de Nacimiento: </label>
                        <input type="text" class="form-control" name="lugar_nacimiento" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Nacimiento: </label>
                        <input type="date" class="form-control" name="FechaNacimiento" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora de entrada: </label>
                        <input type="time" class="form-control" name="hora_llegada" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora de salida: </label>
                        <input type="time" class="form-control" name="hora_salida" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="number" class="form-control" name="Celular" >
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="btn_registrar" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="espacio" style="position: absolute;
    height: 100px;
    width: 200px;
    background-color: transparent;">
    
</div>

<?php include 'template/footer.php' ?>