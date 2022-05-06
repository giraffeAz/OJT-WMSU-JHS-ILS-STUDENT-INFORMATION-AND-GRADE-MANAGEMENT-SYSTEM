<?php
include("functions/connectdb.php"); 

if(isset($_POST['updatedata']))
{
    $id=$_POST['update_id'];
    $adviser=$_POST['adviserl'];
    $sec=$_POST['section'];
    $sql = "UPDATE class SET adviser_id='$adviser', section='$sec' WHERE class_id='$id'";
    

    if (mysqli_query($con, $sql)) {
			
			header('Location: manageclass.php');

		} else {
            header('Location: manageclass.php'); 
		}

}   

mysqli_close($con);
?>       