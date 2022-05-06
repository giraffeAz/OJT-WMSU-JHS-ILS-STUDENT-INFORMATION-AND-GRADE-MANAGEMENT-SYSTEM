<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['student_enrollbybatch']))
    {
        $all_id = $_POST['student_enroll'];
        $extract_id = implode(',', $all_id);
        echo $extract_id;

       

        $adviserid= $_POST['adviserid'];
        $grade= $_POST['grade'];
        $section= $_POST['section'];
        $schoolyear= $_POST['schoolyear'];
        $studentid= $_POST['studentid'];

        $user = $_SESSION['user_id'];
        include 'functions/connectdb.php';

     
            if ($sql=mysqli_query($con,"DELETE FROM student_status WHERE studentstatus_id IN ($extract_id)"))
            { 
                $scount = count($studentid);

				for($i=0 ; $i < $scount; $i++)
				{
                $sql1= mysqli_query($con, "INSERT into student_class (student_id,school_year,grade,section,adviser_id) 
                VALUES ('$studentid[$i]','$schoolyear','$grade','$section','$adviserid') ");
        
                $sql2 = mysqli_query($con, "INSERT into total_grade_subject (student_id,sy_id,subject_id) 
                SELECT '$studentid[$i]','$schoolyear', subject_id FROM subjects ");
        
                $sql3= mysqli_query($con, "INSERT into student_class_info (student_id,syl) 
                SELECT '$studentid[$i]','$schoolyear' ");
        
                $sql4 = mysqli_query($con, "INSERT into student_status (student_id,sy_id) 
                SELECT '$studentid[$i]','$schoolyear' ");
                }
    }
   
        

        //$sql=mysqli_query($con,"DELETE FROM student_status WHERE studentstatus_id IN ($extract_id)");
        
        echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
        <div class='text-center'>
        Succesfully Enrolled Students
        </div>
        </div>";
        echo "<script>
        document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
        setTimeout(function(){	window.location.href='enrollbybatch.php?gradeclass=$adviserid';  }, 2000);</script>";
    

	
	}
}  
mysqli_close($con);

  ?>