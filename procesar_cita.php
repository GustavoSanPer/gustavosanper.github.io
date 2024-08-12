<?php
include("conexion.php");

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // // Recibir y limpiar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $fecha = htmlspecialchars(trim($_POST['fecha']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));
    $recivido = date("d/m/y");
    $consulta = "INSERT INTO datos(nombre, email, telefono, fecha, mensaje, recivido) 
        VALUES('$nombre', '$email', '$telefono', '$fecha', '$mensaje', '$recivido')";
    $resultado =mysqli_connect($conex, $consulta);
    if ($resultado) {
        ?>
        <p>Tu registro se ha completado.</p>
        <?php
        # code...
    }else {
        ?>
        <p>Ocurrio un error</p>
        <?php
    }
    
        // Validación básica (agrega más según sea necesario)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico no válido.";
        exit;
    }

    // Puedes guardar los datos en una base de datos o enviarlos por correo
    // Ejemplo de envío de correo
    // $destinatario = "tuemail@dominio.com"; // Cambia esto por tu email
    // $asunto = "Nueva solicitud de cita de $nombre";
    // $contenido = "Nombre: $nombre\nCorreo: $email\nTeléfono: $telefono\nFecha de la Cita: $fecha\nMensaje: $mensaje";

    // if (mail($destinatario, $asunto, $contenido)) {
    //     echo "Gracias, $nombre. Tu solicitud de cita ha sido enviada.";
    // } else {
    //     echo "Lo sentimos, hubo un problema al enviar tu solicitud.";
    // }
} else {
    echo "Acceso no autorizado.";
}
?>