<?php
session_start();
include("functions/connectdb.php"); 

if(isset($_POST['updatedata']))
{
    $id=$_POST['update_id'];
    $lastname = $_POST['lastname']; 
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $username = $_POST['username']; 

    $sql = "UPDATE users SET lastname='$lastname', firstname='$firstname', middlename='$middlename', username='$username' WHERE user_id='$id'";
  

    if (mysqli_query($con, $sql)) {
		
            $_SESSION['success'] = "Successfully Update Adviser Information";
		header('Location: adviserlist.php');

		} else {

            $_SESSION['status'] = "Something Went Wrong";     
            header('Location: adviserlist.php'); 
		}

}   

mysqli_close($con);
?>