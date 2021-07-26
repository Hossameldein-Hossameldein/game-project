<?php
include '../../config/config.php';
session_start();
if (isset($_POST['type']) == 'forget' && !empty($_POST['oldpass']) && !empty($_POST['newpass']) && !empty($_POST['confirmpass'])) {
    $oldpass = filter_var($_POST['oldpass'], FILTER_SANITIZE_STRING);
    $newpass = filter_var($_POST['newpass'], FILTER_SANITIZE_STRING);
    $confirmpass = filter_var($_POST['confirmpass'], FILTER_SANITIZE_STRING);
    $user= $_SESSION['acc'];
    $errors=[];
    if($newpass != $confirmpass){
        array_push($errors , "New password not equal Confirm password");
    }
    $checkUser = mysqli_query($db1 , "SELECT * FROM accounts WHERE Username = '$user' AND Password = '$oldpass'");
    $num = mysqli_num_rows($checkUser);
    if(empty($errors) && $num > 0){
        $update_pass = mysqli_query($db1 , "UPDATE accounts SET Password = '$newpass' WHERE Username = '$user' AND Password = '$oldpass'");
        if($update_pass){
            echo json_encode(array(
                "done" => true,
                "message" => "Passowrd Update Success"
            ));
        }
    }
    else {
        array_push($errors , "Your old password Wrong");
        echo json_encode(array(
            "error" => true,
            "message" => $errors
        ));
    }
}
