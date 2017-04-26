<?php
if(!empty($_POST)){
extract($_POST);
if($_POST['act'] == 'add-com'):
	  //$name = htmlentities($name);
	  $name = $_COOKIE['username'];
     //$comment = $affcom['rtext'];
      // $date = htmlentities($date);
        $comment = htmlentities($comment);
        //$id=$_GET['id'];
        
	$con = mysql_connect("","schoolhunter_admin","admin123");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db('schoolhunter_DataBase', $con);

    if (!$db_selected) {
        die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
    }
	//DB::debugMode();
	// Get gravatar Image 
	// https://fr.gravatar.com/site/implement/images/php/
	$default = "mm";
	$size = 35;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $name) ) ) . "?d=" . $default . "&s=" . $size;
mysql_query("INSERT INTO comments (name, email, comment, id_post)VALUES( '$name', '$email', '$comment', '$id_post')");
    //insert the comment in the database
    mysql_query("INSERT INTO Reviews (rusername, rtext, ruid)VALUES( '$name', '$comment', '$id_post')");
	//$insert=DB::insert('comments', array(  'name' => $name,  'email' => $email,  'rating' => $rating, 'comment' => $comment,  'id_post' => $id_post));
    mysql_close($con);
    if(!mysql_errno()){
?>

    <div class="cmt-cnt">
    	<img src="<?php echo $grav_url; ?>" alt="" />
		<div class="thecom">
	        <h5><?php echo $name; ?></h5>
			<span  class="com-dt"><?php echo date('d-m-Y H:i'); ?></span>
	        <br/>
	       	<p><?php echo $comment; ?></p>
	    </div>
	</div><!-- end "cmt-cnt" -->

	<?php } ?>
<?php endif; ?>
<?php } ?>