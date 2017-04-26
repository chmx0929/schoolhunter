<?php
	$uid = $_POST['uid'];
	$uname = $_POST['uname'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$population = $_POST['population'];
	$rank = $_POST['rank'];
	$tuition = $_POST['tuition'];
	$con = mysql_connect("","schoolhunter_admin","admin123");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	// make schoolhunter_DataBase as the current db
	$db_selected = mysql_select_db('schoolhunter_DataBase', $con);
	if (!$db_selected) {
		die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
	}
	
	mysql_query("UPDATE University SET uname = '".$uname."', city = '".$city."', state = '".$state."', population = '".$population."', rank = '".$rank."', tuition = '".$tuition."' WHERE uid = '".$uid."'",$con);
	
	mysql_close($con);
	header( 'Location: Admin.php' ) ;
?>