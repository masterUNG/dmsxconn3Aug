<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
require_once('db.conf.php');
$link = mysqli_connect($db_config['host'], $db_config['user'], $db_config['pass'], $db_config['dbname']);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}

if (!$link->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $link->error);
    exit();
	}


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
			
		$id = $_GET['user_id'];		
		$userEmail = $_GET['user_email'];
		$userPhone = $_GET['user_phone'];
		$userAddress = $_GET['user_adress'];
		$userBankName = $_GET['user_bank_name'];
		$userBankNumber = $_GET['user_bank_number'];
		$userImg = $_GET['user_img'];
		
							
		$sql = "UPDATE `tb_user` SET `user_email` = '$userEmail', `user_phone` = '$userPhone', `user_adress` = '$userAddress', `user_bank_name` = '$userBankName', `user_bank_number` = '$userBankNumber', `user_img` = '$userImg' WHERE user_id = '$id'";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome Sino";
   
}

	mysqli_close($link);
?>