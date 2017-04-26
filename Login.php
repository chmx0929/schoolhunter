<?php
$username = $_POST['username'];
$Password = $_POST['Password'];
$isRegister = $_POST['Register'];
$con = mysql_connect("","schoolhunter_admin","admin123");
if (!$con){
	die('Could not connect: ' . mysql_error());
}
// make schoolhunter_DataBase as the current db
$db_selected = mysql_select_db('schoolhunter_DataBase', $con);
if (!$db_selected) {
	die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
}
// check register or login
if($isRegister){
	$result = mysql_query("SELECT * FROM Users WHERE username ='".$username."'");
	$row = mysql_fetch_array($result);
	if($row){
		echo "Username already registered";
	}else{
		mysql_query("INSERT INTO Users (username, password,school1,school2,school3,school4,school5,school6,school7,school8,isadmin) VALUES ('".$username."', '".$Password."', '0', '0', '0', '0', '0', '0','0','0','0')");
		setcookie("username", $username, time() + 3600);
		header('Location: main.php');
	}
}else{
	$result = mysql_query("SELECT * FROM Users WHERE username ='".$username."'AND Password ='".$Password."'");
	$row = mysql_fetch_array($result);
	if ($row){
		setcookie("username", $username, time() + 3600);
		if($row['isAdmin'] == 1){
			header('Location: Admin.php');
		}else{
		    //if(!isset($_COOKIE['username'])){ 
		        // if browser does not support cookie
			//    header('Location: welcome.php');
		    //} else {
			    header('Location: main.php');
			//}
		}
	}else{
		echo "Wrong username or password";
	}
}
mysql_close($con);
?>
<html>
<head>
<title>
Main Page
</title>
</head>
<body>
</body>
</html>