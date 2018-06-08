<!-- login session -->
<?php
    include "config.php";
    error_reporting(0);
    session_start();
    
    if (empty($_SESSION[email]) AND empty($_SESSION[password]))
    {
     echo "<center>Login Required!<br>";
     echo "<a href=index.php><b>LOGIN</b></a></center>";
    }
    else
    {
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Fleeter</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <script type="text/javascript" src="javascript/startTime.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body onload="startTime()">

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-6.jpg">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text">
                    <b>FLEETER</b>
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li  class="active">
                    <a href="vehicle.php">
                        <i class="pe-7s-car"></i>
                        <p>Vehicle</p>
                    </a>
                </li>
                <li>
                    <a href="driver.php">
                        <i class="pe-7s-user"></i>
                        <p>Driver</p>
                    </a>
                </li>
                <li>
                    <a href="regularmaintenence.php">
                        <i class="pe-7s-tools"></i>
                        <p>Regular Maintenance</p>
                    </a>
                </li>
                <li>
                    <a href="repair.php">
                        <i class="pe-7s-attention"></i>
                        <p>Repairs</p>
                    </a>
                </li>
                <li>
                    <a href="accidentrecord.php">
                        <i class="pe-7s-gleam"></i>
                        <p>Accident Records</p>
                    </a>
                </li>
                 <li>
                    <a href="maintenencereminder.php">
                        <i class="pe-7s-bell"></i>
                        <p>Maintenence Reminders</p>
                    </a>
                </li>
                <li style="text-align: center;" class="active">
                    <a href="">
                    <div id="txt"></div>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Vehicle</a>
                </div>
                <div class="collapse navbar-collapse">
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Logged in as <b><?php echo $_SESSION['email']; ?></b></p>
                            </a>
                        </li>
                        <li>
                            <a href="logout.php" id="nav-logout">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">

                            	<div class="col-md-10">
                                <h4 class="title">Vehicle</h4>
                                <p class="category">Current registered vehicle information</p>
                                </div>

                                <div class="col-md-2">
                                	<a href="vehicle_add.php" class="btn btn-primary btn-round" role="button"><b>Register new vehicle</b></a>
                                </div>


                            </div>
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Id</th>
                                        <th>Vehicle Image</th>
                                        <th>Registration Date</th>
                                        <th>Plate Num.</th>
                                    	<th>Type</th>
                                    	<th>Model</th>
                                    	<th>Milage</th>
                                    	<th>Roadtax Expiry</th>
                                        <th>Assigned Driver</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include_once("config.php");
                                            $result = mysqli_query($conn, "SELECT * FROM vehicle ORDER BY id DESC");
                                        ?>
                                        <?php
                                        while($user_data = mysqli_fetch_array($result)){
                                            echo"<tr>";
                                            echo"<td>".$user_data['id']."</td>";
                                            echo"<td>";?> <img src="upload/<?php echo $user_data['photo']?>" height="100" width="100"><?php echo "</td>";
                                            echo"<td>".$user_data['regdate']."</td>";
                                            echo"<td>".$user_data['platenum']."</td>";
                                            echo"<td>".$user_data['type']."</td>";
                                            echo"<td>".$user_data['model']."</td>";
                                            echo"<td>".$user_data['milage']."</td>";
                                            echo"<td>".$user_data['roadtax_expiry']."</td>";
                                            echo"<td>".$user_data['assigndriver']."</td>";
                                            echo"<td><a href ='vehicle_edit.php?id=$user_data[id]'>Edit</a> | 
                                            <a href='vehicle_delete.php?id=$user_data[id]'class='delete' data-confirm='Are you sure to delete this item?'>Delete</a></td>";
                                        }
                                        ?>

                                      
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                    


                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="dashboard.php">
                                
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                
                            </a>
                        </li>
                        
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="">Fleeter</a>, Fleet Management system
                </p>
            </div>
        </footer>


    </div>
</div>
<script>
var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
  deleteLinks[i].addEventListener('click', function(event) {
      event.preventDefault();

      var choice = confirm(this.getAttribute('data-confirm'));

      if (choice) {
        window.location.href = this.getAttribute('href');
      }
  });
}

$("#nav-logout").click(function(e) {
  e.preventDefault()
    swal({
        title : "",
        text : "Would you like to log out from the system?",
        type : "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
   },
function(isConfirm){
  if (isConfirm) {
      window.location="logout.php"; // if you need redirect page 
    alert("Press Yes");
  } else {
        alert("Cancelled");
  }
    })
});
</script>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.js"></script>
    <link href="http://tristanedwards.me/u/SweetAlert/lib/sweet-alert.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
<?php
}
?>