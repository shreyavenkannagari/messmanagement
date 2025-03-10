<?php

	include("db.php");
	
	if(isset($_POST['logout']))
	{
		session_destroy();
		header("location:adminlogin.php");
	}
	
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Details</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	
	<style>
		body
		{
			background-color:#34dbeb;
			
		}
		.tab_color
		{
			background-color:yellow;
		}
	</style>


</head>
<body>
	<div class="container">
		<div class="row pt-5">
			<div class="col-md-12">
				<table class="table table-bordered table-striped table-hover tab_color">
					<thead>
						<tr>
							<th>S.no</th>
							<th>Name</th>
							<th>Phone Number</th>
							<th>Email</th>
							<th>Admin Id</th>
							<th>Password</th>
						
						</tr>
					</thead>
					

					
					<?php
						$userid=$_REQUEST['user_id'];
						$sno=1;
						$select_registration=mysqli_query($conn, "select * from registration where id='".$userid."' ")or die(mysqli_error($conn));
						while($fetch_registration=mysqli_fetch_array($select_registration))
						
						{
					?> 
					<tr>
						<td><?php echo $sno;?></td>
						<td><?php echo $fetch_registration['name'];?></td>
						<td><?php echo $fetch_registration['phone_number'];?></td>
						<td><?php echo $fetch_registration['email'];?></td>
						<td><?php echo $fetch_registration['admin_id'];?></td>
						<td><?php echo $fetch_registration['password'];?></td>
						
					
				
					</tr>
					<?php
					
						}
					?>
					
				</table>
			</div>
		</div>
		
		<form class="form form-horizontal" action="" method="post">
		<div class="row pt-5">
			<button type="submit" class="btn btn-danger mx-auto d-block" name="logout">Log Out</button>
					
		</div>
		</form>
		
		
		
	</div>

</body>
</html>