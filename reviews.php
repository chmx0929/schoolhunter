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
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="main.php">Home</a></li>
                
            </ul>
        </div><!--/.nav-collapse -->
</nav>
<?php
if(!isset($_COOKIE['username']))
{
$message = "Please Log In";
echo "<script type='text/javascript'>alert('$message');</script>";
exit();
//header('Location: main.php');

}
?>
<?php
if(empty($_GET['id']) OR !is_numeric($_GET['id'])) {
	header('Location: main.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<?php	
	$con = mysql_connect("","schoolhunter_admin","admin123");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db('schoolhunter_DataBase', $con);

    if (!$db_selected) {
        die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
    }
	$id=$_GET['id'];
	$query = "SELECT * FROM University WHERE uid = ".$id."";
    $result = mysql_query($query);	
    $row = mysql_fetch_array($result);
    mysql_close($con);
	?>
	<div style='text-align:center;'>
	<div id="tooltip-container"></div>
    <div id="canvas-svg" style = 'width : 100%'></div>
    <h2 class="major"><?php echo $row['uname']?></h2>
    <!--</div>-->
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
        	.row{
		    margin-top:40px;
		    padding: 0 10px;
		}
		.clickable{
		    cursor: pointer;   
		}

		.panel-heading div {
			margin-top: -18px;
			font-size: 15px;
		}
		.panel-heading div span{
			margin-left:5px;
		}
		.panel-body{
			display: none;
		}    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/example.css">
	<link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
	<script src="js/star-rating.js" type="text/javascript"></script>
    
</head>
<body>

<h3>Comments</h3>
		
<?php
$id_post = $id;
?>	 
	<div class="cmt-container" >
	
    <?php 	
    $con = mysql_connect("","schoolhunter_admin","admin123");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db('schoolhunter_DataBase', $con);

    if (!$db_selected) {
        die ('Can\'t use schoolhunter_DataBase : ' . mysql_error());
    }
    $query = "SELECT * FROM Reviews WHERE ruid = '$id_post'";
    $result = mysql_query($query);
    //$row = mysql_fetch_array($result);
    while ($row = mysql_fetch_array($result)) {
        $results[] = $row;
    } 
    //echo $row['rusername'];
	foreach ($results as $affcom) {	
        $name = $affcom['rusername'];
        $comment = $affcom['rtext'];
        $date = $affcom['rdate'];
        // Get gravatar Image 
        // https://fr.gravatar.com/site/implement/images/php/
        $default = "mm";
        $size = 35;
        $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($name)))."?d=".$default."&s=".$size;

    ?>
	
	
	
    <div class="cmt-cnt">
        <img src="<?php echo $grav_url; ?>" />
        <div class="thecom">
			<h5><a  href="new_pm.php?recip=<?php echo $affcom['rusername']?>"><?php echo $name; ?></a></h5>
			<span data-utime="1371248446" class="com-dt"><?php echo $date; ?></span>
            <br/>
            <p>
                <?php echo $comment; ?>
            </p>
        </div>
    </div><!-- end "cmt-cnt" -->
    <?php } ?>
	
	

    <div class="new-com-bt">
        <span>Write a comment ...</span>
    </div>
    <div class="new-com-cnt">
        <?php 
        if(!isset($_COOKIE['username'])) {
        echo(guest);
        }else{
        echo($_COOKIE["username"]);
        }
        ?>
        <!--<input type="text" id="name-com" name="name-com" value="" placeholder="Your name" />-->
		<!--<input name="starrating" id="starrating" value="1" type="number" class="rating" min=0 max=5 step=1 data-size="xs2" >-->
		<textarea class="the-new-com"></textarea>
		
        <div class="bt-add-com">Post comment</div>
        <div class="bt-cancel-com">Cancel</div>
    </div>
    <div class="clear"></div>
</div><!-- end of comments container "cmt-container" -->


<script type="text/javascript">
   $(function(){ 
        //alert(event.timeStamp);
        $('.new-com-bt').click(function(event){    
            $(this).hide();
            $('.new-com-cnt').show();
            $('#name-com').focus();
        });

        /* when start writing the comment activate the "add" button */
        $('.the-new-com').bind('input propertychange', function() {
           $(".bt-add-com").css({opacity:0.6});
           var checklength = $(this).val().length;
           if(checklength){ $(".bt-add-com").css({opacity:1}); }
        });

        /* on clic  on the cancel button */
        $('.bt-cancel-com').click(function(){
            $('.the-new-com').val('');
            $('.new-com-cnt').fadeOut('fast', function(){
                $('.new-com-bt').fadeIn('fast');
            });
        });

        // on post comment click 
        $('.bt-add-com').click(function(){
            var theCom = $('.the-new-com');
            var theName = $('#name-com');
			//var starrating = $('#starrating');			
			
            if( !theCom.val()){ 
                alert('You need to write a comment!'); 
            }else{ 
                $.ajax({
                    type: "POST",
                    url: "add-comment.php",
                    data: 'act=add-com&id_post='+<?php echo $id_post; ?>+'&name='+theName.val()+'&comment='+theCom.val(),
                    success: function(html){
                        theCom.val('');
                        //theMail.val('');
                        theName.val('');
						//starrating.val('');
                        $('.new-com-cnt').hide('fast', function(){
                            $('.new-com-bt').show('fast');
                            $('.new-com-bt').before(html);  
                        })
                    }  
                });
            }
        });

    });
</script> 
	 
	 
	</div>	
</body>
</html>
