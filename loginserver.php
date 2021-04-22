<?php 
	session_start();
	if(isset($_POST["Submit"]))
	{
	$regno="";
	$password="";
	$db = mysqli_connect('localhost','root','','coursapedia') or die("Could not connect to tables");
	$regno=mysqli_real_escape_string($db,$_POST["regno"]);
	$password=mysqli_real_escape_string($db,$_POST["password"]);
	$regno=strtoupper($regno);
	if(empty($regno)) echo "<script>window.open('login.php','_self');alert('Enter Registration Number');</script>";
	if(empty($password)) echo "<script>alert('Enter the password');</script>";
	$query="select * from users where regno='$regno' and password='$password'";
	$conrows=mysqli_query($db,$query);
	$row=mysqli_fetch_array($conrows);
	$rows=mysqli_num_rows($conrows);
	if($rows==1)
	{	
		$_SESSION['id']=$regno;
		echo "<script>window.open('course.html','_self')</script>";
	}
	else
	{
		echo "<script>alert('Invalid user credentials')</script>";
	}
	}
?>