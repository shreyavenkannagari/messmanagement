<?php
include("header.php");
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
  <style>
  .ig{
      height:700px;
      width:100%;
      background-image:url('mess1.jpg');
      background-repeat:no-repeat;
      background-size:cover;
  }
  </style>
  
    </head>
    <body>
        <div class="container-fluid ig">
            <img >
        </div>
        <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
	<h2 style="text-align:center">Feedback Form</h2>
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
				<input type="number" class="form-control" id="phone_num" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="phone_num" placeholder="Please Enter your Phone Number" required>
			</div>
		</div>
	</div>
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
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</div>
</div>
</form>
            </div>
        </div>
    </div>
    </body>
</html>