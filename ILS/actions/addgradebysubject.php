<?php 
	error_reporting(0);
	include 'functions/connectdb.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
    $studentid=$_POST['studentid'];
	$current=$_POST['current'];
	$class=$_POST['class'];
	$yearid=$_POST['yearid'];
    $schoolyear=$_POST['schoolyear'];
	$quarter=$_POST['quarter'];
    $subject=$_POST['subject'];
    $grade=$_POST['grades'];
	$glevel=$_POST['glevel'];


	$user = $_SESSION['user_id'];

	if($_POST['tgs_id'] == ""){	
		
		switch ($quarter){
			case '1':
				
				$sql=mysqli_query($con, "UPDATE total_grade_subject SET gclevel='$current', 1st_grading ='$grade' WHERE student_id = '$studentid' AND subject_id= '$subject' AND sy_id= '$schoolyear'");
						
						echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
						<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
						<div class='text-center'>
						Succesfully Added Grades!
						</div>
						</div>";
						echo "<script>
						document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
						setTimeout(function(){ window.location.href='record.php?student=$studentid&current=$current&class=$class&yearid=$yearid'; }, 2000);</script>";
					
				break;
				

			case '2':
				
				$sql=mysqli_query($con, "UPDATE total_grade_subject SET 2nd_grading ='$grade' WHERE student_id = '$studentid' AND subject_id= '$subject' AND sy_id= '$schoolyear'");
				
				
				echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div class='text-center'>
				Succesfully Added Grades!
				</div>
				</div>";
				echo "<script>
				document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
				setTimeout(function(){ window.location.href='record.php?student=$studentid&current=$current&class=$class&yearid=$yearid'; }, 2000);</script>";
				  
				break;
			case '3':
				
				$sql=mysqli_query($con, "UPDATE total_grade_subject SET 3rd_grading ='$grade' WHERE student_id = '$studentid' AND subject_id= '$subject' AND sy_id= '$schoolyear'");
				
				
				echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div class='text-center'>
				Succesfully Added Grades!
				</div>
			</div>";
				echo "<script>
				document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
				setTimeout(function(){ window.location.href='record.php?student=$studentid&current=$current&class=$class&yearid=$yearid'; }, 2000);</script>";
				
				break;
			case '4':
			
				$final_rating = mysqli_query($con,"SELECT tgs_id,1st_grading,2nd_grading,3rd_grading FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '$subject' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($final_rating)) {{
							$tgs_id = $row['tgs_id']; 
							$first = $row['1st_grading']; 
							$second = $row['2nd_grading'];
							$third = $row['3rd_grading'];
							$fourth = $grade;
					
						$final_grade = ($first + $second + $third + $fourth) / 4;
										
							if($final_grade>=75)
							{
									$remarks = "PASSED";	
							} 
							else 
							{
								    $remarks = "FAILED";		   
													
							}
							}}
								
				$sql=mysqli_query($con, "UPDATE total_grade_subject SET 4th_grading ='$grade', final_grade ='$final_grade', remarks='$remarks' WHERE student_id = '$studentid' AND subject_id= '$subject' AND sy_id= '$schoolyear'");
							
				
				$ave = mysqli_query($con,"SELECT *, COUNT(tgs_id) as tgs_count , SUM(final_grade) as fgrade FROM total_grade_subject WHERE student_id = '$student' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($ave)) {
								  $total= $row['tgs_count'];
								  $sumfinal= $row['fgrade'];

								  if ($total==8)
										{
											$gen_ave = $sumfinal/$total;

												

											$school=$_POST['school'];
											$school_id=$_POST['school_id'];
											$district=$_POST['district'];
											$division=$_POST['division'];
											$region=$_POST['region'];
											$sylevel=$_POST['sylevel'];
											$glevel=$_POST['glevel'];
											$slevel=$_POST['slevel'];
											$adviser=$_POST['adviser'];

											$sql=mysqli_query($con,"UPDATE student_class_info SET school ='$school', school_id ='$school_id', district='$district', division ='$division', region='$region', sectionl ='$slevel', gradelevel='$glevel', adviser ='$adviser', gen_ave='$gen_ave' WHERE student_id = '$student' AND syl= '$schoolyear'");
												
										}
									}
							

							echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
							<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
							<div class='text-center'>
							Succesfully Added Grades!
							</div>
							</div>";
						
							echo "<script>
							document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
							setTimeout(function(){ window.location.href='record.php?student=$studentid&current=$current&class=$class&yearid=$yearid'; }, 2000);</script>";
						
				break;	
				default:
				echo "<div id='add-adviser-messages' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
						<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
						<div class='text-center'>
						Something Went Wrong
						</div>
					</div>";
					echo "<script>
					setTimeout( function(){ window.location.href='record.php?student=$studentid&current=$current&class=$class&yearid=$yearid'; }, 3000);</script>";
						unset($_POST);	
		} 
		
		
	
}



}
mysqli_close($con);

 ?>