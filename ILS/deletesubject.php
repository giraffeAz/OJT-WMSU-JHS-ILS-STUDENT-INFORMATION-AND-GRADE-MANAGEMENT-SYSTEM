<?php
session_start();
include("functions/connectdb.php"); 

if(isset($_POST['deletedata']))
{
    $id=$_POST['subject_id'];

   
    $sql="DELETE FROM subjects WHERE subject_id='$id'";

    if (mysqli_query($con, $sql)) {
			
            $_SESSION['success'] = "Successfully Deleted";
		header('Location: subjectlist.php');

		} else {

                  $_SESSION['error'] = "Something Went Wrong";       
            header('Location: subjectlist.php'); 
		}

}   

mysqli_close($con);
?>