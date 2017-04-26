<?php
$email = $_COOKIE["Email"];
$password = $_POST["Password"];
$gender = $_POST["Gender"];
$gre_v = (int) $_POST["GRE_V"];
$gre_q = (int) $_POST["GRE_Q"];
$gre_aw = (float) $_POST["GRE_AW"];
$gpa = (float) $_POST["GPA"];
$toefl = (int) $_POST["TOEFL"];

$con = mysql_connect("","schoolhunter_admin","admin123");
if (!$con){
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('schoolhunter_DataBase', $con);

if (!$db_selected) {
    die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
}

$query = sprintf("
    UPDATE Users
    SET Password = '%s',
    Gender = '%s',
    GRE_V = %d,
    GRE_Q = %d,
    GRE_AW = %f,
    GPA = %f,
    TOEFL = %d 
    WHERE Email = '%s';
    ",
    mysql_real_escape_string($password),
    mysql_real_escape_string($gender),
    $gre_v, $gre_q, $gre_aw, $gpa, $toefl, mysql_real_escape_string($email));
mysql_query($query, $con);
mysql_close($con);
header( 'Location: user.php' ) ;

?>