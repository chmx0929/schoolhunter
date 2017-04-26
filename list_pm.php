<html>
<head>
    <title>Admin Page</title>
    <meta charset= 'utf-8'>
    <title> Welcome to schoolHunter</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="user.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="main.php">School Hunter</a>
            <a class="navbar-brand"><?php echo $_COOKIE['username'];?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="list_pm.php">Message Home</a></li>
                
            </ul>
        </div><!--/.nav-collapse -->
</nav>
<?php
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Personnal Messages</title>
    </head>
    <body>
        <!--
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Members Area" /></a>
	    </div>
	    -->
        <div class="content">
<?php
//We check if the user is logged
if(isset($_COOKIE['username']))
{
	$con = mysql_connect("","schoolhunter_admin","admin123");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db('schoolhunter_DataBase', $con);

    if (!$db_selected) {
        die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
    }
//We list his messages in a table
//Two queries are executes, one for the unread messages and another for read messages
//$req1 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, Users.username as userid from pm as m1, pm as m2,Users where ((m1.user1="'.$_COOKIE['userid'].'" and m1.user1read="no" and users.id=m1.user2) or (m1.user2="'.$_COOKIE['userid'].'" and m1.user2read="no" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$req2 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, Users.username from pm as m1, pm as m2,Users where ((m1.user1="'.$_COOKIE['username'].'" and m1.user1read="yes" and users.id=m1.user2) or (m1.user2="'.$_COOKIE['username'].'" and m1.user2read="yes" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$test = mysql_query('select id, title, timestamp, user1 from pm where user2="'.$_COOKIE['username'].'" and user2read="no"');
$test2 = mysql_query('select id, title, timestamp, user1 from pm where user2="'.$_COOKIE['username'].'" and user2read="yes"');
//$row  = mysql_fetch_array($test);
//echo intval(mysql_num_rows($test));

?>
<h3>This is the list of your messages:</h3><br />
<a href="new_pm.php" class="link_new_pm">New Message</a><br />
<h3>Unread Messages(<?php echo intval(mysql_num_rows($test)); ?>):</h3>
<table>
	<tr>
    	<th class="title_cell">Title </th>
        <th>Participant </th>
        <th>Date_of_Creation</th>
    </tr>
<?php
//We display the list of unread messages
while($dn1 = mysql_fetch_array($test))
{
?>
	<tr>
    	<td class="left"><a href="read_pm.php?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo $dn1['user1']; ?></td>
    	<td><?php echo $dn1['timestamp']; ?></td>
    </tr>
<?php
}
//If there is no unread message we notice it
if(intval(mysql_num_rows($test))==0)
{
?>
	<tr>
    	<td colspan="4" class="center">You have no unread message.</td>
    </tr>
<?php
}
?>
</table>
<br />
<h3>Read Messages(<?php echo intval(mysql_num_rows($test2)); ?>):</h3>
<table>
	<tr>
    	<th class="title_cell">Title</th>
        <th>Participant</th>
        <th>Date_of_creation</th>
    </tr>
<?php
//We display the list of read messages
while($dn2 = mysql_fetch_array($test2))
{
?>
	<tr>
    	<td class="left"><a href="read_pm.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo $dn2['user1']; ?></td>
    	<td><?php echo $dn2['timestamp']; ?></td>
    </tr>
<?php
}
//If there is no read message we notice it
if(intval(mysql_num_rows($test2))==0)
{
?>
	<tr>
    	<td colspan="4" class="center">You have no read message.</td>
    </tr>
<?php
}
?>
</table>
<?php
}
else
{
	echo 'You must be logged to access this page.';
}
?>
		</div>
		<!--<div class="foot"><a href="<?php echo $url_home; ?>">Go Home</a> - <a href="http://www.webestools.com/">Webestools</a></div>-->
	</body>
</html>