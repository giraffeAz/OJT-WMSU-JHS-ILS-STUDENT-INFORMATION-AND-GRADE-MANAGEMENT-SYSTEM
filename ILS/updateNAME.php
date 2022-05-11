<?php
session_start();
include("functions/connectdb.php"); 

if(isset($_POST['updateadminname']))
{
    $id=$_POST['update_id'];
    $ln=$_POST['lname'];
    $fn=$_POST['fname'];
    $mn=$_POST['mname'];

    $sql = "UPDATE users SET lastname='$ln', firstname='$fn', SET middlename='$mn' WHERE user_id='$id'";
    

    if (mysqli_query($con, $sql)) {
            $_SESSION['success'] = "Successfully Name";	
		header('Location: adminaccount.php');
            
		} else {
                  
            $_SESSION['status'] = "Something Went Wrong";
            header('Location: adminaccount.php'); 
		}

} 

mysqli_close($con);
?>    