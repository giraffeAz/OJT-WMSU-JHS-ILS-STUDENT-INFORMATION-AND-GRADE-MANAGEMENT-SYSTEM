<?php
session_start();
include("functions/connectdb.php"); 

if(isset($_POST['deletedata']))
{
    $id=$_POST['class_id'];

   
    $sql="DELETE FROM class WHERE class_id='$id'";

    if (mysqli_query($con, $sql)) {
            $_SESSION['success'] = "Successfully Deleted";	
		header('Location: manageclass.php');

		} else {

            $_SESSION['error'] = "Something Went Wrong";       
            header('Location: manageclass.php'); 
		}

}

mysqli_close($con);
?>