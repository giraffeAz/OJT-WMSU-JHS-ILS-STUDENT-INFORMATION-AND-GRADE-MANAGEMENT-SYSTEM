<?php
include("functions/connectdb.php"); 

if(isset($_POST['deletedata']))
{
    $id=$_POST['class_id'];

   
    $sql="DELETE FROM class WHERE class_id='$id'";

    if (mysqli_query($con, $sql)) {
			
			header('Location: manageclass.php');

		} else {
            header('Location: manageclass.php'); 
		}

}

mysqli_close($con);
?>