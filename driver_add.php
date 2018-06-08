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
                <li class="active">
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
                     
                            <h3 style="text-align: center;"><b>Add new Driver</b></h3>
                            <p>Enter the following details :</p>

                            <form action="driver_add.php" method="post" name="formdriver">
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" name="name" required>   
                            </div>
                            <div class="form-group">
                                <label>Identification card (Mykad)</label>
                                <input type="text" class="form-control" name="ic" required>
                                <small class="form-text text-muted">Example : 981022039991</small>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Home Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                            <div class="form-group">
                                <label>Primary phone number</label>
                                <input type="number" class="form-control" name="telnumber" required>
                                <small class="form-text text-muted">Enter roadtax expiry date</small>
                            </div>
                            <div class="row">
                            <div class="col-md-6">   
                            <div class="form-group">
                                <label>License Expiry</label>
                                <input type="date" class="form-control" name="licenseexpiry" required>
                                <small class="form-text text-muted">Enter roadtax expiry date</small>
                            </div>
                            </div>
                            
                            <div class="col-md-6">   
                            <div class="form-group">
                              <label for="lisencetype">Select Lisence Type:</label>
                              <select class="form-control" name="lisencetype">
                                <option>B1</option>
                                <option>B2</option>
                                <option>D</option>
                                <option>E</option>
                                <option>E1</option>
                                <option>E2</option>
                              </select>
                            </div> 
                            </div>
                            </div>
                                <a href="driver.php" class="btn btn-info" role="button">Back to Driver table</a>
                                <input type="submit" name="submit1" class="btn btn-primary" style="float: right;" value="Register Driver"></input>
                            </form>



                        <?php
                        $result1 = mysqli_query($conn, "SELECT model FROM vehicle");

                        $model = mysqli_fetch_row($result1);
                        ?>                           
                        <?php
                        if(isset($_POST["submit1"])) {
                            $name = $_POST['name'];
                            $icnum = $_POST['ic'];
                            $email = $_POST['email'];
                            $address = $_POST['address'];
                            $telnum = $_POST['telnumber'];
                            $licenseExpiry = $_POST['licenseexpiry'];
                            $licenseType = $_POST['lisencetype'];
                                    
                            // Insert user data into table
                            $result = mysqli_query($conn, "INSERT INTO driver(name,ic_number,email,address,tel_number,licenseexpiry,licensetype) VALUES('$name','$icnum','$email','$address','$telnum','$licenseExpiry','$licenseType')");
                            
                            // Show message when user added
                            echo "Driver added successfully.";


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


</html>
