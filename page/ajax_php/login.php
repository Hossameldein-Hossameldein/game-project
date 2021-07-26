<?php
include '../../config/config.php';
session_start();
if (isset($_POST['type']) == 'login' && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $checkUser = mysqli_query($db1 , "SELECT * FROM accounts WHERE Username = '$username' AND Password = '$password'");
    $num = mysqli_num_rows($checkUser);
    if($num > 0){
        $_SESSION['acc'] = $username;
        echo json_encode(array(
            "done" => true,
            "message" => "Register Success"
        ));
    }
    else {
        echo json_encode(array(
            "error" => true,
            "message" => "Username Or Password Wrong!"
        ));
    }
}
