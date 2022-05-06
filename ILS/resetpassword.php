<?php
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
			
			header('Location: adviserlist.php');

		} else {
            header('Location: adviserlist.php'); 
		}

}   

mysqli_close($con);
?>