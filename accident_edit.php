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
                    <a class="navbar-brand" href="#">Vehicle</a>
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
                
			    $occurDate = $_POST['occurdate'];
                $time = $_POST['time'];
                $model = $_POST['model'];
                $driver = $_POST['driver'];
                $injury = $_POST['injury'];
                $description = $_POST['description'];
    
			    //updating the table
			    $result = mysqli_query($conn, "UPDATE accident SET occur_date='$occurDate',time ='$time',model='$model',driver='$driver',injury='$injury',description='$description' WHERE id='$id'");

			    if (!$result) {
    				die("Connection failed: " . mysqli_connect_error());
				} else {
					echo "Accident Record Updated";

				}
			        
			}
			?>

			<?php
				//getting id from url
				$id = isset($_GET['id']) ? $_GET['id'] : '';

				//selecting data associated with this particular id
				$result = mysqli_query($conn, "SELECT * FROM accident WHERE id='$id'");

				if (false === $result) {
					    echo mysql_error();
					}
				 
				while($row = mysqli_fetch_array($result))
				{
				    $occurDate = $row['occur_date'];
				    $time = $row['time'];
				    $model = $row['model'];
			    	$driver = $row['driver'];
			    	$injury = $row['injury'];
                    $description = $row['description'];
				}

				?>




        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                     
                            <h3 style="text-align: center;"><b>Update Accident Record</b></h3>
                            <p>Enter the following details :</p>

                            <form action="accident_edit.php" method="post">    
							
                            <div class="form-group">
                                <label>Occur Date</label>
                                <input type="date" class="form-control" name="occurdate" value="<?php echo $occurDate; ?>" >
                            </div> 
                            <div class="form-group">
                                <label>Time</label>
                                <input type="time" class="form-control" name="time" value="<?php echo $time; ?>" >
                            </div>
                            <div class="form-group">
                              <label for="model">Vehicle:</label>
                              <select class="form-control" name="model">
                              
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
                            <div class="form-group">
                                <label>Injury</label>
                                <input type="text" class="form-control" name="injury" value="<?php echo $injury; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="description">Accident Description:</label>
                                <textarea class="form-control" rows="5" name="description"><?php echo $description; ?></textarea>
                                <small class="form-text text-muted">If Required</small>
                            </div>
								<input type="hidden" name="id" value="<?php echo $id; ?>">

                                <a href="accidentrecord.php" class="btn btn-info" role="button">Back to vehicle table</a>
                                <input type="submit" name="update" class="btn btn-primary" style="float: right;" value="Update"></input>
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
