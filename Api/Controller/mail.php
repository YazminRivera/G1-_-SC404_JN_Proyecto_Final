<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

/*$nombre = $_POST['nombre'];
$correoCliente = $_POST['correo'];
$telefono = $_POST['telefone'];
$Comentarios = $_POST['comentarios'];
$Comprobante = $_POST['comprobante'];*/


$mail = new PHPMailer(true);

$mail->isSMTP();                      // Set mailer to use SMTP
$mail->Host = 'mail.cabanaslalaguna.com';       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;               // Enable SMTP authentication
$mail->Username = 'reservas@cabanaslalaguna.com';   // SMTP username
$mail->Password = 'rservas2022?$';   // SMTP password
$mail->SMTPSecure = 'ssl';            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                    // TCP port to connect to

// Sender info
$mail->setFrom('reservas@cabanaslalaguna.com', 'Reservas');
//$mail->addReplyTo('jrojas@cabanaslalaguna.com', '');

// Add a recipient
$mail->addAddress('info@cabanaslalaguna.com');

$mail->addCC('jrojas@cabanaslalaguna.com');
//$mail->addBCC('bcc@example.com');

// Set email format to HTML
$mail->isHTML(true);

// Mail subject
$mail->Subject = 'Email from local host to test';

// Mail body content
$bodyContent = '<h1>How to Send Email from Localhost using PHP by InfoTech</h1>';
$bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>TechWAR</b></p>';
$mail->Body    = $bodyContent;

// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
}
