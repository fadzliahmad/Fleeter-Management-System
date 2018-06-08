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
                <li>
                    <a href="repair.php">
                        <i class="pe-7s-attention"></i>
                        <p>Repairs</p>
                    </a>
                </li>
                <li class="active">
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
                    <a class="navbar-brand" href="#">Accident Record</a>
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

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                     
                            <h3 style="text-align: center;"><b>Register Record Accident</b></h3>
                            <p>Enter the following details :</p>

                            <form method="post" name="formvehicle" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Image</label>
                                <label for="fileSelect"></label>
                                <input type="file" name="photo" id="fileSelect">
                            </div>
                            <div class="form-group">
                                <label>Occur Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="form-group">
                                <label>Time</label>
                                <input type="time" class="form-control" name="time" required>
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
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" name="location" required>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                            <div class="form-group">
                              <label for="driver">Driver:</label>
                              <select class="form-control" name="driver">
							  
										<?php
                                            //include_once("config.php");
                                            $result = mysqli_query($conn, "SELECT name FROM driver");
                                        ?>
                                        <?php
                                        while($user_data = mysqli_fetch_array($result)){ ?>
                                            <option><?php echo $user_data['name']; ?></option>
                                        <?php } ?>
                                
                                
                              </select>
                            </div>
                                </div>
                            <div class="col-md-4">   
                            <div class="form-group">
                                <label>Injury</label>
                                <input type="text" class="form-control" name="injury" required>
                            </div>
                            </div> 
                            </div>
                            <div class="form-group">
                                <label for="description">Accident Description:</label>
                                <textarea class="form-control" rows="5" name="description"></textarea>
                                <small class="form-text text-muted">If Required</small>
                            </div> 

                                <a href="accidentrecord.php" class="btn btn-info" role="button">Back to table</a>
                                <input type="submit" name="submit1" class="btn btn-primary" style="float: right;" value="Register"></input>
                            </form>

                        
                        <!--Submit Form Data Function-->    
                        <?php
                        if(isset($_POST["submit1"])) {

                            $date = $_POST['date'];
                            $time = $_POST['time'];
                            $vehicle = $_POST['vehicle'];
                            $location = $_POST['location'];
                            $driver = $_POST['driver'];
							$injury = $_POST['injury'];
                            $description = $_POST['description'];
                                    
                            // Insert user data into table
                            $result = mysqli_query($conn, "INSERT INTO accident(occur_date,time,model,location,driver,injury,description) VALUES
                                ('$date','$time','$vehicle','$location','$driver','$injury','$description')");
                            
                            // Show message when user added
							if(!$result){
								echo "Failed.";
							} else {
								echo "Vehicle added successfully.";
							}	
                        }

                        ?>

                        <!--Photo upload function-->
                        <?php

                        // Check if the form was submitted
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            // Check if file was uploaded without errors
                            if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                                $filename = $_FILES["photo"]["name"];
                                $filetype = $_FILES["photo"]["type"];
                                $filesize = $_FILES["photo"]["size"];
								$last_id = mysqli_insert_id($conn);
            
                                // Verify file extension

                                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                        
                                // Verify file size - 5MB maximum
                                $maxsize = 5 * 1024 * 1024;
                                if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");                          
                                // Verify MYME type of the file
                                if(in_array($filetype, $allowed)){
                                    // Check whether file exists before uploading it
                                    if(file_exists("upload/" . $_FILES["photo"]["name"])){
                                        echo $_FILES["photo"]["name"] . " is already exists.";
                                    } else{
										$result = mysqli_query($conn, "UPDATE accident SET photo='$filename' WHERE id='$last_id'");

									if (!$result) {
										die("Connection failed: " . mysqli_connect_error());
									} 
										//$_FILES["photo"]["tmp_name"] = $timestamp. "_photo.jpg";
                                        move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);

                                        echo "Your file was uploaded successfully.";
                                    } 
                                } else{
                                    echo "Error: There was a problem uploading your file. Please try again."; 
                                }
                            } else{
                                echo "Error: " . $_FILES["photo"]["error"];
                            }
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

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
</html>
