<?php
include("db.php");
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone_num=$_POST['phone_num'];
	$message=$_POST['message'];
	$food=$_POST['food'];
	$material=$_POST['material'];
	$kitchen=$_POST['kitchen'];
	$seating=$_POST['seating'];
	$staff=$_POST['staff'];

	$insert=mysqli_query($conn,"insert into mess_feedback(full_name,email,phone_number,message,food,material,kitchen,seating,staff)
	values('".$name."','".$email."','".$phone_num."','".$message."','".$food."','".$material."',
	'".$kitchen."','".$seating."','".$staff."')") or die(mysqli_error($Conn));
	header("location:messform.php");
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!--<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="messform_style.css">-->
</head>
<body>
<div class="container">
<form action="" method="post">
	<h4>Student Details</h4>
	<div class="st"></div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
			<label for="name">Please Enter Your Full Name<span class="rd">*</span></label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Please Enter your Full Name" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="email">Email<span class="rd">*</span></label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Please Enter your Email ID" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="phone_num">Phone Number<span class="rd">*</span></label>
				<input type="number" class="form-control" id="phone_num" name="phone_num" placeholder="Please Enter your Phone Number" required>
			</div>
		</div>
	</div>
	<!--<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="block">Name of the block</label>
				<select name="block" class="form-control">
				<option value="">Select the block</option>
				<option value="Main Building(Boys)">Main Building(Boys)</option>
				<option value="Main Building(Girls)">Main Building(Girls)</option>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="academic">Feedback for the Academic year</label>
				<select name="acyear" class="form-control">
					<option value="">Select the Academic year</option>
					<option value="2021-2022">2021-2022</option>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="month">Select the Month</label>
				<select name="month" class="form-control">
				<option value="">Select the Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="dep">Select your Department</label>
				<select name="dep" class="form-control">
					<option value="">Select Your Department</option>
					<option value="CSE">CSE</option>
					<option value="ECE">ECE</option>
					<option value="EEE">EEE</option>
					<option value="Civil">Civil</option>
					<option value="Mechnical">Mechnical</option>
				</select>
			</div>
		</div>
</div>-->
<div class="row">
	<div class="col-md-12">
		<label for="message">Any Suggestion</label>
		<textarea class="form-control" id="message" name="message" placeholder="Enter your Feedback"></textarea>
	</div>
</div><br>
<h4>QUESTIONNAIRE ON MESS FACILITY</h4>
	<div class="ln"></div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label for="food">Quality and taste of food<span class="rd">(from 0 to 5)</span></label>
			<input type="range" name="food" id="food" min="0" max="5" class="form-control-range">
		</div>
		<div class="form-group">
			<label for="material">Quality of raw material<span class="rd">(from 0 to 5)</span></label>
			<input type="range" name="material" id="material" min="0" max="5" class="form-control-range">
		</div>
		<div class="form-group">
			<label for="kitchen">Kitchen & Dining hall Hygeine<span class="rd">(from 0 to 5)</span></label>
			<input type="range" name="kitchen" id="kitchen" min="0" max="5" class="form-control-range">
		</div>
		<div class="form-group">
			<label for="seating">Seating Arrangement<span class="rd">(from 0 to 5)</span></label>
			<input type="range" name="seating" id="seating" min="0" max="5" class="form-control-range">
		</div>
		<div class="form-group">
			<label for="staff">Service By Staff<span class="rd">(from 0 to 5)</span></label>
			<input type="range" name="staff" id="staff"  min="0" max="5" class="form-control-range">
		</div>
	</div>
</div><br>
<div class="row">
	<div class="col-md-12 text-center">
		<button type="submit" class="btn btn-primary" name="submit">Submit</label>
	</div>
</div>
</form>
</div>
</body>
</html>