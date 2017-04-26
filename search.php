<h2 class="major">Schools</h2>
<div class="searchbar">
  <form action='' method='POST' enctype='multipart/form-data' >
          <div>
            <select name="tuition">
              <option selected value="0">--tuition--</option>
              <option value="1">below $15,000</option>
              <option value="2">$15,001-$20,000</option>
              <option value="3">$20,001-$30,000</option>
              <option value="4">$30,001-$40,000</option>
              <option value="5">above $40,000</option>
            </select>
            </div>
<div>
            <select name="rank">
              <option selected value="0">--rank--</option>
              <option value="1">top 10</option>
              <option value="2">11-30</option>
              <option value="3">31-50</option>
              <option value="4">51-70</option>
              <option value="5">71-100</option>
            </select>
            </div>
<div>
            <select name="region">
              <option selected value="1">--region--</option>
              <option value="'WEST'">WEST</option>
              <option value="'MIDWEST'">MIDWEST</option>
              <option value="'SOUTH'">SOUTH</option>
              <option value="'NORTHEAST'">NORTHEAST</option>
            </select>
          </div>
          <button type="submit" class="special">Find Now</button>
       
  </form>
</div>
<div>
<?php
if (isset($_POST['tuition'])||isset($_POST['rank'])||isset($_POST['region'])) {
	$tuition = $_POST['tuition'];
	$rank = $_POST['rank'];
	$region = $_POST['region'];
	$con = mysql_connect("","schoolhunter_admin","admin123");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db('schoolhunter_DataBase', $con);
	if (!$db_selected) {
		die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
	}
	switch ($tuition)
	{
	case 1:
  		$fee = "tuition < '15000'";
  		break;
	case 2:
  		$fee = "tuition < '20000' AND tuition > '15000' ";
  		break;
	case 3:
  		$fee = "tuition < '30000' AND tuition > '20000' ";
  		break;
  	case 4:
  		$fee = "tuition < '40000' AND tuition > '30000' ";
  		break;
  	case 5:
  		$fee = "tuition > '40000'";
  		break;
	default:
  		$fee = "tuition > '-1'";
	}
	switch ($rank)
	{
	case 1:
  		$r = "rank < '10'";
  		break;
	case 2:
  		$r = "rank < '30' AND rank > '10' ";
  		break;
	case 3:
  		$r = "rank < '50' AND rank > '30' ";
  		break;
  	case 4:
  		$r = "rank < '70' AND rank > '50' ";
  		break;
  	case 5:
  		$r = "rank > '70'";
  		break;
	default:
  		$r = "rank > '-1'";
	}
	if($region == 1){
		$query = "SELECT * FROM University WHERE ".$fee." AND ".$r." ORDER BY rank";
	}else{
		$query = "SELECT * FROM University WHERE ".$fee." AND ".$r." AND state IN (SELECT state FROM Region WHERE region =".$region.")";
	}
	$result = mysql_query($query,$con);
	mysql_close($con);
	echo "<table style = 'width:100%'>";
	echo "<tr>";
	echo "<th>Rank</th>";
	echo "<th>University</th>";
	echo "<th>Tuition</th>"; 
	echo "<th>location</th>";
	echo "</tr>";
}
?>

<?php while($row  = mysql_fetch_array($result)):; ?>
	<tr>
		<td><?=$row['rank'];?></td>
		<td><a href = "<?=$row['link'];?> "><?=$row['uname'];?></a></td>
		<td><?=$row['tuition'];?></td>
		<td><?=$row['state'];?></td>
		<tr>

<?php 
print("<script type=\"text/javascript\">");
print("console.log('".$row['rank']."')");
print("</script>");
endwhile; ?>
</table>
</div>

