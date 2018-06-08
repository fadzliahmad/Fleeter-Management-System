<?php
include "config.php";

error_reporting(0);
session_start();
if (!empty($_SESSION[email]) AND !empty($_SESSION[pass]))
{
  header('location:dashboard.php');
}
else
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to Fleeter : Fleet Management System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<!-- database function -->
	<?php
	include "config.php";
	?>
	
	<!-- authentication function -->
	<?php
		
		if(isset($_POST[login]))
		{
			$encrypt_pass = $_POST['pass'];
			$l_pass = $encrypt_pass;

			$login = mysqli_query($conn, "SELECT * FROM register WHERE email ='$_POST[email]' AND pass = '$l_pass' ");
			$success = mysqli_num_rows($login);
			$row = mysqli_fetch_array($login);
			
			if ($success == true){
				
				session_start();
				$_SESSION[username] = $row[username];
				$_SESSION[name] = $row[name];
				$_SESSION[phone] = $row[phone];
				$_SESSION[address] = $row[address];
				$_SESSION[email] = $row[email];
				$_SESSION[pass] = $row[pass];

				echo "$success Success\n";
			
				
				header('location:dashboard.php');
			}
			else
				
				echo "Invalid Username or Password , try again";
		}
	?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					

					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz" >
						<input class="input100" type="text" name="email" placeholder="Email" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required" >
						<input class="input100" type="password" name="pass" placeholder="Password" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>

					

					<div class="text-center p-t-136">
						<a class="txt2" href="signup.php">
							<i class="" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				
		</div>
	</div>

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php
}
?>