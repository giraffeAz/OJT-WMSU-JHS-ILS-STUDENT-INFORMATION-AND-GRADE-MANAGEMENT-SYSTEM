<?php
session_start();
include("functions/connectdb.php"); 

if(isset($_POST['deletedata']))
{
    $id=$_POST['adviser_id'];

   
    $sql="DELETE FROM users WHERE user_id='$id'";

    if (mysqli_query($con, $sql)) {
			
                  $_SESSION['success'] = "Successfully Deleted";
			header('Location: adviserlist.php');

		} else {
            $_SESSION['error'] = "Something Went Wrong";    
            header('Location: adviserlist.php'); 
		}

}

mysqli_close($con);
?>