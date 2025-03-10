<?php
include("db.php");

if(isset($_POST['submit']))
{
	$day=$_POST['day'];
	$shift=$_POST['shift'];
	$food=$_POST['food'];
	
	$insert=mysqli_query($conn,"insert into food_item_list(day,shift,food_item) 
	values('".$day."','".$shift."','".$food."')") or die(mysqli_error($conn));
	header("location:menu1.php");
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
</head>
<body>
<div class="container bg-info text-white">
<h1>Please Fill the Below Details</h1>
<form action="" method="post">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="day">Day Wise</label>
				<select name="day" class="form-control">
					<option value="">Select a option</option>
					<option value="Monday">Monday</option>
					<option value="Tuesday">Tuesday</option>
					<option value="Wednesday">Wednesday</option>
					<option value="Thursday">Thursday</option>
					<option value="Friday">Friday</option>
					<option value="Saturday">Saturday</option>
					<option value="Sunday">Sunday</option>
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="shift">Shift Wise</label>
				<select name="shift" class="form-control">
				<option value="">Select a option</option>
				<option value="Breakfast">Breakfast</option>
				<option value="Morning">Morning</option>
				<option value="Afternoon">Afternoon</option>
				<option value="Evening">Evening</option>
				<option value="Night">Night</option>
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="food">Food Items</label>
				<input type="text" name="food" id="food" class="form-control" placeholder="Please Enter Food Items">
			</div>
		</div>
	</div>
<div class="row">
	<div class="col-md-12 text-center">
		<button type="submit" class="btn btn-primary" name="submit">Register</button>
	</div>
</div>
</form>
</div>
<div class="container">
	<div class="row">
		<table class="table">
			<tr>
				<th>S.No</th>
				<th>Day</th>
				<th>Shift</th>
				<th>Food Item</th>
			</tr>
			<?php
			 $count=1;
			 $select1=mysqli_query($conn,"select * from food_item_list") or die(mysqli_error($conn));
			 while($fetch1=mysqli_fetch_array($select1))
			 {
				$fetch_idd=$fetch1['food_item'];
				
				     
                        $food_id1=$fetch1['food_item']; 
			?>
			<tr>
				<td><?php echo $count?></td>
				<td><?php echo $fetch1['day']?></td>
				<td><?php echo $fetch1['shift']?></td>
				
				 <td><?php echo $fetch1['food_item'] ;?></td>
				
	
				
			</tr>
			<?php
			$count++;
			 }
			?>
			
			
			
			
			
			
			
			
			
		</table>
	</div>
</div>
</body>
</html>