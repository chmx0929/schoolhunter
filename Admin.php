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

<form action='admin_form.php' method='POST' enctype='multipart/form-data' >
<div class="container">
    <div class="row">
        <div class="col-md-2 offset-md-5">
            <div class="btn-group-vertical" role="group" aria-label="">
                <button type="button" class="btn btn-primary" onclick = "window.location = 'admin_update.php'">Update</button>
                <button type="button" class="btn btn-danger" onclick = "window.location = 'admin_delete.php'"> Delete </button>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">ADD RECORDS</div>

                <!-- Table -->
                <table class="table">
                    <tr>
                        <td><label><b>University Name: </b></label></td>
    			<td><input type="text" placeholder="University Name" name="uname" required></td>
                    </tr>

                    <tr>
                        <td><label><b>City: </b></label></td>
                        <td><input type="text" placeholder="City Name" name="city" required></td>
                    </tr>

                    <tr>
                        <td>    <label><b>State: </b></label></td>
                        <td> <input type="text" placeholder="State" name="state" required></td>
                    </tr>

                    <tr>
                        <td><label><b>Total Enroll: </b></label></td>
                        <td><input type="text" placeholder="Total Enroll" name="Total_enroll" required></td>
                    </tr>

                    <tr>
                        <td><label><b>Rank: </b></label></td>
                        <td><input type="text" placeholder="University Rank" name="rank" required></td>
                    </tr>

                    <tr>
                        <td><label><b>Tuition: </b></label></td>
                        <td><input type="text" placeholder="Tuition" name="tuition" required></td>
                    </tr>

	 	    <tr>
                        <td><label><b>Link: </b></label></td>
                        <td><input type="text" placeholder="Web Link" name="link" required></td>
                    </tr>
                    
                    <tr>
                    <td><center><button type="submit" style="width:auto;">Add University</button></center></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</form>

</body>
</html>