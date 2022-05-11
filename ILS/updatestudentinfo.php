<?php
include 'functions/connectdb.php';


if(isset($_POST['updatedata'])){
 
$id=$_POST['student_id'];
$lrn=$_POST['lrn'];
$ln=$_POST['lname'];
$fn=$_POST['fname'];
$mn=$_POST['mname'];
$sex=$_POST['sex'];
$dob=$_POST['dob'];
$elementary_school=$_POST['elems'];
$sid = $_POST['sid'];
$sa=$_POST['s_add'];
$ave=$_POST['ave'];




$sql="UPDATE student_info SET lrn_no='$lrn', lastname='$ln', firstname='$fn', middlename='$mn', sex='$sex', date_of_birth='$dob', school_id='$sid', elementary_school='$elementary_school', school_address='$sa', gen_ave='$ave' WHERE student_id='$id'";
     

    if (mysqli_query($con, $sql)) {
        $_SESSION['success'] = "Successfully Update School Year Status";	   
        header("window.location.href='editstudentinfo.php?student=$student'; ");

    } else {
        $_SESSION['status'] = "Something Went Wrong";
        header("window.location.href='editstudentinfo.php?student=$student'; "); 
    }

    }   

mysqli_close($con);
?>        
			
	
			
