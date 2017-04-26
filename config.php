<?php
//We start sessions
session_start();

/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the members area
can work correctly.
******************************************************/

//We log to the DataBase
$con = mysql_connect("","schoolhunter_admin","admin123");
        if (!$con){
                    die('Could not connect: ' . mysql_error());
        }

        $db_selected = mysql_select_db('schoolhunter_DataBase', $con);

        if (!$db_selected) {
                die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
        }

//Webmaster Email
$mail_webmaster = 'example@example.com';

//Top site root URL
$url_root = 'http://schoolhunter.web.engr.illinois.edu/main.php/';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Home page file name
$url_home = 'main.php';

//Design Name
$design = 'default';
?>