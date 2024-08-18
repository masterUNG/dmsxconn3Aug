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
				
		$docId = $_GET['docId'];
		$ca = $_GET['ca'];
		$pea_on = $_GET['pea_on'];
		$image_name = $_GET['image_name'];
		$image_date = $_GET['image_date'];
		$user_id = $_GET['user_id'];
		
		
							
		$sql = "INSERT INTO `tb_beforwmmr`(`id`, `docId`, `ca`, `pea_on`, `image_name`, `image_date`, `user_id`) VALUES (Null,'$docId','$ca','$pea_on','$image_name','$image_date','$user_id')";


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