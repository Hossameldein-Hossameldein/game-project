<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';
include '../../config/config.php';
require_once '../captcha/checkemail.class.php'; 
session_start();
if(isset($_POST['type']) == 'sendcode' && !empty($_POST['email'])){
    $_SESSION['sendcode'] = rand(10,10000);
    $code = $_SESSION['sendcode'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $errors= [];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, 'Wrong in Email');
    }
    $check_mail = new VerifyEmail();
    if(!$check_mail->check($email)){
        array_push($errors, 'Not found This email');
    }
    if(empty($errors)){
        $mail = new PHPMailer();
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP();
        $mail->SMTPAuth = true;  // authentication enabled
        // $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
        // $mail->Mailer = “smtp”;  
        $mail->Username = 'hossameldein63@gmail.com';
        $mail->Password = 'titohossam2010';
        $mail->Port = 587;
        $mail->setFrom('hossameldein63@gmail.com', 'Curse Conquer');
        $mail->addAddress($email);
        $mail->Subject = 'Active Email Address';
        $mail->Body    = "Your code : $code";
        if($mail->send()){
        echo json_encode(array(
            "done" => true,
            "message" => "check your mail"
        ));    
    }
    }
    else{
        echo json_encode(array(
            "error" => true,
            "message" => $errors
        ));
    }
}
?>