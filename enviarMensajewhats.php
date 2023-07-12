
<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['id'];
echo $codigo;
$sentencia = $bd->prepare("select a.promocion_paciente , a.duracion_promo , a.id_paciente , 
c.nombre_apellido ,  c.celular,a.pdf_file,a.imagen from promociones a join pacientes c on(a.id_paciente=c.id_paciente) where a.id= ?;");
$sentencia->execute([$codigo]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
$urlImagen = 'http://localhost/enfermeria/imagen/' . $persona->imagen;
    
    $url = 'https://api.green-api.com/waInstance7103835761/SendMessage/dffc1b6cac4c45c1b6ac353d5b61675f8192c6fc02f74eef8c';
    $data = [
        "chatId" => "51".$persona->celular."@c.us",
        "message" =>  'Estimado(a) *'.strtoupper($persona->nombre_apellido).'* se le envio este mensaje para avisarle que su promocion *'.strtoupper($persona->promocion_paciente)
        .'* esta activa, y tendra una duracion de *'.strtoupper($persona->duracion_promo).'*. aqui puede visualizar el pdf de la promocion   '.strtoupper($persona->pdf_file).' *.
        y una imagen del producto '. $urlImagen
    ];

    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    header('Location:Promocion.php?codigo='.$persona->id_persona);
?>

