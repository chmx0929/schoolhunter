<h2 class="major">User</h2>
<?php

if (!empty($_POST['school1'])) {

    $username = $_COOKIE['username'];
    $school1 = $_POST['school1'];
    $school2 = $_POST['school2'];
    $school3 = $_POST['school3'];
    $school4 = $_POST['school4'];
    $school5 = $_POST['school5'];
    $school6 = $_POST['school6'];
    $school7 = $_POST['school7'];
    $school8 = $_POST['school8'];
    $con = mysql_connect("","schoolhunter_admin","admin123");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db('schoolhunter_DataBase', $con);

    if (!$db_selected) {
        die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
    }
    $query = "UPDATE Users SET school1 = ".$school1." WHERE username = '".$username."'";
    $result = mysql_query($query, $con);
    $query = "UPDATE Users SET school2 = ".$school2." WHERE username = '".$username."'";
    $result = mysql_query($query, $con);
    $query = "UPDATE Users SET school3 = ".$school3." WHERE username = '".$username."'";
    $result = mysql_query($query, $con);
    $query = "UPDATE Users SET school4 = ".$school4." WHERE username = '".$username."'";
    $result = mysql_query($query, $con);
    $query = "UPDATE Users SET school5 = ".$school5." WHERE username = '".$username."'";
    $result = mysql_query($query, $con);
    $query = "UPDATE Users SET school6 = ".$school6." WHERE username = '".$username."'";
    $result = mysql_query($query, $con);
    $query = "UPDATE Users SET school7 = ".$school7." WHERE username = '".$username."'";
    $result = mysql_query($query, $con);
    $query = "UPDATE Users SET school8 = ".$school8." WHERE username = '".$username."'";
    $result = mysql_query($query, $con);
    
    $query = "SELECT uname FROM University Where uid = (SELECT school1 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row1 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school2 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row2 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school3 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row3 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school4 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row4 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school5 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row5 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school6 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row6 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school7 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row7 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school8 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row8 = mysql_fetch_assoc($result);
    
    echo "<div style='text-align:center;'>";
    echo "<font size = '6'>List of schools you already selected:</font><br/>";
    echo $row1['uname'],"<br/>", $row2['uname'],"<br/>", $row3['uname'],"<br/>", $row4['uname'],"<br/>", $row5['uname'],"<br/>", $row6['uname'],"<br/>", $row7['uname'],"<br/>", $row8['uname'];
    echo "</div>";
    mysql_close($con);
}else{
    $con = mysql_connect("","schoolhunter_admin","admin123");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db('schoolhunter_DataBase', $con);

    if (!$db_selected) {
        die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
    }
    $query = "SELECT uname FROM University Where uid = (SELECT school1 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row1 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school2 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row2 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school3 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row3 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school4 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row4 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school5 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row5 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school6 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row6 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school7 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row7 = mysql_fetch_assoc($result);
        
    $query = "SELECT uname FROM University Where uid = (SELECT school8 FROM Users WHERE username = '".$_COOKIE["username"]."')";
    $result = mysql_query($query);
    $row8 = mysql_fetch_assoc($result);
    
    echo "<div style='text-align:center;'>";
    echo "<font size = '6'>List of schools you already selected:</font><br/>";
    echo $row1['uname'],"<br/>", $row2['uname'],"<br/>", $row3['uname'],"<br/>", $row4['uname'],"<br/>", $row5['uname'],"<br/>", $row6['uname'],"<br/>", $row7['uname'],"<br/>", $row8['uname'];
    echo "</div>";
    mysql_close($con);
}

?>
<html>
</body>
</html> 
<div id = "after" class="searchbar">
  <form action='' method='POST' enctype='multipart/form-data' >
        <div style="text-align:center;">   
          <div>
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

$query = "SELECT uid, uname FROM University";
$result = mysql_query($query);

$query1 = "SELECT uname, uid FROM University Where uid = (SELECT school1 FROM Users WHERE username = '".$_COOKIE["username"]."')";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_assoc($result1);

$query2 = "SELECT uname, uid FROM University Where uid = (SELECT school2 FROM Users WHERE username = '".$_COOKIE["username"]."')";
$result2 = mysql_query($query2);
$row2 = mysql_fetch_assoc($result2);
        
$query3 = "SELECT uname, uid FROM University Where uid = (SELECT school3 FROM Users WHERE username = '".$_COOKIE["username"]."')";
$result3 = mysql_query($query3);
$row3 = mysql_fetch_assoc($result3);
        
$query4 = "SELECT uname, uid FROM University Where uid = (SELECT school4 FROM Users WHERE username = '".$_COOKIE["username"]."')";
$result4 = mysql_query($query4);
$row4 = mysql_fetch_assoc($result4);
        
$query5 = "SELECT uname, uid FROM University Where uid = (SELECT school5 FROM Users WHERE username = '".$_COOKIE["username"]."')";
$result5 = mysql_query($query5);
$row5 = mysql_fetch_assoc($result5);
        
$query6 = "SELECT uname, uid FROM University Where uid = (SELECT school6 FROM Users WHERE username = '".$_COOKIE["username"]."')";
$result6 = mysql_query($query6);
$row6 = mysql_fetch_assoc($result6);
        
$query7 = "SELECT uname, uid FROM University Where uid = (SELECT school7 FROM Users WHERE username = '".$_COOKIE["username"]."')";
$result7 = mysql_query($query7);
$row7 = mysql_fetch_assoc($result7);
        
$query8 = "SELECT uname, uid FROM University Where uid = (SELECT school8 FROM Users WHERE username = '".$_COOKIE["username"]."')";
$result8 = mysql_query($query8);
$row8 = mysql_fetch_assoc($result8);
$default = '0';
?>
            <select name="school1" style="width:220pt;">
                <?php $result = mysql_query($query);?>
                <option value="<?php echo $row1['uid'];?>"><?php echo $row1['uname'];?></option>
                <<option value = 0>---NOT APPLICABLE---</option>
                <?php while($row = mysql_fetch_array($result)):; ?>
                <option value="<?php echo $row['uid'];?>"><?php echo $row['uname'];?></option>
                <?php endwhile; ?>
            </select>
          </div>
          <div>
            <select name="school2" style="width:220pt;">
                <?php $result = mysql_query($query);?>
                <!--<option value ="0" selected = "selected" >Null</option>-->
                <option value="<?php echo $row2['uid'];?>"><?php echo $row2['uname'];?></option>
                <<option value = "0">---NOT APPLICABLE---</option>
                <?php while($row = mysql_fetch_array($result)):; ?>
                <option value="<?php echo $row['uid'];?>"><?php echo $row['uname'];?></option>
                <?php endwhile; ?>
            </select>
            </div>
            <div>
            <select name="school3" style="width:220pt;">
                <?php $result = mysql_query($query);?>
                <!--<option value ="0" selected = "selected">Null</option>-->
                <option selected="selected" value="<?php echo $row3['uid'];?>"><?php echo $row3['uname'];?></option>
                <<option value = "0">---NOT APPLICABLE---</option>
                <?php while($row = mysql_fetch_array($result)):; ?>
                <option value="<?php echo $row['uid'];?>"><?php echo $row['uname'];?></option>
                <?php endwhile; ?>
            </select>
            </div>
            <div>
            <select name="school4" style="width:220pt;">
                <?php $result = mysql_query($query);?>
                <!--<option value ="0" selected = "selected">Null</option>-->
                <option selected="selected" value="<?php echo $row4['uid'];?>"><?php echo $row4['uname'];?></option>
                <<option value = "0">---NOT APPLICABLE---</option>
                <?php while($row = mysql_fetch_array($result)):; ?>
                <option value="<?php echo $row['uid'];?>"><?php echo $row['uname'];?></option>
                <?php endwhile; ?>
            </select>
            </div>
            <div>
            <select name="school5" style="width:220pt;">
                <?php $result = mysql_query($query);?>
                <!--<option value ="0" selected = "selected">Null</option>-->
                <option selected="selected" value="<?php echo $row5['uid'];?>"><?php echo $row5['uname'];?></option>
                <<option value = "0">---NOT APPLICABLE---</option>
                <?php while($row = mysql_fetch_array($result)):; ?>
                <option value="<?php echo $row['uid'];?>"><?php echo $row['uname'];?></option>
                <?php endwhile; ?>
            </select>
            </div>
            <div>
            <select name="school6" style="width:220pt;">
                <?php $result = mysql_query($query);?>
                <!--<option value ="0" selected = "selected">Null</option>-->
                <option selected="selected" value="<?php echo $row6['uid'];?>"><?php echo $row6['uname'];?></option>
                <<option value = "0">---NOT APPLICABLE---</option>
                <?php while($row = mysql_fetch_array($result)):; ?>
                <option value="<?php echo $row['uid'];?>"><?php echo $row['uname'];?></option>
                <?php endwhile; ?>
            </select>
            </div>
            <div>
            <select name="school7" style="width:220pt;">
                <?php $result = mysql_query($query);?>
                <!--<option value ="0" selected = "selected">Null</option>-->
                <option selected="selected" value="<?php echo $row7['uid'];?>"><?php echo $row7['uname'];?></option>
                <<option value = "0">---NOT APPLICABLE---</option>
                <?php while($row = mysql_fetch_array($result)):; ?>
                <option value="<?php echo $row['uid'];?>"><?php echo $row['uname'];?></option>
                <?php endwhile; ?>
            </select>
            </div>
            <div>
            <select name="school8" style="width:220pt;">
                <?php $result = mysql_query($query);?>
                <!--<option value ="0" selected = "selected">Null</option>-->
                <option selected="selected" value="<?php echo $row8['uid'];?>"><?php echo $row8['uname'];?></option>
                <<option value = "0">---NOT APPLICABLE---</option>
                <?php while($row = mysql_fetch_array($result)):; ?>
                <option value="<?php echo $row['uid'];?>"><?php echo $row['uname'];?></option>
                <?php endwhile; ?>
            </select>
            </div>
            
          <button type="submit" class="btn btn-primary btn-lg">update</button>
        </div>
  </form>
</div>
</html>