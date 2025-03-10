<?php
	$host="localhost";
	$username="root";
	$password="";
	$database="messmanagement";
	
	$conn=mysqli_connect($host, $username, $password, $database)or die(mysqli_error($conn));
	
	/*
	if($conn)
	{
		echo "database is connected";
	}
	else
	{
		echo "database is not connected";
	}
	*/
	
	
?>