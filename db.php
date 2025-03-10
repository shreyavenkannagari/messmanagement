<?php
session_start();
$_SESSION['session_id']=session_id();
$host="localhost";
$username="skecac_mess_management";
$password="bgw,hvjrPZ2M";
$db="skecac_mess_management";

$conn=mysqli_connect($host,$username,$password,$db)or die(mysqli_error($conn));
/*
if($conn){
 echo"success";
}else{
    echo"failure";
}*/
date_default_timezone_set('Asia/Kolkata');

?>
