<?php
include("functions/connectdb.php"); 

if(isset($_POST['updatedata']))
{
    $id=$_POST['update_id'];
    $sub=$_POST['sub'];
    $applied_grade=$_POST['applied'];
    $checklist= implode(",",$applied_grade);
    $sql = "UPDATE subjects SET subject='$sub', applied_grade='$checklist' WHERE subject_id='$id'";
    

    if (mysqli_query($con, $sql)) {
			
		header('Location: subjectlist.php');

		} else {
            header('Location: subjectlist.php'); 
		}

}   

mysqli_close($con);
?>       