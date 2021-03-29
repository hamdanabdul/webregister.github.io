<?php
	include 'database.php';
	if(isset($_POST['create']))
	{
		if($_POST['name']!="")
		{
			$name=$_POST['name'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$str="insert into users set username='$name',email='$email',password='$password'";
			mysqli_query($con,$str);		
		}
	}
	header("Location:index.php");
?>