<?php 
include_once 'config.php';

if(isset($_POST["submit"])){
	$email=$_POST["email"];
    $pass=$_POST["pass"];
    $user="user";


	$query=mysqli_query($conn,"INSERT INTO register(email,pass,type) VALUES ('$email','$pass','$user')");

	if($query){
		//echo"OK query";
		header("Location:index.php");
		//login.php
		
	}
	
	else
	{
		echo"fail query";
	}
}

?>