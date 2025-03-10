<?php
include("db.php");

if(isset($_POST['submit']))
{
	$day=$_POST['day'];
	$breakfast=$_POST['breakfast'];
	$lunch=$_POST['lunch'];
	$dinner=$_POST['dinner'];
	
	$insert=mysqli_query($conn,"insert into food_item_list(day,breakfast,lunch,dinner) 
	values('".$day."','".$breakfast."','".$lunch."','".$dinner."')") or die(mysqli_error($conn));
	header("location:add_menu.php");
}

if(!empty($_REQUEST['edit_id']))
{
    $edit_id=$_REQUEST['edit_id'];
    $edit_user=mysqli_query($conn,"select * from food_item_list where id='".$edit_id."'") or die(mysqli_error($conn));
    $fetch_user=mysqli_fetch_array($edit_user);
}

if(!empty($_REQUEST['delete_id']))
{
    $delete_id=$_REQUEST['delete_id'];
    $delete_user=mysqli_query($conn,"delete from food_item_list where id='".$delete_id."'") or die(mysqli_error($conn));
    header("location:add_menu.php");
}

if(isset($_POST['update']))
{
    	$day=$_POST['day'];
	$shift=$_POST['shift'];
	$food=$_POST['food'];
	
	$update=mysqli_query($conn,"update food_item_list set day='".$day."',shift='".$shift."',food_item='".$food."' where id='".$edit_id."'") or die(mysqli_error($conn));
	header("location:add_menu.php");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>Add Menu</title>
  <style>
  .fa-trash{
      color:red;
  }
  .fa-pen-to-square,.fa-trash{
      font-size:15px;
  }
  </style>
</head>
<body>
<div class="container ">
<div class="card">
     <div class="card-header text-center bg-primary text-white "> <b>Add Menu</b> </div> 
     
    <div class="card-body">
<form action="" method="post">
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="day">Day Wise</label>
				<select name="day" class="form-control" required>
					<option value="">Select a option</option>
					<option value="Monday" <?php if(!empty($_REQUEST['edit_id'])) {if($fetch_user['day']=="Monday"){echo "selected";}} ?>>Monday</option>
					<option value="Tuesday" <?php if(!empty($_REQUEST['edit_id'])) {if($fetch_user['day']=="Tuesday"){echo "selected";}} ?>>Tuesday</option>
					<option value="Wednesday" <?php if(!empty($_REQUEST['edit_id'])) {if($fetch_user['day']=="Wednesday"){echo "selected";}} ?>>Wednesday</option>
					<option value="Thursday" <?php if(!empty($_REQUEST['edit_id'])) {if($fetch_user['day']=="Thursday"){echo "selected";}} ?>>Thursday</option>
					<option value="Friday" <?php if(!empty($_REQUEST['edit_id'])) {if($fetch_user['day']=="Friday"){echo "selected";}} ?>>Friday</option>
					
					<option value="Saturday" <?php if(!empty($_REQUEST['edit_id'])) {if($fetch_user['day']=="Saturday"){echo "selected";}} ?>>Saturday</option>
					
					<option value="Sunday" <?php if(!empty($_REQUEST['edit_id'])) {
					if($fetch_user['day']=="Sunday")
					{
					echo "selected";
					}
					} ?>>Sunday</option>
				</select>
			</div>
		</div>
		
		<div class="col-md-3">

		    <div class="form-group">
		        <label for="breakfast">Breakfast</label>
		        <input type="text" class="form-control" name="breakfast" value="<?php if(!empty($_REQUEST['edit_id'])){echo $fetch_user['breakfast'];}?>" placeholder="Please Enter Breakfast Items">
		    </div>
		</div>
		
		<div class="col-md-3">

		    <div class="form-group">
		        <label for="lunch">Lunch</label>
		        <input type="text" class="form-control" name="lunch" value="<?php if(!empty($_REQUEST['edit_id'])){echo $fetch_user['lunch'];}?>" placeholder="Please Enter Lunch Items">
		    </div>
		</div>
		
		<div class="col-md-3">

		    <div class="form-group">
		        <label for="dinner">Dinner</label>
		        <input type="text" class="form-control" name="dinner" value="<?php if(!empty($_REQUEST['edit_id'])){echo $fetch_user['dinner'];}?>" placeholder="Please Enter Dinner Items">
		    </div>
		</div>
		
		</div>
<div class="row">
	<div class="col-md-12 text-center">
	    <?php if(!empty($_REQUEST['edit_id'])){?>
	    	<button type="submit" class="btn btn-success" name="update">Update</button>
	    <?php } else {?>
		<button type="submit" class="btn btn-primary" name="submit">Register</button>
		<?php }?>
	</div>
</div>
</form>
</div>

</div>


    
<br>
	    <div class="card">
	      <div class="card-header text-center bg-primary text-white "> <b> Menu List</b> </div> 
	      </div>
	      <div class="card">
		<table class="table table-bordered">
			<thead>
			<tr>
				<th>S.No</th>
				<th>Day</th>
				<th>Breakfast</th>
				<th>Lunch</th>
				<th>Dinner</th>
				<th>Actions</th>
			</tr>
			</thead>
			<?php
			 $count=1;
			 $select1=mysqli_query($conn,"select * from food_item_list") or die(mysqli_error($conn));
			 while($fetch1=mysqli_fetch_array($select1))
			 {
			?>
			<tbody>
			<tr>
				<td><?php echo $count?></td>
				<td><?php echo $fetch1['day']?></td>
				<td><?php echo $fetch1['breakfast']?></td>
				<td><?php echo $fetch1['lunch'] ;?></td>
				<td><?php echo $fetch1['dinner']?></td>
				
			<td>
				<div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Actions
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="add_menu.php?edit_id=<?php echo $fetch1['id']?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
    <a class="dropdown-item" href="add_menu.php?delete_id=<?php echo $fetch1['id']?>"><i class="fa-solid fa-trash"></i> Delete</a>
  </div>
</div>
</td>
			</tr>
			</tbody>
			<?php
			$count++;
			 }
			?>
		</table>
	</div>
	
	</div>

</body>
</html>