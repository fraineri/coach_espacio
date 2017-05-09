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
$mail->addAddress($_SESSION['email']); 
//El asunto del email 
$mail->Subject = 'Recordar contraseña'; 
//Cuerpo del mail 
$mail->Body = 'Cuerpo!coachespacio40coachespacio40coachespacio40coachespacio40coachespacio40coachespacio40coachespacio40coachespacio40coachespacio40coachespacio40coachespacio40coachespacio40coachespacio40coachespacio40coachespacio40'; 
 
//Debug 
if (!$mail->send()) { 
    echo "Mailer Error: " . $mail->ErrorInfo; 
} else { 
    echo "Message sent!";
	header('Location: ../login.php');
    exit();
}