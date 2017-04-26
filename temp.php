<html>
<h2 class="major">Recommendations</h2>

<form action='' method='POST' enctype='multipart/form-data'>
<div>
	<select name = "school">
		<option value="5">University of Illinois Urbana Champaign</option><option value="6">Cornell University</option><option value="7">University of Washington</option><option value="8">Princeton University</option><option value="9">Georgia Institute of Technology/option><option value="10">University of Texas Austin</option><option value="11">California Institute of Technology</option><option value="12">University of Wisconsin Madison</option><option value="13">University of California Los Angeles</option><option value="14">University of Michigan Ann Arbor</option><option value="15">Columbia University</option><option value="16">University of California San Diego</option><option value="17">University of Maryland College Park</option><option value="18">Harvard University</option><option value="19">University of Pennsylvania</option><option value="20">Brown University</option><option value="21">Purdue University West Lafayette</option><option value="22">Rice University</option><option value="23">University of Southern California</option><option value="24">Yale University</option><option value="25">Duke University</option><option value="26">University of Massachusetts Amherst </option><option value="27">University of North Carolina Chapel Hill</option><option value="28">Johns Hopkins University</option><option value="29">New York University  (Computer Science Department)</option><option value="30">Pennsylvania State University University Park </option><option value="32">University of Minnesota Twin Cities </option><option value="33">University of Virginia </option><option value="34">Northwestern University</option>
	</select>
	<button type="submit" class="special">Recommend Now</button>
</div>
</form>
</html>
<?php
if(!empty($_POST)){
	$school = $_POST['school'];
	$con = mysql_connect("","schoolhunter_admin","admin123");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db('schoolhunter_DataBase', $con);
	if (!$db_selected) {
		die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
	}
	$query = "SELECT school1,school2,school3, school4, school5, school6, school7, school8 FROM Users";
	$result = mysql_query($query, $con);
	
	while($row = mysql_fetch_array($result)){
		$rows[] = $row;
	}
	
	$list = json_encode($rows);
	//$row = mysql_fetch_array($result);
	//print_r($row);
	
	//$param1 = "1";
	//$param2 = "2";
	$output = json_decode (shell_exec("2>&1 python /home/schoolhunter/public_html/1.py '$school' '$list'"), true);
	foreach($output as $item){
		$temp = (int)$item;
		$school_query = "SELECT uname FROM University WHERE uid = '".$temp."'";
		$school_result = mysql_query($school_query, $con);
		while ($row = mysql_fetch_assoc($school_result)){
			echo $row['uname'];
			echo "<br>";
		}
	}
	mysql_close($con);	
}
?>
