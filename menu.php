<?php
    include("db.php");
    include("header.php");
?>

<!DOCTYPE HTML>
<html>

<head>
 <title>Mess management</title>   
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>




<style type="text/css" media="screen">
    p,
    table,
    hr,
    .box {
        font-family: arial;
    }
    
 
</style>
</head>

<body>
<div class="container-fluid">

    <br><br><br><br><br>
    <div class="container">
	<div class="row">
		<table class="table table-bordered">
			<tr>
				<th>S.No</th>
				<th>Day</th>
				<th>Breakfast</th>
				<th>Lunch</th>
				<th>Dinner</th>
			</tr>
			<?php
			 $count=1;
			 $select1=mysqli_query($conn,"select * from food_item_list") or die(mysqli_error($conn));
			 while($fetch1=mysqli_fetch_array($select1))
			 {
			?>
			<tr>
				<td><?php echo $count?></td>
				<td><?php echo $fetch1['day']?></td>
				<td><?php echo $fetch1['breakfast']; ?></td>
				<td><?php echo $fetch1['lunch']; ?></td>
				<td><?php echo $fetch1['dinner'];?></td>
				  	
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