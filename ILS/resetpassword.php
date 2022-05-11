<?php
session_start();
include("functions/connectdb.php"); 
include("functions/func.php");

if(isset($_POST['resetpass']))
{
    $id=$_POST['adviser_id'];


    $password = $_POST['resetpassword'];
    $cPassword = $_POST['confirmpassword']; 

    $hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "UPDATE users SET password='$hash' WHERE user_id='$id'";
    

    if (mysqli_query($con, $sql)) {
			
            $_SESSION['success'] = "Successfully Reset Adviser Password";
		header('Location: adviserlist.php');

		} else {

            $_SESSION['status'] = "Something Went Wrong";      
            header('Location: adviserlist.php'); 
		}

}   

mysqli_close($con);
?>