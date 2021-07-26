<?php
error_reporting(0);
// file_players
$filedata = 'C:\Users\Hossameldein\Downloads\Database\Database\Users';
session_start();
if(isset($_SESSION['acc'])){
$acc=$_SESSION['acc'];
$getdata = mysqli_query($db1,"SELECT *FROM accounts WHERE Username='$acc'");
$data = mysqli_fetch_assoc($getdata);
	$filename = ''.$filedata.'/'.$data['ID'].'.ini';
	if ((file_exists($filename)))
	{
		$player = parse_ini_file($filename);
		$uid = $player["UID"];
        $namePlayer = $player['Name'];

	}
	else{
		$namePlayer = $data['Username'];
	}
// Select Invoices
$getinvoice = mysqli_query($db1,"SELECT *FROM payments WHERE playerid=$uid");
$getrows = mysqli_num_rows($getinvoice);

}
// Select count accounts
$s_acc = mysqli_query($db1,"SELECT * FROM accounts");
$c_acc = $s_acc ? mysqli_num_rows($s_acc) : 0;
// Select online 
$s_online = mysqli_query($db1,"SELECT * FROM playersonline");
$c_online = $s_online ? mysqli_fetch_assoc($s_online)['Online'] : 1;
// Select Ranks
$donation_rank = [];
$files = glob("$filedata/*.ini");
foreach($files as $ini){
	$rank = parse_ini_file($ini);
	$donation_rank[] = array($rank['DonationNobility'],$rank['Name']);
}
usort($donation_rank , function ($item1, $item2) {
    if ($item1[0] == $item2[0]) return 1;
    return $item1[0] > $item2[0] ? -1 : 1;
});


?>
