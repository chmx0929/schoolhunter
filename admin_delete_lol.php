<?php
	$key = $_POST['uid'];
	$con = mysql_connect("","schoolhunter_admin","admin123");
	if (!$con){
    		die('Could not connect: ' . mysql_error());
	}

	$db_selected = mysql_select_db('schoolhunter_DataBase', $con);
	if (!$db_selected) {
    		die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
	}
	
	$query = "DELETE FROM University WHERE UID = '" .$key."'";
	mysql_query($query, $con);
	mysql_close($con);
	header( 'Location: Admin.php' ) ;
?>

