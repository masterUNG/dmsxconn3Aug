<?php
header("content-type:text/javascript;charset=utf-8");
date_default_timezone_set("Asia/Bangkok");
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
				
		$userId = $_GET['user_id'];


		$result = mysqli_query($link, "SELECT *, date(timestamp) as import_date  FROM tb_work_import_dmsx_data WHERE `user_id` = $userId and date(timestamp) = curdate() ");

		if ($result) {

			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;

			}	// while

			echo json_encode($output);

		} //if

	} else echo "Welcome Sino";	

	// if2
   
   
}	// if1


	mysqli_close($link);
?>