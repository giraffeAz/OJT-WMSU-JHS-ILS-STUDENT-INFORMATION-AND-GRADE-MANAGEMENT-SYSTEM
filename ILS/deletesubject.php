<?php
include("functions/connectdb.php"); 

if(isset($_POST['deletedata']))
{
    $id=$_POST['subject_id'];

   
    $sql="DELETE FROM subjects WHERE subject_id='$id'";

    if (mysqli_query($con, $sql)) {
			
			header('Location: subjectlist.php');

		} else {
            header('Location: subjectlist.php'); 
		}

}   

mysqli_close($con);
?>