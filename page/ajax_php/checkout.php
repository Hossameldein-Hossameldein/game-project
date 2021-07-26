<?php
include '../../config/config.php';
session_start();
if (isset($_POST['type']) == 'checkout' && !empty($_POST['points'])) {
    $points = filter_var($_POST['points'], FILTER_SANITIZE_STRING);
    if($points > 0){
        $_SESSION['total'] = $points;
        echo json_encode(array(
            "done" => true,
            "message" => "Pay Now"
        ));
    }
    else {
        echo json_encode(array(
            "error" => true,
            "message" => "Please Enter yourpoint"
        ));
    }
}
