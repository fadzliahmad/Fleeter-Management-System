<!doctype html>
<?php
include_once("config.php");
?>
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
    <div class="col-md-4">
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
                <li class="active">
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
    </div>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                     
                            <h3 style="text-align: center;"><b>Insert Maintenence Record</b></h3>
                            <p>Enter the following details :</p>

                            <form action="maintenence_add.php" method="post" name="maintenenceform">
                            <div class="form-group">
                                <label>Maintenence Date</label>
                                <input type="date" class="form-control" name="date1" required>   
                            </div>
                            <div class="form-group">
                              <label for="type">Select maintenence type:</label>
                              <select class="form-control" name="type">
                                <option>Minor Service</option>
                                <option>Interim Service</option>
                                <option>Full Service</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="supplier">Supplier:</label>
                              <select class="form-control" name="supplier">
                              
                                        <?php
                                            //include_once("config.php");
                                            $result = mysqli_query($conn, "SELECT supplier_name FROM supplier");
                                        ?>
                                        <?php
                                        while($user_data = mysqli_fetch_array($result)){ ?>
                                            <option><?php echo $user_data['supplier_name']; ?></option>
                                        <?php } ?>
                              </select>
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
                                <input type="number" class="form-control" name="meterread" required>
                                <small class="form-text text-muted">Current milage during maintenence</small>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Cost</label>
                                <input type="number" class="form-control" name="cost" required>
                            </div>
                            </div>
                            </div> 
                            <div class="form-group">
                                <label for="remark">Remarks:</label>
                                <textarea class="form-control" rows="4" name="remark"></textarea>
                            </div> 

                            <a href="regularmaintenence.php" class="btn btn-info" role="button">Back to Maintenence table</a>
                            <input type="submit" name="submit1" class="btn btn-primary" style="float: right;" value="Add Record"></input>

                            </form>

                        <?php
                        if(isset($_POST["submit1"])) {
                            $date = $_POST['date1'];
                            $type = $_POST['type'];
                            $supplier = $_POST['supplier'];
                            $vehicle = $_POST['vehicle'];
                            $meterRead = $_POST['meterread'];
                            $cost = $_POST['cost'];
                            $remark = $_POST['remark'];
                                    
                            // Insert user data into table
                            $result = mysqli_query($conn, "INSERT INTO maintenence (date1,type,supplier,vehicle,meter_read,cost,remark) VALUES ('$date','$type','$supplier','$vehicle','$meterRead','$cost','$remark')");
                            
                            // Show message when user added
                            echo "Record added successfully.";


                        }

                        ?>

                    
                        
                </div>
            </div>
        </div>

       
    </div>
</div>





</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

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
