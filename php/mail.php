<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


if(isset($_POST['name']) && isset($_POST['email'])){	
	$uname = $_POST['name'];
	$emailfrom = $_POST['email'];
	$subject = $_POST['subject'];
	$body = $_POST['body'];
	
	$mail = new PHPMailer(true);

	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = "jp.amorim.ua@gmail.com";
	$mail->Password = 'Monalisa123!';
	$mail->Port = 465;
	$mail->SMTPSecure = "ssl";
	
	$mail->IsHTML(true);
	$mail->SetFrom('jp.amorim.ua@gmail.com', 'jp');
	$mail->addAddress('jp.amorim.ua@gmail.com');
	$mail->Subject = $subject;
	$mail->Body = $body;
    $mail->addReplyTo($_POST['email'], $_POST['name']);
	
	if($mail->Send()){
		header("Location: empty.php");
	}
}