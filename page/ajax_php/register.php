<?php
include '../../config/config.php';
session_start();
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['rpassword']) && !empty($_POST['captcha']) && !empty($_POST['email']) && !empty($_POST['confirmcode'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $rpassword = filter_var($_POST['rpassword'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $captcha = filter_var($_POST['captcha'], FILTER_SANITIZE_STRING);
    $confirmcode = filter_var($_POST['confirmcode'], FILTER_SANITIZE_STRING);
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfeLJgbAAAAAKBuCwaemUAkDq6tGr3AS8GunnV1&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $g_response = json_decode($response);
    $errors = [];
    $checkUser = mysqli_query($db1 , "SELECT * FROM accounts WHERE Username = '$username'");
    $num = mysqli_num_rows($checkUser);
    if($num > 0){
        array_push($errors, 'Username already exists');
    }
    if(!$g_response->success){
        array_push($errors, 'Captcha Code Wrong');
    }
    if ($password != $rpassword) {
        array_push($errors, 'Password fields are not the same');
    }
    if($confirmcode != $_SESSION['sendcode'] or $_SESSION['sendcode'] == ''){
        array_push($errors, 'Wrong in Email code');
    }
    if (empty($errors)) {
        $q_insert = "INSERT INTO accounts (Username,`Password`,Email) Values('$username','$password','$email')";
        $insert = mysqli_query($db1, $q_insert);
        if ($insert) {
            echo json_encode(array(
                "done" => true,
                "message" => "Register Success"
            ));
        }
    } else {
        echo json_encode(array(
            "error" => true,
            "message" => $errors
        ));
    }
}
