<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/SMTP.php';

$errorText = "";

if ($_POST['subject']=='') {
    $errorText = $errorText." Subject is not enterd.<br>";
}
if ($_POST['message']=='') {
    $errorText = $errorText." Message is not enterd.<br>";
}

if ($errorText !="") {
    header("Location:../pages/contactUs.php?error=".$errorText);
    exit();
}else {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username='achinthyadulshan1@gmail.com';
    $mail->Password= 'zxgwwvcdqocycrzy';
    $mail->SMTPSecure='ssl';
    $mail->Port = 465;

    $mail->setFrom('achinthyadulshan1@gmail.com');
    $mail->addAddress('achinthyadulshan034@gmail.com'); //Assume that achinthyadulshan034@gmail.com is Admin email
    $mail->isHTML(true);

    $message = $_POST['message'].'<br> FROM, <br> <b>'.$_SESSION['username'].'</b>';
    $mail->Subject=$_POST['subject'];
    $mail->Body=$message;

    $mail->send();
    header("Location:../pages/contactUs.php?status='success'");
}

?>
