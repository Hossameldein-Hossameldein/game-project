<?php 
$redirectStr = ''; 
include '../../config/infos.php';
if(!empty($_GET['paymentID']) && !empty($_GET['token']) && !empty($_GET['payerID'])){ 
    // Include and initialize database class 
    include_once 'DB.class.php'; 
    $db = new DB; 
 
    // Include and initialize paypal class 
    include_once 'PaypalExpress.class.php'; 
    $paypal = new PaypalExpress; 
     
    // Get payment info from URL 
    $paymentID = $_GET['paymentID']; 
    $token = $_GET['token']; 
    $payerID = $_GET['payerID']; 
     
    // Validate transaction via PayPal API 
    $paymentCheck = $paypal->validate($paymentID, $token, $payerID); 
     
    // If the payment is valid and approved 
    if($paymentCheck && $paymentCheck->state == 'approved'){ 
 
        // Get the transaction data 
        $id = $paymentCheck->id; 
        $state = $paymentCheck->state; 
        $payerFirstName = $paymentCheck->payer->payer_info->first_name; 
        $payerLastName = $paymentCheck->payer->payer_info->last_name; 
        $payerName = $payerFirstName.' '.$payerLastName; 
        $payerEmail = $paymentCheck->payer->payer_info->email; 
        $payerID = $paymentCheck->payer->payer_info->payer_id; 
        $payerCountryCode = $paymentCheck->payer->payer_info->country_code; 
        $paidAmount = $paymentCheck->transactions[0]->amount->details->subtotal; 
        $currency = $paymentCheck->transactions[0]->amount->currency; 
        $accc=$_SESSION['acc'];
        $getdata = mysqli_query($db1,"SELECT *FROM accounts WHERE Username='$accc'");
        $data = mysqli_fetch_assoc($getdata);
            $filename = ''.$filedata.'/'.$data['ID'].'.ini';
            if ((file_exists($filename)))
            {
                $player = parse_ini_file($filename);
                $uid = $player["UID"];
        
            }
      
         
        // If payment price is valid 
        if($paidAmount >= $_SESSION['total']){ 
             
            // Insert transaction data in the database 
            $data = array( 
                'txn_id' => $id, 
				'playerid' => $uid,
                'payment_gross' => $paidAmount, 
                'currency_code' => $currency, 
                'payer_id' => $payerID, 
                'payer_name' => $payerName, 
                'payer_email' => $payerEmail, 
                'payer_country' => $payerCountryCode, 
                'payment_status' => $state 
            ); 
            $insert = $db->insert('payments', $data); 
            $getplayer = mysqli_query($db1,"SELECT * FROM playerbuy WHERE playerid=$uid");
            $countrows = mysqli_num_rows($getplayer);
            $curse = $_SESSION['total'];
            if($countrows > 0){
                $getcurse = mysqli_fetch_assoc($getplayer);
                $totalcurse = $getcurse['cursepoints'] + $curse;
                mysqli_query($db1,"UPDATE playerbuy SET cursepoints = $totalcurse WHERE playerid=$uid");
            }
            else{
                $insert = mysqli_query($db1, "INSERT INTO playerbuy (cursepoints ,playerid) Values($curse, $uid)");
            }
        } 

    } 
     
    // Redirect to payment status page 
    unset($_SESSION['total']);
    header("Location:../../invoice"); 
}else{ 
    // Redirect to the home page 
    echo "<script>alert('Error in Payment Please try again later')</script>";
} 
?>