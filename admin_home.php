<?php
    include("db.php");
        
        // Input date in d-m-y format
         $today_date = date("Y-m-d\TH:i");
        
         $current_date=date("d-m-Y");
         
         $tomorrow = date("Y-m-d\TH:i", strtotime("+1 day"));
         
         $tomorrow_date=date("d-m-Y", strtotime("+1 day"));
        
  
    $select_students=mysqli_query($conn,"select * from student_registrationdetails") or die(mysqli_error($conn));
    $count=mysqli_num_rows($select_students);
    
   
   /* $select_leave=mysqli_query($conn,"select * from leave_form where '".$today_date."' between  date_of_leave and date_of_return  and leave_status='Approved'") or die(mysqli_error($conn));
    $leave_count=mysqli_num_rows($select_leave);
 
      $present_students=$count-$leave_count; */
    
   
    $select_leave1=mysqli_query($conn,"select * from leave_form where '".$tomorrow."' between  date_of_leave and date_of_return  and leave_status='Approved'") or die(mysqli_error($conn));
    $leave_count1=mysqli_num_rows($select_leave1);
   
   
   $present_students1=$count-$leave_count1;
    
    
	if(isset($_POST['log_out_btn']))
	{
		session_destroy();
		header("location:adminlogin.php");
	}
				
	
?>
	
	
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        .row_head
        {
            color:white;
            background-color:red;
            font-weight:bold;
            font-size:18px;
        }
        .text_color
        {
            color:white;
            font-weight:bold;
        }
    </style>
</head>
<body> 
 
    <div class="container"><br>
    <div class="row text-center" style="padding:20px;">
       
        <!--<div class="col-md-6">
           
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="row_head" colspan="3">Attendance Details For The Date Of <?php echo $current_date; ?></th>
                        </tr>
                        <tr class="bg-info text_color">
                            
                                <th>Total Students</th>
                                <th>No Of Students In Leave </th>
                                <th>No Of Students  Present </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="bg-primary text_color"><?php echo $count; ?></td>
                            <td class="bg-danger text_color"><?php echo $leave_count; ?></td>
                            <td class="bg-success text_color"><?php echo $present_students; ?></td>
                        </tr>
                      </tbody>  
                        
                    
                </table>
            
        </div>-->
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="row_head" colspan="3">Attendance Details For Tomorrow (<?php echo $tomorrow_date; ?>)</th>
                        </tr>
                        <tr class="bg-info text_color">
                            
                                <th>Total Students</th>
                                <th>No Of Students In Leave </th>
                                <th>No Of Students  Present </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="bg-primary text_color"><?php echo $count; ?></td>
                            <td class="bg-danger text_color"><?php echo $leave_count1; ?></td>
                            <td class="bg-success text_color"><?php echo $present_students1; ?></td>
                        </tr>
                      </tbody>  
                        
                    
                </table>
        </div>
        <div class="col-md-2"></div>
    </div>
        <div class="row text-center">
            
            
            <div class="col-md-3">
                <div class="card">
                    <a href="add_menu.php" class="btn btn-primary"> <div class="card-body">Add Menu</div></a> 
                </div>
            
            </div>
    
            
            
            <div class="col-md-3">
                <div class="card">
                    <a href="mess_list.php" class="btn btn-warning text-white"> <div class="card-body"> List Feedbacks</div></a> 
                </div>
            </div>
            
        
            
            
            <div class="col-md-3">
                <div class="card">
                    <a href="list_leave.php" class="btn btn-info"> <div class="card-body">List Leaves</div></a> 
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card">
                    <a href="student_registerlist.php" class="btn btn-success"> <div class="card-body">List Students</div></a> 
                </div>
            </div>
            
           
            
        </div>
		<br><br>
		
		<div class="row">
			<div class="col-md-12 text-center">
				
				<form method="post" action="">
				
					<button type="submit" name="log_out_btn" class="btn btn-danger"><div class="card-body">Log Out</div></button>
					
				</form>
				
				
			</div>
		</div>
            
            
            
            
            
            
            </div>
        
        </div>
    </div>
</body>
</html>
