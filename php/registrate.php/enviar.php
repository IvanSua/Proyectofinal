<?php  

// Llamando a los campos
$name = $_POST['name'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

// Datos para el correo
$destinatario = "ivansuarez2007@hotmail.com";
$asunto = "Contacto desde nuestra web";

$carta = "De: $name \n";
$carta .= "Correo: $email \n";
$carta .= "Telefono: $telefono \n";
$carta .= "asunto: $asunto \n";
$carta .= "Mensaje: $mensaje";

// Enviando Mensaje
mail($destinatario, $asunto, $carta);
header('location:mensaje-de-envio.html');

?>