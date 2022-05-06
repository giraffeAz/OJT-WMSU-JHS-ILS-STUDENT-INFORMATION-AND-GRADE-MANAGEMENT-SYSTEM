<?php 
	error_reporting(0);
	include 'functions/connectdb.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
    $studentid=$_POST['studentid'];
	$gradeURL=$_POST['grade'];
	$sectionURL=$_POST['section'];
	$syURL=$_POST['sy'];
    $schoolyear=$_POST['schoolyear'];
	$quarter=$_POST['quarter'];
    $subject=$_POST['subject'];
    $grade=$_POST['grade'];


	$user = $_SESSION['user_id'];

	if($_POST['id'] == ""){	
		
		switch ($quarter){
			case '1':
				$scount = count($subject);

				for($i=0 ; $i < $scount; $i++)
				{
				$sql=mysqli_query($con, "UPDATE total_grade_subject SET 1st_grading ='$grade[$i]' WHERE student_id = '$student' AND subject_id= '$subject[$i]' AND sy_id= '$schoolyear'");
				}		
						echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
						<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
						<div class='text-center'>
						Succesfully Added Grades!
						</div>
						</div>";
						echo "<script>
						document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
						setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
					
				break;
				

			case '2':
				$scount = count($subject);

				for($i=0 ; $i < $scount; $i++)
				{
				$sql=mysqli_query($con, "UPDATE total_grade_subject SET 2nd_grading ='$grade[$i]' WHERE student_id = '$student[$i]' AND subject_id= '$subject[$i]' AND sy_id= '$schoolyear'");
				}
				
				echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div class='text-center'>
				Succesfully Added Grades!
				</div>
				</div>";
				echo "<script>
				document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
				setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
				  
				break;
			case '3':
				$scount = count($subject);

				for($i=0 ; $i < $scount; $i++)
				{
				$sql=mysqli_query($con, "UPDATE total_grade_subject SET 3rd_grading ='$grade[$i]' WHERE student_id = '$student' AND subject_id= '$subject[$i]' AND sy_id= '$schoolyear'");
				}
				
				echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div class='text-center'>
				Succesfully Added Grades!
				</div>
			</div>";
				echo "<script>
				document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
				setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
				
				break;
			case '4':
			
				$final_rating = mysqli_query($con,"SELECT tgs_id,1st_grading,2nd_grading,3rd_grading FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '$subject' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($final_rating)) {{
							$tgs_id = $row['tgs_id']; 
							$first = $row['1st_grading']; 
							$second = $row['2nd_grading'];
							$third = $row['3rd_grading'];
							$fourth = $grade;
					
						$final_grade[$i] = ($first + $second + $third + $fourth) / 4;
										
							if($final_grade>=75)
							{
									$remarks = "PASSED";	
							} 
							else 
							{
								    $remarks = "FAILED";		   
													
							}
							}}
								
				$sql=mysqli_query($con, "UPDATE total_grade_subject SET 4th_grading ='$grade', final_grade ='$final_grade', remarks='$remarks' WHERE student_id = '$student' AND subject_id= '$subject' AND sy_id= '$schoolyear'");
							
							
				
				$school=$_POST['school'];
				$school_id=$_POST['school_id'];
				$district=$_POST['district'];
				$division=$_POST['division'];
				$region=$_POST['region'];
				$sylevel=$_POST['sylevel'];
				$glevel=$_POST['glevel'];
				$slevel=$_POST['slevel'];
				
			
				$adviser=$_POST['adviser'];
				$ave = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '1' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($ave)) {{
							$subject1 = $row['final_grade']; 

							}}
							$ave = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '2' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($ave)) {{
							$subject2 = $row['final_grade']; 

							}}	
							$ave = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '3' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($ave)) {{
							$subject3 = $row['final_grade']; 

							}}
							$ave = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '4' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($ave)) {{
							$subject4 = $row['final_grade']; 

							}}
							$ave = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '5' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($ave)) {{
							$subject5 = $row['final_grade']; 

							}}
							$ave = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '6' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($ave)) {{
							$subject6 = $row['final_grade']; 

							}}
							$ave = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '7' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($ave)) {{
							$subject7 = $row['final_grade']; 

							}}
							$ave = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '8' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($ave)) {{
							$subject8 = $row['final_grade']; 

							}}
							$gen_ave= ($subject1+$subject2+$subject3+$subject4+$subject5+$subject6+$subject7+$subject8)/8;
							if($gen_ave>=75)
							{
								
									$action = "PROMOTED";	
									
							} 
							else 
							{
								    $remarks = "RETAINED";	
									
													
							}
							$to_be_classified= $glevel+1;
							
					
							$sql=mysqli_query($con, "INSERT into student_class_info (student_id, school, school_id, district, division, region, syl, sectionl, gradelevel, adviser, gen_ave, to_be_classified, action) 
							VALUES ( '$studentid', '$school', '$school_id', '$district','$division', '$region', '$sylevel', '$slevel', '$glevel', '$adviser', '$gen_ave', '$to_be_classified', '$action' )");
							echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
							<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
							<div class='text-center'>
							Succesfully Added Grades!
							</div>
							</div>";
						
							echo "<script>
							document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
							setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
				break;	
				default:
				echo "<div id='add-adviser-messages' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
						<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
						<div class='text-center'>
						Something Went Wrong
						</div>
					</div>";
					echo "<script>
					setTimeout( function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 3000);</script>";
						unset($_POST);	
		} 
		

 

	
}



}
mysqli_close($con);

 ?>