<?php
    include("db.php");

    if(isset($_POST['submit']))
    {
        $registration_date=$_POST['registration_date'];
        //$registration_date_format=date('d-m-y', strtotime($registration_date));
        
        $student_rollno=$_POST['student_rollno'];
        $student_name=$_POST['student_name'];
        $phone_number=$_POST['phone_number'];
        $gender=$_POST['gender'];
        
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $address=$_POST['address'];
        
       
        
        $insert_student_registrationdetails=mysqli_query($conn,"insert into student_registrationdetails(registration_date,student_rollno,student_name,phone_number,gender,email,username,password,address)values('".$registration_date."','".$student_rollno."','".$student_name."','".$phone_number."','".$gender."','".$email."','".$username."','".$password."','".$address."')") or die(mysqli_error($conn));
                                                                                                      
        header("location:student_registrationform.php");

        
    }
    
    
    if(!empty($_REQUEST['edit_id']))
    {
        $edit_id=$_REQUEST['edit_id'];
        
        $edit_select=mysqli_query($conn, "select * from student_registrationdetails where id='".$edit_id."'") or die(mysqli_error($conn));
        $edit_fetch=mysqli_fetch_array( $edit_select);
        
    }
    
    
    if(isset($_POST['update']))
    {
        $registration_date=$_POST['registration_date'];
        //$registration_date_format=date('d-m-y', strtotime($registration_date));
        
        $student_rollno=$_POST['student_rollno'];
        $student_name=$_POST['student_name'];
        $phone_number=$_POST['phone_number'];
        $gender=$_POST['gender'];
        
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $address=$_POST['address'];
        
        
   
        $update_student_registrationdetails=mysqli_query($conn,"update student_registrationdetails set registration_date='".$registration_date."',student_rollno='".$student_rollno."',student_name='".$student_name."',phone_number='".$phone_number."',gender='".$gender."',email='".$email."',username='".$username."',password='".$password."',address='".$address."' where id='".$edit_id."'") or die(mysqli_error($conn));
    
        header("location:student_registerlist.php");     

    }
    
    
    
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
    <title>Student Registration Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
  
    
    <style>

        .require
        {
            color:red;
            font-size:20px;
        }
        .st_regform
        {
            margin:auto;
            color:red;
        }
        
    </style>
</head>
<body>

    <div class="container">
    
        <div class="card">
            <div class="card-header text-center bg-primary text-white"><b>Student Registration Form</b></div> 
             
            <div class="card-body">
        		<form class="form form-horizontal" action="" method="post" enctype="multipart/form-data">
        		  
        			<div class="row pt-3">
        				
        				<div class="col-md-6">
        					<div class="form-group">
        						<label for="registration_date">Registration Date</label><span class="require">*</span>
        						<input type="date" name="registration_date" id="registration_date" value="<?php if(!empty($_REQUEST['edit_id'])){ echo $edit_fetch['registration_date']; }?>" class="form-control" placeholder="Enter Your Registration Date" required>
        					</div>
        				</div>
        				
        				<div class="col-md-6">
        					<div class="form-group">
        						<label for="student_rollno">Student Roll Number</label><span class="require">*</span>
        						<input type="text" name="student_rollno" id="student_rollno" value="<?php if(!empty($_REQUEST['edit_id'])) { echo $edit_fetch['student_rollno']; }?>" class="form-control" placeholder="Enter Your Roll Number" required>
        					</div>
        				</div>
        				
        			</div>
        			<div class="row">
            	        <div class="col-md-6">
        					<div class="form-group">
        						<label for="student_name">Student Name</label><span class="require">*</span>
        						<input type="text" name="student_name" id="student_name" value="<?php if(!empty($_REQUEST['edit_id'])) { echo $edit_fetch['student_name'] ;} ?>" class="form-control" placeholder="Enter Your Name" required>
        					</div>
            			</div>
        			
        			
        				
        				<div class="col-md-6">
        				    <div class="form-group">
        						<label for="phone_number">Phone Number</label><span class="require">*</span>
        						<input type="number" name="phone_number" id="phone_number" min="1" value="<?php if(!empty($_REQUEST['edit_id'])) { echo $edit_fetch['phone_number'] ;} ?>"  class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter Your Phone Number" required>
        						<span class="error_msg"></span>
        					</div>
        				
                        </div>
        				
        				<div class="col-md-6">
        					<div class="form-group">
        						<label for="gender">Gender</label><span class="require">*</span><br>
        						<input type="radio" name="gender" id="gender" value="Female" <?php if(!empty($_REQUEST['edit_id'])) { if($edit_fetch['gender']=="Female") { echo "checked"; }} ?> >Female
        						<input type="radio" name="gender" id="gender" value="Male" <?php if(!empty($_REQUEST['edit_id'])) { if($edit_fetch['gender']=="Male") { echo "checked"; }} ?> required>Male
        					</div>
        				</div>
        				
        				
        			
        				
        				<div class="col-md-6">
        					<div class="form-group">
        						<label for="email">Email</label><span class="require">*</span>
        						<input type="email" name="email" id="email" value="<?php if(!empty($_REQUEST['edit_id'])) { echo $edit_fetch['email']; } ?>" class="form-control" placeholder="Enter Your Email" required>
        					</div>
        				</div>
        				
        				<div class="col-md-6">
        					<div class="form-group">
        						<label for="username">Username</label><span class="require">*</span>
        						<input type="text" name="username" id="username" value="<?php if(!empty($_REQUEST['edit_id'])) { echo $edit_fetch['username']; } ?>" class="form-control" placeholder="Enter Your Username" required>
        					</div>
        				</div>
        				
        			   
        				
        				<div class="col-md-6">
        					<div class="form-group">
        						<label for="password">Password</label><span class="require">*</span>
        						<input type="password" name="password" id="password" value="<?php if(!empty($_REQUEST['edit_id'])) { echo $edit_fetch['password']; }?>" class="form-control" placeholder="Enter Your Password" required>
        					</div>
        				</div>
        				
        				
        				<div class="col-md-12">
        					<div class="form-group">
        						<label for="address">Address</label><span class="require">*</span>
        						<textarea name="address" id="address" class="form-control" placeholder="Enter Your Address" required><?php if(!empty($_REQUEST['edit_id'])){ echo $edit_fetch['address']; }?></textarea>
        					</div>
        				</div>
        				
        			
        				<?php
                            if(!empty($_REQUEST['edit_id']))
                            {
        				?>
        				
        				<button type="submit" class="btn btn-warning form_button mx-auto d-block" name="update">Update</button>
        				
        				<?php
        				    }
        				    else
        				    {
        				?>
        				
        				<button type="submit" class="btn btn-success form_button mx-auto d-block" name="submit">Register</button>
        				<?php
        				     
        				    }
        				
        				?>
        				
        			</div>
        			
        		</form>
            </div>
        
        </div>
        
        
        
        
        
        
    
       
    </div>
    
    
    <script>
		$(document).ready(function()
		{
			$("#phone_number").keyup(function()
			{
				var phno_count=$("#phone_number").val().length;
				if(phno_count<10)
				{
					$("#error_msg").text("please enter 10 digits only").css('color','red');
					$(".form_button").prop("disabled", true);
					
				}
				else if(phno_count>10)
				{
					$("#error_msg").text("please enter 10 digits only").css('color','red');
					$(".form_button").prop("disabled", true);
				}
				else
				{
					$("#error_msg").text("");
					$(".form_button").prop("disabled", false);
				}
			});
		});
	
	</script>
    
</body>


    
</html>