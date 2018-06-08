<!-- login session -->
<?php
    include "config.php";
    session_start();
    $_SESSION['email'];
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
                <li>
                    <a href="vehicle.php">
                        <i class="pe-7s-car"></i>
                        <p>Vehicle</p>
                    </a>
                </li>
                <li >
                    <a href="driver.php">
                        <i class="pe-7s-user"></i>
                        <p>Driver</p>
                    </a>
                </li>
                <li>
                    <a href="regularmaintenence.php">
                        <i class="pe-7s-tools"></i>
                        <p>Regular Maintainence</p>
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
                <li class="active">
                    <a href="reminder.php">
                        <i class="pe-7s-bell"></i>
                        <p>Reminder</p>
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
                    <a class="navbar-brand" href="#">Driver</a>
                </div>
                <div class="collapse navbar-collapse">
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Logged in as <b><?php echo $_SESSION['email']; ?></b></p>
                            </a>
                        </li>
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li>
                            <a href="" id="nav-logout" >
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
                    <div class="col-md-4 col-md-offset-4">
                        
<?php
include ('config.php');

 // Our database connectivity file

if ($_POST['step'] != '1')
    {
?>


<html>
<head>
    <title>Add Reminders</title>
</head>

<body>

<div class="row">
    <div class="col-md-12">

<form name="setup_reminder" action="reminder.php" method="post">

<div class="form-group">
<label>Event:</label>

<input name="reminder_name" class="form-control" type="text" maxlength="255" />
</div>
</div>
</div>


<div class="row">
    <div class="col-md-12">
<div class="form-group">
        <label for="reminder_desc">Description:</label>
        <textarea class="form-control" rows="5" name="reminder_desc"></textarea>
        <small class="form-text text-muted">If Required</small>
</div> 
    </div>
</div>



<label>Trigger Date</label>

<select name="reminder_year">
<?php
    $current_year = date("Y");
    for ($counter = $current_year; $counter <= $current_year + 2; $counter++)
        {
        echo ("\n<option>$counter</option>");
        }

?>
</select>

<select name="reminder_month">
<?php
    for ($counter = 1; $counter <= 12; $counter++)
        {
        if ($counter < 10) $prefix = "0";
          else $prefix = "";
        echo ("\n<option>$prefix$counter</option>");
        }

?>
</select>
<select name="reminder_date">
<?php
    for ($counter = 1; $counter <= 31; $counter++)
        {
        if ($counter < 10) $prefix = "0";
        echo ("\n<option>$prefix$counter</option>");
        }

?>
</select>


<input name="step" type="hidden" value="1" />
<input name="submit" type="submit" value="add reminder" />
<a href="reminder_list.php" class="btn btn-info" role="button">Go to Reminder list</a>
</form>
</body>
</html>


<?php
    }
  else
    {
    $error_list = "";
    $todays_date = date("Ymd");
    $reminder_date = $_POST['reminder_year'] . $_POST['reminder_month'] . $_POST['reminder_date'];
    if (empty($_POST['reminder_name'])) $error_list.= "No Reminder Name<br />";
    if (!checkdate($_POST['reminder_month'], $_POST['reminder_date'], $_POST['reminder_year'])) 
        $error_list.= "Reminder Date is invalid<br />";
      else
    if ($reminder_date <= $todays_date) $error_list.= "Reminder Date is not a future date<br />";
    if (empty($error_list))
        {

        // No error let's add the entry

        mysql_query("INSERT INTO reminder_events(`reminder_name`, `reminder_desc`, `reminder_date`) VALUES('" . addslashes($_POST['reminder_name']) . "', '" . addslashes($_POST['reminder_desc']) . "', '" . addslashes($reminder_date) . "')");

        // Let's go to the Reminder List page

        Header("Refresh: 1;url=reminder_list.php");
        echo <<< _HTML_END_
Reminder Added, redirecting ...
_HTML_END_;
        }
      else
        {

        // Error occurred let's notify it

        echo ($error_list);
        }
    }

?>

                    

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
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Help
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Contact
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

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>


</html>
