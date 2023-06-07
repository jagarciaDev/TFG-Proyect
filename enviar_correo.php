<?php
// Incluir la biblioteca PHPMailer
require 'vendor/autoload.php';

// Configuración del servidor de correo
$smtpHost = 'smtp.gmail.com';
$smtpUsuario = 'jagarciat21@gmail.com';
$smtpClave = 'Melendiysergio12@';
$smtpPuerto = 587;

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

// Crear una instancia de PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Habilitar la depuración de SMTP
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';

// Configuración del servidor de correo
$mail->isSMTP();
$mail->Host = $smtpHost;
$mail->SMTPAuth = true;
$mail->Username = $smtpUsuario;
$mail->Password = $smtpClave;
$mail->SMTPSecure = 'tls';
$mail->Port = $smtpPuerto;

// Configurar el remitente y el destinatario
$mail->setFrom($correo, $nombre);
$mail->addAddress('destinatario@example.com');

// Configurar el contenido del correo
$mail->isHTML(true);
$mail->Subject = 'Correo de contacto';
$mail->Body = $mensaje;

// Enviar el correo
if ($mail->send()) {
    // El correo se envió correctamente
    echo 'Correo enviado correctamente.';
} else {
    // Hubo un error al enviar el correo
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
