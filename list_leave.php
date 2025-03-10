<?php
include("db.php");

if(!empty($_REQUEST['student_id'])&&(!empty($_REQUEST['leave_status'])))
{
    $student_id=$_REQUEST['student_id'];
    $leave_status=$_REQUEST['leave_status'];
    
    $update_leave=mysqli_query($conn,"update leave_form set leave_status='".$leave_status."' where id='".$student_id."'")or die(mysqli_error($conn));
    
    header("location:list_leave.php");
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
    </head>
    <body>
        <div class="container">
            <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h5>Leave Request</h5>
            </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="bg-info text-white">
                    <tr>
                        <th>S.No</th>
                        <th>Student Roll No</th>
                        <th>Student Name</th>
                        <th>Date of Leave</th>
                        <th>Date of Retrun</th>
                        <th>Total Leaves</th>
                        <th>Reason for Leave</th>
                        <th>Leave Status</th>
                        <th>Accept/Deny</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count=1;
                        $select_leave=mysqli_query($conn,"select * from leave_form") or die(mysqli_error);
                        while($fetch_leave=mysqli_fetch_array($select_leave))
                        {
                    ?>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $fetch_leave['student_roll_no'];?></td>
                        <td><?php echo $fetch_leave['student_name'];?></td>
                        <td><?php echo $fetch_leave['date_of_leave'];?></td>
                        <td><?php echo $fetch_leave['date_of_return'];?></td>
                        <td><?php echo $fetch_leave['total_days'];?></td>
                        <td><?php echo $fetch_leave['reason_for_leave'];?></td>
                        <td><?php  if($fetch_leave['leave_status']=='Approved'){ echo "<div class='text-white bg-success p-2'>".$fetch_leave['leave_status']."</div>";} else if($fetch_leave['leave_status']=='Not Approved'){ echo "<div class='text-white bg-danger p-2'>".$fetch_leave['leave_status']."</div>";} else{ echo "<div class='bg-warning text-white p-2' >".$fetch_leave['leave_status']."</div>";} ?></td>
                        <td><div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Actions
  </button>
  <div class="dropdown-menu">
      <?php
      
      if($fetch_leave['leave_status']=="Pending")
      {
      
     ?>
      
      
    <a class="dropdown-item text-success"  href="list_leave.php?student_id=<?php echo $fetch_leave['id']; ?>&leave_status=Approved"><i class="fa-solid fa-check-to-slot"></i> Accept</a>
    <a class="dropdown-item text-danger" href="list_leave.php?student_id=<?php echo $fetch_leave['id']; ?>&leave_status=Not Approved"><i class="fa-solid fa-circle-xmark"></i> Reject</a>
    
    <?php
      }
      else if($fetch_leave['leave_status']=="Approved")
      {
          ?>
         <a class="dropdown-item text-danger" href="list_leave.php?student_id=<?php echo $fetch_leave['id']; ?>&leave_status=Not Approved"><i class="fa-solid fa-circle-xmark"></i> Reject</a>
      <?php    
      }
      
      else
      {
        ?>
        
         <a class="dropdown-item text-success"  href="list_leave.php?student_id=<?php echo $fetch_leave['id']; ?>&leave_status=Approved"><i class="fa-solid fa-check-to-slot"></i> Accept</a>
       <?php   
      }
      ?>
      
      
  </div>
</div></td>
                    </tr>
                    <?php
                    $count++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>