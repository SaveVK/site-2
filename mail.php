<?php 

require_once('./phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$number = $_POST['user_number'];
$email = $_POST['user_email'];
$location = $_POST['user_location_address'];
// $bottles = $_POST['user_bootles'];
$bottlesValue = $_POST['user_bootles']; // make value

//$mail->SMTPDebug = 3;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = '5starshopuae@gmail.com'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'terry123'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('5starshopuae@gmail.com'); // от кого будет уходить письмо?
$mail->addAddress('5starshopuae@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com')
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
$mail->isHTML(true);

$mail->Subject = 'new message from site';
$mail->Body    = 'Name: ' .$name . '<br>Number:' .$number. '<br>Email:' .$email. '<br>Location:' .$location . '<br>' . 'Bottles: ' . $bottlesValue;
$mail->AltBody = '';

if(!$mail->send()) {
     echo 'Error'.$mail->ErrorInfo;
} else {
    header('location: thank-you.html');
}

?>