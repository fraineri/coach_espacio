<?php 
session_start();
require 'PHPMailer/PHPMailerAutoload.php'; 
//Objeto PHPMailer 
$mail = new PHPMailer;
//Mail Charset
$mail->CharSet = 'UTF-8'; 
//Setear PHPMailer para que use el SMTP como protocolo de envio. 
$mail->isSMTP(); 
//SMTP Debug 
// 0 = Apagado 
// 2 = Debug completo 
$mail->SMTPDebug = 0; 
//Debug formato html 
$mail->Debugoutput = 'html'; 
 
//Hostname del mail server. 
$mail->Host = 'smtp.gmail.com'; 
//Puerto standard de salida para SMTP. 
$mail->Port = 587; 
//Encriptacion tls. (ssl no funciona) 
$mail->SMTPSecure = 'tls'; 
//Autentificar mail para SMTP 
$mail->SMTPAuth = true; 
//Mail para usar SMTP. 
$mail->Username = "coachespacio@gmail.com"; 
//Pass del Mail. 
$mail->Password = "digitalhouse"; 
//Mail de quien lo envia. 
$mail->setFrom('coachespacio@gmail.com', 'Recordar Contraseña'); 
 
//A quien enviarle el email 
$mail->addAddress($_SESSION['recuperar']['email']); 
//El asunto del email 
$mail->Subject = 'Recordar contraseña'; 
//Cuerpo del mail 
$mail->Body = 'Link: http://localhost/coach_espacio/restablecer-contrasenia.php?hash='.$_SESSION['recuperar']['hash']; 
 
$_SESSION['recuperar'] = "";
//Debug 
if (!$mail->send()) { 
    echo "Mailer Error: " . $mail->ErrorInfo; 
    $errores['mail'] = "Problema al enviar el mail. Intente mas tarde.";
    $_SESSION['errores'] = $errores;
    header('Location: ../recuperar-contrasenia.php');
} else { 
    echo "Message sent!";
    $_SESSION['enviado'] = "Mail enviado! Recuerde revisar su Correo no Deseado.";
	header('Location: ../recuperar-contrasenia.php');
    exit();
}