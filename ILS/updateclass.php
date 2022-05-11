<?php
session_start();
include("functions/connectdb.php"); 

if(isset($_POST['updatedata']))
{
    $id=$_POST['update_id'];
    $adviser=$_POST['adviserl'];
    $sec=$_POST['section'];
    $sql = "UPDATE class SET adviser_id='$adviser', section='$sec' WHERE class_id='$id'";
    

    if (mysqli_query($con, $sql)) {
		
            $_SESSION['success'] = "Successfully Update Class";
		header('Location: manageclass.php');

		} else {
                  
            $_SESSION['status'] = "Something Went Wrong";      
            header('Location: manageclass.php'); 
		}

}   

mysqli_close($con);
?>       