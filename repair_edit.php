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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


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
                <li>
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
                <li class="active">
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
                    <a href="notifications.php">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
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
                    <a class="navbar-brand" href="#">Repair</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                    
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
			// including the database connection file
			include_once("config.php");
			 
			if(isset($_POST['update']))
			{    
			    $id = $_POST['id'];
			    
			    $name = $_POST['name'];
                $icNumber = $_POST['icnumber'];
                $emailAddress = $_POST['emailAddress'];
                $address = $_POST['address'];
                $telNumber = $_POST['telnumber'];
                $licenseExpiry = $_POST['licenseexpiry'];
                $licenseType = $_POST['lisencetype'];

			    //updating the table
			    $result = mysqli_query($conn, "UPDATE driver SET name='$name',ic_number='$icNumber',email='$emailAddress',address='$address',tel_number='$telNumber',licenseexpiry='$licenseExpiry',licensetype='$licenseType' WHERE id='$id'");

			    if (!$result) {
    				die("Connection failed: " . mysqli_connect_error());
				} else {
					echo "Driver Info Successfully updated";

				}
			        
			}
			?>


                <?php
                //getting id from url
                $id = isset($_GET['id']) ? $_GET['id'] : '';

                //selecting data associated with this particular id
                $result = mysqli_query($conn, "SELECT * FROM repair WHERE id='$id'");

                if (false === $result) {
                        echo mysql_error();
                    }
                 
                while($res = mysqli_fetch_array($result))
                {
                    $date = $res['date1'];
                    $type = $res['type'];
                    $repairplace = $res['repair_place'];
                    $vehicle = $res['vehicle'];
                    $meterread = $res['meter_read'];
                    $cost = $res['cost'];
                    $remark = $res['remark'];
                    $reference = $res['reference'];

                ?>




        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                     
                           <h3 style="text-align: center;"><b>Insert Repair Record</b></h3>
                            <p>Enter the following details :</p>

                            <form action="repair_add.php" method="post" name="maintenenceform">
                            <div class="form-group">
                                <label>Repair Date</label>
                                <input type="date" class="form-control" name="date1" value="<?php echo $date; ?>" required>   
                            </div>
                            <div class="form-group">
                              <label for="type">Select repair type:</label>
                              <select class="form-control" name="type">
                                <option><?php echo $type; ?></option>
                                <option>Minor repair</option>
                                <option>Interim repair</option>
                                <option>Full repair</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label>Repair at:</label>
                                <input type="text" class="form-control" name="repair" value="<?php echo $repairplace; ?>" required>
                            </div>
                            
                            <div class="form-group">
                              <label for="vehicle">Vehicle:</label>
                              <select class="form-control" name="vehicle">
                              
                                        <?php
                                            //include_once("config.php");
                                            $result = mysqli_query($conn, "SELECT model FROM vehicle");
                                        ?>
                                        <?php
                                        while($user_data = mysqli_fetch_array($result)){ ?>
                                            <option><?php echo $user_data['model']; ?></option>
                                        <?php } ?>
                              </select>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Meter read</label>
                                <input type="number" class="form-control" name="meterread" value="<?php echo $meterread; ?>" required>
                                <small class="form-text text-muted">Current milage during repair</small>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Cost</label>
                                <input type="number" class="form-control" name="cost" value="<?php echo $cost; ?>" required>
                            </div>
                            </div>
                            </div> 
                            <div class="form-group">
                                <label>Receipt number</label>
                                <input type="text" class="form-control" name="receipt" value="<?php echo $reference; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="remark">Remarks:</label>
                                <textarea class="form-control" rows="4" name="remark"><?php echo $remark; ?></textarea>
                            </div> 

                            <a href="repair.php" class="btn btn-info" role="button">Back to repair table</a>
                            <input type="submit" name="submit1" class="btn btn-primary" style="float: right;" value="Add Record"></input>

                            </form>

                        
                </div>
            </div>
        </div>

       
    </div>
</div>





</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>


</html>
<?php
}
?>