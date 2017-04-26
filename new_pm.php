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
                <li class="active"><a ><?php echo "New Message";?></a></li>
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
        <title>New Message</title>
    </head>
    <body>
    	<!--<div class="header">
        	
	    </div>
	    -->
<?php
//We check if the user is logged
if(isset($_COOKIE['username']))
{
$form = true;
$otitle = '';
$orecip = '';
$omessage = '';
//We check if the form has been sent
if(isset($_POST['title'], $_POST['recip'], $_POST['message']))
{
	$otitle = $_POST['title'];
	$orecip = $_POST['recip'];
	$omessage = $_POST['message'];
	//We remove slashes depending on the configuration
	if(get_magic_quotes_gpc())
	{
		$otitle = stripslashes($otitle);
		$orecip = stripslashes($orecip);
		$omessage = stripslashes($omessage);
	}

	//We check if all the fields are filled
	if($_POST['title']!='' and $_POST['recip']!='' and $_POST['message']!='')
	{
		//We protect the variables
		$title = mysql_real_escape_string($otitle);
		$recip = mysql_real_escape_string($orecip);
		$message = mysql_real_escape_string(nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
		//We check if the recipient exists
		$con = mysql_connect("","schoolhunter_admin","admin123");
        if (!$con){
                    die('Could not connect: ' . mysql_error());
        }

        $db_selected = mysql_select_db('schoolhunter_DataBase', $con);

        if (!$db_selected) {
                die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
        }
		$dn1 = mysql_fetch_array(mysql_query('select count(username) as recip, username as recipid, (SELECT count(*) FROM pm) as npm FROM Users where username="'.$recip.'"'));

		if($dn1['recip']==1)
		{
			//We check if the recipient is not the actual user
			if($dn1['recipid']!=$_COOKIE['username'])
			{
				$id = $dn1['npm']+1;
				//We send the message
				if(mysql_query('insert into pm (id, id2, title, user1, user2, message, user1read, user2read)values("'.$id.'", "1", "'.$title.'", "'.$_COOKIE['username'].'", "'.$dn1['recipid'].'", "'.$message.'", "yes", "no")'))
				
				{
?>
<div class="message">The message has successfully been sent.<br />
<a href="list_pm.php">List of my personnal messages</a></div>
<?php
					$form = false;
				}
				else
				{
					//Otherwise, we say that an error occured
					$error = 'An error occurred while sending the message';
				}
			}
			else
			{
				//Otherwise, we say the user cannot send a message to himself
				$error = 'You cannot send a message to yourself.';
			}
		}
		else
		{
			//Otherwise, we say the recipient does not exists
			$error = 'The recipient does not exists.';
		}
	}
	else
	{
		//Otherwise, we say a field is empty
		$error = 'A field is empty. Please fill of the fields.';
	}
}
elseif(isset($_GET['recip']))
{
	//We get the username for the recipient if available
	$orecip = $_GET['recip'];
}
if($form)
{
//We display a message if necessary
if(isset($error))
{
	echo '<div class="message">'.$error.'</div>';
}
//We display the form
?>
<div class="content">
	<h1>New Personnal Message</h1>
    <form action="new_pm.php" method="post">
		Please fill the following form to send a personnal message.<br />
        <label for="title">Title</label><input type="text" value="<?php echo htmlentities($otitle, ENT_QUOTES, 'UTF-8'); ?>" id="title" name="title" /><br />
        <label for="recip">Recipient<span class="small">(Username)</span></label><input type="text" value="<?php echo htmlentities($orecip, ENT_QUOTES, 'UTF-8'); ?>" id="recip" name="recip" /><br />
        <label for="message">Message</label><textarea cols="40" rows="5" id="message" name="message"><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
<?php
}
}
else
{
	echo '<div class="message">You must be logged to access this page.</div>';
}
?>
		<div class="foot"><a href="list_pm.php">Go to my personnal messages</a> - <a href="http://www.webestools.com/">Webestools</a></div>
	</body>
</html>