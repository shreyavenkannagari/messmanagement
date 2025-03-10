<?php 
	include("db.php");
	if(isset($_REQUEST['submit']))
	{
		$current_password=$_POST['current_password'];
		$new_password=$_POST['new_password'];
		$confirm_password=$_POST['confirm_password'];
		
		$insert_forgot=mysqli_query($conn, "insert into forgot_password(current_password,new_password,confirm_password)values('".$current_password."','".$new_password."','".$confirm_password."')")or die(mysqli_error($conn));
		
		header("location:adminlogin.php");
		
		
		
		
	}
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forgot Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		.star
		{
			color:red;
			font-size:20px;
		}
		body
		{
			background-color:#6aebeb;
		}
	</style>


</head>
<body>
	<div class="container">
		<form class="form form-horizontal" action="" method="post">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="current_password">Current Password</label><span class="star">*</span>
						<input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter your current password" required>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="new_password">New Password</label><span class="star">*</span>
						<input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter your new password" required>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="confirm_password">Confirm Password</label><span class="star">*</span>
						<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter your confirm password" required>
					</div>
				</div>
			</div>
				
			
			
			<div class="row">
				
				<button type="submit" class="btn btn-warning" name="submit">Change Password</button>
				
			</div>
			
		</form>
		
		<table class="table table-bordered table-hover">
			<tr>
				<th>Sno</th>
				<th>Current Password</th>
				<th>New Password</th>
				<th>Confirm Passowrd</th>
		
			</tr>
			<?php
				$sno=1;
				$select_forgot_password=mysqli_query($conn,"select * from forgot_password")or die(mysqli_error($conn));
				while($fetch_forgot_password=mysqli_fetch_array($select_forgot_password))
				{
					$select_registration=mysqli_query($conn, "select * from registration where id='".$fetch_forgot_password['confirm_password']."'") or die(mysqli_error($conn));
					$fetch_registration=mysqli_fetch_array($select_registration);
					
					
					
					
			?>
			<tr>
				<td><?php echo $sno; ?></td>
				<td><?php echo $fetch_forgot_password['current_password'];?></td>
				<td><?php echo $fetch_forgot_password['new_password'];?></td>
				<td><?php echo $fetch_forgot_password['confirm_password'];?></td>
			</tr>
			<?php
			
			}
			?>
			
			
		</table>
		
		
		
		
		
		
		
		
	</div>
</body>
</html>