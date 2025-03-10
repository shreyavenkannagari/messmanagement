<?php
    include("db.php");
    
       
    if(!empty($_REQUEST['delete_id']))
    {
        $delete_id=$_REQUEST['delete_id'];
        $delete_student_registrationdetails=mysqli_query($conn, "delete from student_registrationdetails where id='".$delete_id."'")or die(mysqli_error($conn));
        header("location:student_registerlist.php");
        
    }
    
    
    
    
   
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registered Students List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container pt-3">
    
        <div class="card">
            <div class="card-header text-center bg-primary text-white"><b>List of Students</b></div> 
             
            <div class="card-body">
                <table class="table table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Registration Date</th>
                            <th>Student Rollno</th>
                            <th>Student Name</th>
                            <th>Phone Number</th>
                            <th>Gender</th>
                            
                            <th>Email</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>Address</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                        <?php
                            $sno=1;
                            $select_student_registrationdetails=mysqli_query($conn, "select * from student_registrationdetails") or die(mysqli_error($conn));
                            while($fetch_student_registrationdetails=mysqli_fetch_array($select_student_registrationdetails))
                            {
                        ?>
                            <tbody>
                            
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $fetch_student_registrationdetails['registration_date']; ?></td>
                                    <td><?php echo $fetch_student_registrationdetails['student_rollno']; ?></td>
                                    <td><?php echo $fetch_student_registrationdetails['student_name']; ?></td>
                                    <td><?php echo $fetch_student_registrationdetails['phone_number']; ?></td>
                                    <td><?php echo $fetch_student_registrationdetails['gender']; ?></td>
                                
                                    <td><?php echo $fetch_student_registrationdetails['email']; ?></td>
                                    <td><?php echo $fetch_student_registrationdetails['username']; ?></td>
                                    <td><?php echo $fetch_student_registrationdetails['password']; ?></td>
                                    <td><?php echo $fetch_student_registrationdetails['address']; ?></td>
                                    
                                    <td><a href="student_registrationform.php?edit_id=<?php echo $fetch_student_registrationdetails['id']; ?>">Edit</a></td>
                                    <td><a href="student_registerlist.php?delete_id=<?php echo $fetch_student_registrationdetails['id']; ?>">Delete</a></td>
                                 
                                </tr>
                            </tbody>
                        <?php
                            $sno++;
                            }
                        
                        ?>
                  
                    
                </table>
            </div>
        
        </div>
       
    </div>
    
</body>

</html>