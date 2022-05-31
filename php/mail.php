<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

require_once 'config.php';
	
	$uname = $_POST['name'];
	$emailfrom = $_POST['email'];
	$body = $_POST['body'];
	
	$mail = new PHPMailer(true);

	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = "jp.amorim.ua@gmail.com";
	$mail->Password =  'suckmybigdick!"#';
	$mail->Port = 465;
	$mail->SMTPSecure = "ssl";
	
	$mail->SetFrom('jp.amorim.ua@gmail.com');
	$mail->addAddress('jp.amorim.ua@gmail.com');
    $mail->addReplyTo($_POST['email'], $_POST['name']);
	
	$mail->Body = $body;
	$mail->IsHTML(true);
	
	$mail->Send();