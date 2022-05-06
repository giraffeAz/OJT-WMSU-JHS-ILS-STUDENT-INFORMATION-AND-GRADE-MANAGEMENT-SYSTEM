<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
 

$lrn=$_POST['lrn'];
$ln=$_POST['lname'];
$fn=$_POST['fname'];
$mn=$_POST['mname'];
$sex=$_POST['sex'];
$dob=$_POST['dob'];
$elementary_school=$_POST['icc'];
$sid = $_POST['sid'];
$sa=$_POST['s_add'];
$ave=$_POST['ave'];

$sy=$_POST['schoolyear']; 
$grade=$_POST['grade'];
$section=$_POST['section'];
$adviserid=$_POST['adviserid'];
$class=$_POST['classid'];

  
$user = $_SESSION['user_id'];
include 'functions/connectdb.php';

$search_query = mysqli_query($con, "SELECT * FROM student_info WHERE lrn_no = '$lrn'"); 
		$num_row = mysqli_num_rows($search_query);
		if($num_row >= 1){
			echo "<div id='add-adviser-messages' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
			<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
			<div class='text-center'>
			LRN is Exisiting
			</div>
			</div>";
			echo "<script>
			document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
			setTimeout(function(){	window.location.href='adviserindex.php';  }, 2000);</script>";
		}else{
			if ($sql=mysqli_query($con,"INSERT INTO student_info(lrn_no,lastname,firstname,middlename,sex,elementary_school,school_id,school_address,gen_ave,date_of_birth)
		VALUES ('$lrn','$ln','$fn','$mn','$sex','$elementary_school', '$sid', '$sa','$ave','$dob')")){
		$last_id = mysqli_insert_id($con);
		
		mysqli_query($con, "INSERT into student_class (student_id,school_year,grade,section,adviser_id) 
		VALUES ('$last_id','$sy','$grade','$section','$adviserid') ");

		mysqli_query($con, "INSERT into total_grade_subject (student_id,sy_id,subject_id) 
		SELECT '$last_id','$sy', subject_id FROM subjects ");

		mysqli_query($con, "INSERT into student_class_info (student_id,syl) 
		SELECT '$last_id','$sy' ");

		mysqli_query($con, "INSERT into student_status (student_id,sy_id) 
		SELECT '$last_id','$sy' ");

			echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div class='text-center'>
    Succesfully Added Student
    </div>
</div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='class.php?class=$class&adviserid=$adviserid';  }, 2000);</script>";
		} else {
			echo "<div id='add-adviser-messages' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
			<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
			<div class='text-center'>
			Something is Wrong
			</div>
			</div>";
			echo "<script>
			document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
			setTimeout(function(){	window.location.href='class.php?class=$class&adviserid=$adviserid';  }, 2000);</script>";
		}

 
		}
	
	}
mysqli_close($con);

  ?>