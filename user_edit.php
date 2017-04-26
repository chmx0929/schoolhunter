<?php
    $email = $_COOKIE["Email"];
    $con = mysql_connect("","schoolhunter_admin","admin123");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db('schoolhunter_DataBase', $con);

    if (!$db_selected) {
        die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
    }


    $query = sprintf("SELECT `Password`, `Gender`, `GRE_V`, `GRE_Q`, `GRE_AW`, `GPA`, `TOEFL` FROM Users WHERE Email='%s' LIMIT 1;",
        mysql_real_escape_string($email));
    $result = mysql_query($query, $con);
    $row = mysql_fetch_assoc($result);
    mysql_close($con);
    $password = $row["Password"];
    $gender = $row["Gender"];
    $gre_v = $row["GRE_V"];
    $gre_q = $row["GRE_Q"];
    $gre_aw =$row["GRE_AW"];
    $gpa = $row["GPA"];
    $toefl = $row["TOEFL"];

    function is_male($gender) {
        if ($gender == "M") {
            return "checked";
        } else {
            return "";
        }
    }

    function is_female($gender) {
        if ($gender == "F") {
            return "checked";
        } else {
            return "";
        }
    }
?>

<html>
<head>
<meta charset= 'utf-8'>
<title> Welcome to schoolHunter</title>
</head>
<body>

	<form action="user_form.php" method='POST' enctype='multipart/form-data'>
    <div class="container" align ='center'>
    				<input type="hidden" name="Register" value = "true">
      				<label><b>Email: </b></label>
      				<input type="email" value="<?=$email?>" name="Email" readonly="readonly">
      				<br/>
      				<label><b>Password: </b></label>
      				<input type="password" value="<?=$password?>" name="Password">
        			<br/>
        			<label><b>Gender: </b></label>
        			<input type="radio" name="Gender" value="M" <?=is_male($gender)?>/> Male
				      <input type="radio" name="Gender" value="F" <?=is_female($gender)?>/> Female
        			<br/>
        			<label><b>GRE Verbal: </b></label>
      				<input type="text" value=<?=$gre_v?> name="GRE_V">
      				<br/>
      				<label><b>GRE Quantitative: </b></label>
      				<input type="text" value=<?=$gre_q?> name="GRE_Q">
      				<br/>
      				<label><b>GRE Analytical Writing: </b></label>
      				<input type="text" value=<?=$gre_aw?> name="GRE_AW">
        			<br/>
        			<label><b>GPA: </b></label>
      				<input type="text" value=<?=$gpa?> name="GPA">
        			<br/>
        			<label><b>TOEFL: </b></label>
      				<input type="text" value=<?=$toefl?> name="TOEFL">
      				<br/>
      				<button type="submit"> Update</button>
    </div>
	</form>
