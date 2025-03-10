<?php
    include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mess Feedback List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center bg-primary text-white "><b>Mess Feedback List</b></div>
             <div class="card-body">
        
                <table class="table table-striped table-bordered table-hover">
                	<tr>
                		<th>S.No</th>
                		<th>Name</th>
                		<th>Email</th>
                		<th>Contact Number</th>
                		<th>Feedback</th>
                		<th>Taste of Food</th>
                		<th>Material Quality</th>
                		<th>Kitchen Hygenie</th>
                		<th>Seating Arrangement</th>
                		<th>Staff Service</th>
                	</tr>
                	<?php
                	$count=1;
                		$select=mysqli_query($conn,"select * from mess_feedback") or die(mysqli_error($conn));
                		while($fetch=mysqli_fetch_array($select))
                		{
                	?>
                	<tr>
                		<td><?php echo $count;?></td>
                		<td><?php echo $fetch['full_name'];?></td>
                		<td><?php echo $fetch['email'];?></td>
                		<td><?php echo $fetch['phone_number'];?></td>
                		<td><?php echo $fetch['message'];?></td>
                		<td><?php echo $fetch['food'];?></td>
                		<td><?php echo $fetch['material'];?></td>
                		<td><?php echo $fetch['kitchen'];?></td>
                		<td><?php echo $fetch['seating'];?></td>
                		<td><?php echo $fetch['staff'];?></td>
                	</tr>
                	<?php
                	$count++;
                		}
                		?>
                </table>
                </div>
        </div>  
    </div>    
    
</body>
</html>