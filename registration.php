<?php
	include("db.php");
	
	session_start();
	
	if(isset($_POST['submit']))
	{
		$_SESSION['name']=$_POST['name'];
		$_SESSION['phone_number']=$_POST['phone_number'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['admin_id']=$_POST['admin_id'];
		$_SESSION['password']=$_POST['password'];
	
		$insert_registration=mysqli_query($conn, "insert into registration(name,phone_number,email,admin_id,password)values('".$_SESSION['name']."','".$_SESSION['phone_number']."','".$_SESSION['email']."','".$_SESSION['admin_id']."','".$_SESSION['password']."')")or die(mysqli_error($conn));
	
		header("location:registration.php");
	
	}
	
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	
	<style>
		body
		{
			background-color:#daf542;
		}
	
		.star
		{
			color:red;
			font-size:15px;
		}
		
	</style>

</head>								  

<body>
	<div class="container">
	    <br>
	    
	    <div class="card p-3">
  <div class="card-header text-center ">Admin Registration</div>
	    <div class="card-body">
		<form class="form form-horizontal" action="" method="post">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">Name</label><span class="star">*</span>
						<input type="text" name="name" id="name" placeholder="Enter your name" class="form-control" required>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="phone_number">Phone Number</label><span class="star">*</span>
						<input type="number" class="form-control" name="phone_number" id="phone_number" min="1" placeholder="Enter your phone number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
						
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="email">Email</label><span class="star">*</span>
						<input type="email" name="email" id="email" placeholder="Enter your email" class="form-control" required>
					</div>
				</div>
				
				
				<div class="col-md-6">
					<label for="admin_id">Admin Id(Username)</label><span class="star">*</span>
					<input type="text" class="form-control" name="admin_id" id="admin_id" placeholder="Enter your admin id" required>

				</div>
									
				<div class="col-md-12">
					<label for="password">Password</label><span class="star">*</span>
					<input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>

				</div>
				
				
			</div>
			<br>
			<div class="row text-center">
		<div class="col-md-6">
				<button type="submit" class="btn btn-success mx-auto d-block" name="submit">Register</button>
			</div>
			
				<div class="col-md-6">
				    	<div class="row">
			<a href="adminlogin.php" class="text-decoration-none btn btn-primary">Login Page</a>
		</div>
				</div>	</div>
			
		</form>
	</div>
	
	</div></div>
</body>
</html>















