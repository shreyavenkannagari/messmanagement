<?php
include("db.php");


if(isset($_POST['submit']))
{
    $roll_no=$_SESSION['roll_no'];
    $name=$_SESSION['student_name'];
    $leave=$_POST['leave'];
    $return=$_POST['return'];
    $reason_for_leave=$_POST['reason_for_leave'];
    $leave_status="Pending";
    
    $diff=abs(strtotime($return)-strtotime($leave));
    
    $yeardiff=floor($diff/(365*60*60*24));
    
    $monthdiff=floor(($diff-$yeardiff*365*60*60*24)/(30*60*60*24));
    
    $daydiff=floor(($diff-$yeardiff*365*60*60*24-$monthdiff*30*60*60*24)/(60*60*24));
    
    
    
    $insert=mysqli_query($conn,"insert into leave_form(student_roll_no,student_name,date_of_leave,date_of_return,total_days,reason_for_leave,leave_status)
    values('".$roll_no."','".$name."','".$leave."','".$return."','".$daydiff."','".$reason_for_leave."','".$leave_status."')") or die(mysqli_error($conn));
    
    header("location:leave_form.php");
    
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
        <br> <br>
    
     <div class="container">
        <form action="" method="post">
        <div class="card">
            <div class="card-header text-white text-center bg-primary">
                <h5>Leave Form</h5>
            </div>
        
        <div class="card-body">
       <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="leave">Date of Leave</label>
                    <input type="datetime-local" class="form-control" name="leave">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="return">Date of Return</label>
                    <input type="datetime-local" class="form-control" name="return">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="reason_for_leave">Reason for Leave</label>
                    <textarea name="reason_for_leave" class="form-control" placeholder="Reason for Leave..."></textarea>
                </div>
            </div>
        </div>
        
        
        <div class="row">
        <div class="col-md-12 text-center">
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
        </div>
     </div>
        
     </div> 
     </div>
     
     </form>
     </div>
    </body>
</html>