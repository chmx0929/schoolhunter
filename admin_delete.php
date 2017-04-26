<?php
$con = mysql_connect("","schoolhunter_admin","admin123");

/* check connection */
if (!$con) {
    die('Could not connect: ' .mysql_error());
}

$db_selected = mysql_select_db("schoolhunter_DataBase", $con);

if(!$db_selected){
	die('Can\'t use schoolhunter_DataBase: ' .mysql_error());
}

$query = "SELECT * FROM University";
$result = mysql_query($query);

echo "<table style = 'width:100%'>";
	echo "<tr>";
	echo "<th>Rank</th>";
	echo "<th>University</th>";
	echo "<th>City</th>";
	echo "<th>State</th>";
	echo "<th>Total_Enroll</th>"; 
	echo "<th>Tuition</th>";
	echo "</tr>";
while($row = mysql_fetch_array($result)){ 
echo "</td><td>" . $row['rank'] . "</td><td>" . $row['uname'] . "</td><td>" . $row['city'] ."</td><td>" . $row['state'] . "</td><td>" . $row['population'] . "</td><td>" . $row['tuition'] . "</td></tr>";
}

echo "</table>";


?>

<html>
<head>
    <title>Admin_delete Page</title>
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
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="main.php">Home</a></li>
                <li class="active"><a href="/Admin.php">Admin</a></li>
                
            </ul>
        </div><!--/.nav-collapse -->
</nav>

<form action="admin_delete_lol.php", method='POST'> 
<?php $query = "SELECT * FROM University";?>
<?php $result = mysql_query($query);?>
<select name = "uid">
    <?php while($row = mysql_fetch_array($result)):; ?>
    <option value="<?php echo $row['uid'];?>"><?php echo $row['uname'];?></option>
    <?php endwhile; ?>
</select>
<button type="submit" class="btn btn-danger" onclick = "window.location = 'admin_delete_lol.php'"> Delete </button>	
</form>


</body>
</html>