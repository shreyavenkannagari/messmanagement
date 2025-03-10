<?php
	include("db.php");
	
	
	if(isset($_POST['submit']))
	{
		$admin_id=$_POST['admin_id'];
		$password=$_POST['password'];
		
		$select_mess_staff=mysqli_query($conn, "select * from registration where(admin_id='".$admin_id."' and password='".$password."')")or die(mysqli_error($conn));
		$count=mysqli_num_rows($select_mess_staff);
		
		$fetch_mess_staff=mysqli_fetch_array($select_mess_staff);
	
		$_SESSION['userid']=$fetch_mess_staff['id'];
		
		$user_id=$_SESSION['userid'];
		
		if($count==1)
		{
			
			echo"<script>alert('login success');window.location.replace('admin_home.php')</script>";	
		}
		else
		{
			echo"<script>alert('user not found')</script>";
		}
	
	
	}
	
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="style1.css">
	<style>
		.star
		{
			color:red;
			font-size:15px;
		}
		.card_color
		{
			background-color:#ebab34;
		}
	</style>

</head>								  

<body>
	<div class="container">
		
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="card card_color">
					<div class="card-body">
						<h2 class="text-center"><b>Admin Login</h2>
						
						<form class="form form-horizontal" method="post" action="">
							<div class="row">
								<div class="col-md-12">
									<label for="admin_id">Admin Id</label><span class="star">*</span>
									<input type="text" class="form-control" name="admin_id" id="admin_id" placeholder="Enter your admin id" required>
									
									
								</div>
																	
								<div class="col-md-12">
									<label for="password">Password</label><span class="star">*</span>
									<input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
									
								</div>
							</div>
							
							<div class="row pt-3">
							
								<button type="submit" class="btn btn-success mx-auto d-block" name="submit">Sign In</button>
						
							</div>
							<div class="row pt-3">
								<div class="col-md-6">
									<input type="checkbox" id="remember">
									<label for="remember">Remember Me</label>
								</div>
								
								<div class="col-md-6">
									<a href="forgot_password.php" class="text-decoration-none">Forgot Password</a>

								</div>
								
							</div>
							
							
							
							
						</form>
					
					</div>
				
				</div>
			
			</div>
			<div class="col-md-4">
			</div>
		</div>
	
	</div>
</body>
</html>














