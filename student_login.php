<?php
	include("db.php");
	
	if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$select_student_login=mysqli_query($conn, "select * from student_registrationdetails where(username='".$username."' and password='".$password."')")or die(mysqli_error($conn));
		$count=mysqli_num_rows($select_student_login);
		
		$fetch_student_login=mysqli_fetch_array($select_student_login);
	
		$_SESSION['userid']=$fetch_student_login['id'];
		
		$_SESSION['roll_no']=$fetch_student_login['student_rollno'];
		$_SESSION['student_name']=$fetch_student_login['student_name'];
		
		$user_id=$_SESSION['userid'];
		
		if($count==1)
		{
			
			echo"<script>alert('login success');window.location.replace('leave_form.php')</script>";	
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
	<title>Student Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="style1.css">
	<style>
	    body
	    {
	        background-color:#ffa31a;
	    }
		.star
		{
			color:red;
			font-size:15px;
		}
		.card_color
		{
			background-color:#99ccff;
		}
		.st_reg
		{
		    color:black;
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
						<h2 class="text-center"><b>Student Login</h2>
						
						<form class="form form-horizontal" method="post" action="">
							<div class="row">
								<div class="col-md-12">
									<label for="username">User Name</label><span class="star">*</span>
									<input type="text" class="form-control" name="username" id="username" placeholder="Enter your user name" required>
									
									
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
									
									<input type="checkbox" id="password" onclick="myFunction()"> <spna>Show Password</span>

									
								</div>
								
								<div class="col-md-6">
									<a href="student_registrationform.php" class="text-decoration-none"><small><b class="st_reg">Student Registration</b></small></a>

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
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
 	
	
</body>
</html>














