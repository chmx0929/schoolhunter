<?php
	$uname = $_POST['uname'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$Total_enroll = $_POST['Total_enroll'];
	$rank = $_POST['rank'];
	$tuition = $_POST['tuition'];
	$link = $_POST['link'];
	$con = mysql_connect("","schoolhunter_admin","admin123");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	// make schoolhunter_DataBase as the current db
	$db_selected = mysql_select_db('schoolhunter_DataBase', $con);
	if (!$db_selected) {
		die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
	}
	mysql_query("INSERT INTO University (uname, city, state, population, rank, tuition, link) VALUES ('".$uname."', '".$city."', '".$state."', '".$Total_enroll."', '".$rank."', '".$tuition."', '".$link."')");
	
	mysql_close($con);
	header( 'Location: Admin.php' ) ;
?>