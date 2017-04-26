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
	$query = "SELECT * FROM University WHERE uid = ".$key;
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$uname = $row['uname'];
	$city = $row['city'];
	$state = $row['state'];
	$population = $row['population'];
	$rank = $row['rank'];
	$tuition = $row['tuition'];
	mysql_close($con);
?>

<html>
<head>
<meta charset= 'utf-8'>
<title> Welcome to schoolHunter</title>
</head>
<body>

<form action='admin_form_update.php' method='POST' enctype='multipart/form-data' >
        <div class="col-md-4">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Update Records</div>
                <!-- Table -->
                <table class="table">
                    <tr>
                    	<td><label><b>Item Key_ Number:</b></label></td>
                    	<td><?=$key?></td>
                
                    <tr>
                        <td><label><b>University Name: </b></label></td>
    			        <td><input type="text" value="<?php echo $uname;?>" name="uname" required></td>
                    </tr>

                    <tr>
                        <td><label><b>City: </b></label></td>
                        <td><input type="text" value="<?php echo $city;?>" name="city" required></td>
                    </tr>

                    <tr>
                        <td>    <label><b>State: </b></label></td>
                        <td> <input type="text" value="<?php echo $state;?>" name="state" required></td>
                    </tr>


                    <tr>
                        <td><label><b>Rank: </b></label></td>
                        <td><input type="text" value="<?php echo $rank;?>" name="rank" required></td>
                    </tr>

                    <tr>
                        <td><label><b>Tuition: </b></label></td>
                        <td><input type="text" value="<?php echo $tuition;?>" name="tuition" required></td>
                    </tr>
                    <tr>
                        <td><label><b>Total_Enroll: </b></label></td>
                        <td><input type="text" value="<?php echo $population;?>" name="population" required></td>
                    </tr>
			<input type="hidden" name="uid" value="<?php echo $key;?>">
                    <tr>
                    <td><center><button type="submit" style="width:auto;">update University</button></center></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>

</body>
