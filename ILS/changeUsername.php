<?php
session_start();
include("functions/connectdb.php"); 

if(isset($_POST['updateadviserdata']))
{
    $id=$_POST['update_id'];
    $un=$_POST['username'];
    $sql = "UPDATE users SET username='$un' WHERE user_id='$id'";
    

    if (mysqli_query($con, $sql)) {
            $_SESSION['success'] = "Successfully Change Username";	
		header('Location: adviseraccount.php');
            
		} else {
                  
            $_SESSION['status'] = "Something Went Wrong";
            header('Location: adviseraccount.php'); 
		}

}  
if(isset($_POST['updateadmindata']))
{
    $id=$_POST['update_id'];
    $un=$_POST['username'];
    $sql = "UPDATE users SET username='$un' WHERE user_id='$id'";
    

    if (mysqli_query($con, $sql)) {
            $_SESSION['success'] = "Successfully Change Username";	
		header('Location: adminaccount.php');
            
		} else {
                  
            $_SESSION['status'] = "Something Went Wrong";
            header('Location: adminaccount.php'); 
		}

} 


mysqli_close($con);
?>    