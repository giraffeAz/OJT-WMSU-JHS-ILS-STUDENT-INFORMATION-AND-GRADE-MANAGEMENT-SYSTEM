<?php
include("functions/connectdb.php"); 
include("functions/func.php");

if(isset($_POST['resetpass'])) 
{
    $id=$_POST['user_id']; 
    $password = $_POST['password'];
    $npassword = $_POST['npassword'];
    $cPassword = $_POST['cpassword']; 

    $hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "UPDATE users SET password='$hash' WHERE user_id='$id'";
    
    if (mysqli_query($con, $sql)) {			
			header('Location: adminaccount.php');
		} else {
            header('Location: adminaccount.php'); 
		}

}   

mysqli_close($con);
?>