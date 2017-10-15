<?php
require 'PHPMailer/PHPMailerAutoload.php';

$msg = $_POST["msg"];

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'anjalisharma2730@gmail.com';          // SMTP username
$mail->Password = 'desire12'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('anjalisharma2730@gmail.com', 'Fraud Chase');
// $mail->addReplyTo('prasanna.ailuri1996@gmail.com', '');
$mail->addAddress('shikha735@gmail.com');   // Add a recipient
//$mail->AddEmbeddedImage('img/email.png', 'logo_2u'); 
//$mail->AddEmbeddedImage('img/logo.png', 'logo_1'); 
// $mail->AddEmbeddedImage('img/logo-black.png', 'logo_2u'); 
//$mail->AddEmbeddedImage('img/logo-small.png', 'logo_13'); 
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML
//$mail->AddEmbeddedImage("./email-sample-img-2.png", "my-attach", "email-sample-img-2.png");
//$remoteImage = "http://localhost/fds/temp/email-sample-img-2.png";
//$imginfo = getimagesize($remoteImage);
//header("Content-type: {$imginfo['mime']}");
//readfile($remoteImage);

// $bodyContent = file_get_contents('email.php');
//$bodyContent .= '<h1>this ia mail from fds team</h1>';
//$bodyContent .= '<p>your account has been hacked<b>CodexWorld</b></p>';
//$bodyContent .='</body></html>';

$mail->Subject = 'Reply to the cardholder';
$mail->Body    = $msg;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
    require 'dbconnect.php';
    $query_msg_update = "INSERT INTO replies(id, subject, body) VALUES ('?','Reply to the cardholder',
					 '".$msg."')";
    if($query_run = mysqli_query($mysql_connect, $query_msg_update))
    {
		header('Location: '.'../Messages.php');
	}
	else{
		echo "Data not inserted";
	}
    
}
?>
