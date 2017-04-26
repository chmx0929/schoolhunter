<?php
$con = mysql_connect("","schoolhunter_admin","admin123");
if (!$con){
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('schoolhunter_DataBase', $con);

if (!$db_selected) {
    die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
}

$query = sprintf("DELETE FROM Users WHERE Email='%s';",
    mysql_real_escape_string($_COOKIE["Email"]));

$result = mysql_query($query, $con);
$row = mysql_fetch_assoc($result);

echo "User removed";
