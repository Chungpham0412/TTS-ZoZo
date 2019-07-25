<?php
include "Mailler/PHPMailerAutoload.php";

function sentMail($email,$name,$html){
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP(); 
$mail->CharSet = 'UTF-8';                                     // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'flatizeshop@gmail.com';                 // SMTP username
$mail->Password = 'flatize123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'flatizeshop@gmail.com';
$mail->FromName = 'Flatize Shop';
$mail->addAddress($email, $name);     // Add a recipient
// $mail->addAddress('namlun22014@gmail.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Flatize Shop - Bạn đã đặt hàng thành công';
$mail->Body    = $html;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	   return false;
	} else {
	    return true;
	}
}
?>