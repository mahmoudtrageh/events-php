<?php
    
require_once '../vendor/autoload.php';
define("PROJECT_NAME", 'http://localhost/realstate/');
$mail = new PHPMailer\PHPMailer\PHPMailer;
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "mahmud.t.rageh@gmail.com";
$mail->Password = "Ra2311996";
$mail->SMPTSecure = "tls";
$mail->Port = 587;
$mail->SetFrom ("mahmud.t.rageh@gmail.com");
$mail->FromName = "Mahmoud Taha";
$mail->addAddress($_POST['user-mail']);
$mail->isHTML(true);

$mail->Subject = "Forget password Recover";

foreach($user[0] as $us) {

    $mail->Body="<div>" . $us ."<br><br><p>Click here to recover your password<br><a href='" .PROJECT_NAME."auth/resetPassword.php?name=".$us."'>".PROJECT_NAME."auth/resetPassword.php?name=".$us."</a><br><br></p>Regards<br>Admin.</div>";

}

if(!$mail->send()) {
    $error_message = "Mailer Error : ". $mail->ErrorInfo; 
} else {
    $success_message = "تم إرسال رسالة التعديل، من فضلك تصفح بريدك";
}

?>