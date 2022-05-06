$schoolyear = $_GET['yearid'];
                            $student = $_GET['student'];
                            $sub = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '1' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($sub)) {{
							$subject1 = $row['final_grade']; 
                           
							$sub = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '2' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($sub)) {{
							$subject2 = $row['final_grade']; 
                            
							$sub = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '3' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($sub)) {{
							$subject3 = $row['final_grade']; 
                           
							
							$sub = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '4' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($sub)) {{
							$subject4 = $row['final_grade']; 
                           
							
							$sub = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '5' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($sub)) {{
							$subject5 = $row['final_grade']; 
                            
							$sub = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '6' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($sub)) {{
							$subject6 = $row['final_grade']; 
							
							$sub = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '7' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($sub)) {{
							$subject7 = $row['final_grade']; 
                           
							$sub = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '8' AND sy_id= '$schoolyear'");
							while($row = mysqli_fetch_assoc($sub)) {{
							$subject8 = $row['final_grade']; 

							
                                ?>
                                <?php 

                            if ($subject1!="" && $subject2!="" $subject3!="" && $subject4!="" $subject5!="" && $subject6!="" $subject7!="" && $subject8!="")
                            {?><?php

                                    include 'functions/connectdb.php';
                                    $student = $_GET['student'];
                                    $yearid = $_GET['yearid'];
                                    $query = mysqli_query($con,"SELECT * FROM student_class_info WHERE student_id = '$student' AND syl = '$yearid' ");
                                    while($row = mysqli_fetch_assoc($query)) {{
                                            
                                    
                                    ?>
                                <td><?php //echo $row['gen_ave'];?></td>
                                <form class="" action="updatestatus.php" method="POST">
                                            <input name="studentid" type="hidden" value="<?php echo $_GET["student"] ?>">
                                            <input name="sy_id" type="hidden" value="<?php echo $_GET["yearid"] ?>">
                                            <input name="gradelevel" type="hidden" value="<?php echo $_GET["current"] ?>">
                                           
                                            <input name="current" type="hidden" value="<?php echo $_GET["current"] ?>">
                                            <input name="class" type="hidden" value="<?php echo $_GET["class"] ?>">
                                            <input name="yearid" type="hidden" value="<?php echo $_GET["yearid"] ?>">
                                
                                <td><div class="col-md-12">
                                            
                                                    <select class="form-select"  name="actionstatus" id="actionstatus" required>
                                                      
                                                         <option value="1">
                                                            PROMOTED
                                                        </option>
                                                        <option value="2">
                                                            RETAINED
                                                        </option>
                                                        <option value="3">
                                                            DROPPED
                                                        </option>
                                
                                                    </select>
                                                  
                                                </div> </td> 
                                               
                                
                                </tr>
                                <th colspan=8 scope="row"><button class="btn btn-add" name="updatestatus" style="float:right;">Save Changes</button></th>
                                </form>
                                <?php 
                                 } }
                                
                                 ?>
                                 
                                <?php } else{
                                 ?>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    <th></th>

                            
                                <?php
                                }
                                }}
                                }}
                                }}
                                }}
                                }}
                                }}
                                }}
                                }}
                
                                mysqli_close($con);
                                ?>*/ 
                                </tbody>





GENERAL AVE IF EMPTY OR NOT 
<th colspan=5 scope="row" class="text-end">General Average</th>
                                <?php

                                    include 'functions/connectdb.php';
                                    $student = $_GET['student'];
                                    $yearid = $_GET['yearid'];
                                    $query = mysqli_query($con,"SELECT * FROM student_class_info WHERE student_id = '$student' AND syl = '$yearid' ");
                                    while($row = mysqli_fetch_assoc($query)) {{
                                            $general = $row['gen_ave'];
                                    
                                    ?>

                                <?php 

                            if ($general!="")
                            {?>
                                <td><?php echo $row['gen_ave'];?></td>
                                <form class="" action="updatestatus.php" method="POST">
                                            <input name="studentid" type="hidden" value="<?php echo $_GET["student"] ?>">
                                            <input name="sy_id" type="hidden" value="<?php echo $_GET["yearid"] ?>">
                                            <input name="gradelevel" type="hidden" value="<?php echo $_GET["current"] ?>">
                                           
                                            <input name="current" type="hidden" value="<?php echo $_GET["current"] ?>">
                                            <input name="class" type="hidden" value="<?php echo $_GET["class"] ?>">
                                            <input name="yearid" type="hidden" value="<?php echo $_GET["yearid"] ?>">
                                
                                <td><div class="col-md-12">
                                            
                                                    <select class="form-select"  name="actionstatus" id="actionstatus" required>
                                                      
                                                         <option value="1">
                                                            PROMOTED
                                                        </option>
                                                        <option value="2">
                                                            RETAINED
                                                        </option>
                                                        <option value="3">
                                                            DROPPED
                                                        </option>
                                
                                                    </select>
                                                  
                                                </div> </td> 
                                               
                                
                                </tr>
                                <th colspan=8 scope="row"><button class="btn btn-add" name="updatestatus" style="float:right;">Save Changes</button></th>
                                </form>
                                <?php } else{
                                 ?>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    <th></th>

                            
                                <?php
                                }
                                      } }
                                mysqli_close($con);
                                ?>
                                </tbody>


total_grade_subject.sy_id, school_year.sy_id, school_year.status
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
									$to_be_classified= $glevel+1;
									
							} 
							else 
							{
								    $action = "RETAINED";
									$to_be_classified= $glevel;
									
													
							}
							$to_be_classified= $glevel+1;
							
							if (!empty($subject1) && !empty($subject2) && !empty($subject3) && !empty($subject4) && !empty($subject5) && !empty($subject6) && !empty($subject7)&& !empty($subject8) )
							{
								
								$school=$_POST['school'];
								$school_id=$_POST['school_id'];
								$district=$_POST['district'];
								$division=$_POST['division'];
								$region=$_POST['region'];
								$sylevel=$_POST['sylevel'];
								$glevel=$_POST['glevel'];
								$slevel=$_POST['slevel'];
								
							
								$adviser=$_POST['adviser'];
								$sql=mysqli_query($con, "INSERT into student_class_info (student_id, school, school_id, district, division, region, syl, sectionl, gradelevel, adviser, gen_ave, to_be_classified, action) 
							VALUES ( '$studentid', '$school', '$school_id', '$district','$division', '$region', '$sylevel', '$slevel', '$glevel', '$adviser', '$gen_ave', '$to_be_classified', '$action' )");		
							}

<!--ADDED GRADED BY SUBJECT ONE SUBJECT EACH--------------->
<div class="col-md-12">
                                                    <label for="subject" class="form-label">Add Grade by Subject</label>
                                                    <select class="form-select"  name="subject" id="subject"  required>
                                                    <option value="" id="subject" disabled selected>Select Subject</option>   
                                                    <?php
                                                        include 'functions/connectdb.php';
                                                        $sql = mysqli_query($con,"SELECT * from subjects"); 
                                                        while($row=mysqli_fetch_array($sql)){
                                                        ?>
                                                        <option value="<?php echo $row[0] ?>">
                                                        <?php echo $row[1] ?>
                                                        </option>
                                                        <?php } mysqli_close($con); ?>
                                                    </select>
                                                  
                                                </div> 

                                              
                                                  <div class="col-md-5">
                                                    <label for="grade" class="form-label">Enter Grade</label>
                                                    <input type="text" class="form-control" id="grade" name="grade" pattern="[0-9]+" maxlength="2" placeholder="" required>
                                                   
                                                </div>





<div class="col-md-12">
                                                    <label for="subject" class="form-label">Add Grade by Subject</label>
                                                    <select class="form-select"  name="subject" id="subject"  required>
                                                    <option value="" id="subject" disabled selected>Select Subject</option>   
                                                    <?php
                                                        include 'functions/connectdb.php';
                                                        $sql = mysqli_query($con,"SELECT * from subjects"); 
                                                        while($row=mysqli_fetch_array($sql)){
                                                        ?>
                                                        <option value="<?php echo $row[0] ?>">
                                                        <?php echo $row[1] ?>
                                                        </option>
                                                        <?php } mysqli_close($con); ?>
                                                    </select>
                                                  
                                                </div> 

                                              
                                                  <div class="col-md-5">
                                                    <label for="grade" class="form-label">Enter Grade</label>
                                                    <input type="text" class="form-control" id="grade" name="grade" maxlength="2" placeholder="" required>
                                                   
                                                </div>



$sql=mysqli_query($con, "UPDATE total_grade_subject SET 1st_grading ='$grade' WHERE student_id = '$student' AND subject_id= '$subject' AND sy_id= '$schoolyear'");



if ($sql=mysqli_query($con, "INSERT into total_grade_subject (student_id, sy_id, subject_id, 1st_grading) VALUES ( '$studentid', '$schoolyear', '$subject', '$grade')"))
		{
		echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
		<div class='text-center'>
		Succesfully Added Grades!
		</div>
		</div>";
		echo "<script>
		document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
		setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
		} 
		else{
			echo "<div id='add-adviser-messages' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div class='text-center'>
				Subject Grade Already Exist!
				</div>
			</div>";
			echo "<script>
			setTimeout(function(){	  }, 3000);</script>";
				unset($_POST);
		}


<?php 
	error_reporting(0);
	include 'functions/connectdb.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();
 

	if(count($errors) === 0){
	
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
			case '2':
			
				if($sql=mysqli_query($con, "UPDATE total_grade_subject SET 2nd_grading ='$grade' WHERE student_id = '$student' AND subject_id= '$subject' AND sy_id= '$schoolyear'"));
				{
				echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div class='text-center'>
				Succesfully Added Grades!
				</div>
			</div>";
				echo "<script>
				document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
				setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
				} 
				break;
			case '3':
			
				if($sql=mysqli_query($con, "UPDATE total_grade_subject SET 3rd_grading ='$grade' WHERE student_id = '$student' AND subject_id= '$subject' AND sy_id= '$schoolyear'"));
				{
				echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div class='text-center'>
				Succesfully Added Grades!
				</div>
			</div>";
				echo "<script>
				document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
				setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
				} 
				break;
			case '4':
			
				if($sql=mysqli_query($con, "UPDATE total_grade_subject SET 4th_grading ='$grade' WHERE student_id = '$student' AND subject_id= '$subject' AND sy_id= '$schoolyear'"));
				{
				echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div class='text-center'>
				Succesfully Added Grades!
				</div>
			</div>";
				echo "<script>
				document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
				setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
				} 
				break;	
			default:
			echo "<div id='add-adviser-messages' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
					<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
					<div class='text-center'>
					Something Went Wrong
					</div>
				</div>";
				echo "<script>
				setTimeout(function(){	  }, 3000);</script>";
					unset($_POST);
			
		}

		$check_exist = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '$subject' AND sy_id= '$schoolyear'");
		$num_row = mysqli_num_rows($check_exist);
		if($num_row >= 1){
			$tgs_id = $row['tgs_id']; 
			$first = $row['1st_grading']; 
			$second = $row['2nd_grading'];
			$third = $row['3rd_grading'];
			$fourth = $row['4th_grading'];
		
			if (EXISTS(COL_LENGTH ('total_grade_subject','1st_grading') && COL_LENGTH ('total_grade_subject','2nd_grading') && COL_LENGTH ('total_grade_subject','3rd_grading') && COL_LENGTH ('total_grade_subject','4th_grading') ) )
			{
				$final_grade = ($first + $second + $third + $fourth) / 4;
								
					if($final_grade>=75)
					{
							$remarks = "PASSED";	
					} 
							else 
							{
								$remarks = "FAILED";		   
											
							}
			}
				if($sql=mysqli_query($con, "UPDATE total_grade_subject SET 4th_grading ='$grade', final_grade ='$final_grade', remarks='$remarks' WHERE tgs_id = '$tgs_id'"));
					
		}
			
		else{
					if($sql=mysqli_query($con, "INSERT into total_grade_subject (student_id, sy_id, subject_id, 1st_grading) 
			VALUES ( '$studentid', '$schoolyear', '$subject', '$grade')")){
			mysqli_query($con, "INSERT into history_log (transaction,user_id,date_added) 
			VALUES ('added $sec in the class list','$user',NOW() )");
		echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
		<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
		<div class='text-center'>
		Succesfully Added Grades!
		</div>
	</div>";
		echo "<script>
		document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
		setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
		} else {
			echo "<div id='add-adviser-messages' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
			<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
			<div class='text-center'>
			Something Went Wrong
			</div>
		</div>";
		echo "<script>
		setTimeout(function(){	  }, 3000);</script>";
			unset($_POST);
	
	
		}
	
				
		} 
		

		

}
}
	}
	mysqli_close($con);

 ?>


























<?php 
	error_reporting(0);
	include 'functions/connectdb.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();
 

	if(count($errors) === 0){
	
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

		$check_exist = mysqli_query($con,"SELECT * FROM total_grade_subject WHERE student_id = '$student' AND subject_id= '$subject' AND sy_id= '$schoolyear'");
		$num_row = mysqli_num_rows($check_exist);
		if($num_row >= 1){
			$tgs_id = $row['tgs_id']; 
			$first = $row['1st_grading']; 
			$second = $row['2nd_grading'];
			$third = $row['3rd_grading'];
			$fourth = $row['4th_grading'];
		
			if (EXISTS(COL_LENGTH ('total_grade_subject','1st_grading','2nd_grading', '3rd_grading','4th_grading') ) )
			{
				$final_grade = ($first + $second + $third + $fourth) / 4;
								
					if($final_grade>=75)
					{
							$remarks = "PASSED";	
					} 
							else 
							{
								$remarks = "FAILED";		   
											
							}
			}
			
				$updatequery = mysqli_query("UPDATE total_grade_subject SET final_grade ='$final_grade', remarks='$remarks' WHERE tgs_id='$tgs_id'");

				
		}else{
			switch ($quarter){
				case '2':
					$updatequery = mysqli_query("UPDATE total_grade_subject SET 2nd_grading ='$grade' WHERE tgs_id='$tgs_id'");
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
					$updatequery = mysqli_query("UPDATE total_grade_subject SET 3rd_grading ='$grade' WHERE tgs_id='$tgs_id'");
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
					$updatequery = mysqli_query("UPDATE total_grade_subject SET 4th_grading ='$grade' WHERE tgs_id='$tgs_id'");
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
			}
		}

		else{
			if($sql=mysqli_query($con, "INSERT into total_grade_subject (student_id, sy_id, subject_id, 1st_grading) 
			VALUES ( '$studentid', '$schoolyear', '$subject', '$grade')")){
			mysqli_query($con, "INSERT into history_log (transaction,user_id,date_added) 
			VALUES ('added $sec in the class list','$user',NOW() )");
		echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
		<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
		<div class='text-center'>
		Succesfully Added Grades!
		</div>
	</div>";
		echo "<script>
		document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
		setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
		} else {
			echo "<div id='add-adviser-messages' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
			<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
			<div class='text-center'>
			Something Went Wrong
			</div>
		</div>";
		echo "<script>
		setTimeout(function(){	  }, 3000);</script>";
			unset($_POST);
	
	
		}
	
		
		
		}

}
}
	}
	mysqli_close($con);

 ?>



if($quarter == "2"){		
				$sql = "UPDATE total_grade_subject SET 2nd_grading='$grade' WHERE tgs_id='$tgs_id'";
				echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div class='text-center'>
				Succesfully Added Grades!
				</div>
			</div>";
				echo "<script>
				document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
				setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
			
			}
			if($quarter == "3"){
				
				$sql = "UPDATE total_grade_subject SET 3rd_grading='$grade' WHERE tgs_id='$tgs_id'";
				echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div class='text-center'>
				Succesfully Added Grades!
				</div>
			</div>";
				echo "<script>
				document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
				setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
				
			}
			if($quarter == "4"){
				
				$sql = "UPDATE total_grade_subject SET 4th_grading='$grade' WHERE tgs_id='$tgs_id'";
						echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div class='text-center'>
				Succesfully Added Grades!
				</div>
			</div>";
				echo "<script>
				document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
				setTimeout(function(){ window.location.href='record.php?student=$studentid&grade=$gradeURL&section=$sectionURL&sy=$syURL'; }, 2000);</script>";
					}





<?php
                                    include 'functions/connectdb.php';
                                  

                                    $query=  "SELECT student_class.sc_id, student_class.student_id, student_class.school_year, student_class.grade, student_class.section, student_class.adviser_id, student_info.lrn_no as lo, student_info.lastname as ln, student_info.firstname as fn, student_info.middlename as mn FROM student_class 
                                    INNER JOIN student_info ON student_class.student_id = student_info.student_id 
                                    WHERE student_class.adviser_id = '$current_user_id'";

                                    $result = mysqli_query($con, $sql);
                                    ?>

                                        <?php 
                                            if (mysqli_num_rows($result) > 0)
                                            {
                                                while ($row = mysqli_fetch_assoc($result))
                                                {
                                                    $sid = $row['student_id']; 
                                        ?>
                                             <?php
                                  }   
                            }
                            ?>
 <?php
                                    include 'functions/connectdb.php';
                                    $sql=  mysqli_query($con, "SELECT * FROM student_info order by lastname ");
                                    while($row = mysqli_fetch_assoc($sql)) {
                                    $sid = $row['student_id'];
                                  

                                    ?>
                                    <tr> 
                                   
                                        <td><?php echo $row['lrn_no'] ?></td>
                                        <td><?php echo $row['lastname'] . ', ' . $row['firstname']. ' ' . $row['middlename'] ?></td>
                                        <td class="d-flex justify-content-center">
                                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#infoModal" ><i class="bi bi-info-circle"></i> Info</button> &nbsp&nbsp&nbsp&nbsp
                                                <a href="form137.php?student=<?php echo $row['student_id'] ?>"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" ><i class="bi bi-eye"></i> Form 137</button></a> &nbsp&nbsp&nbsp&nbsp
                                                <a href="record.php?student=<?php echo $row['student_id'] ?>"><button class="btn btn-danger"><i class="bi bi-archive"></i> Record</button></a>
                                       
                                        
                                        <td><div class="btn-group">
                                            <button type="button" class="btn btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                Status
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                                <li><button class="dropdown-item" type="button">Promoted</button></li>
                                                <li><button class="dropdown-item" type="button">Retained</button></li>
                                                <li><button class="dropdown-item" type="button">Dropped</button></li>
                                            </ul>
                                            </div>
                                        </td>
                                      
                                       
                                    </tr>
                               
                                    <?php
   
                                        } mysqli_close($con);
                                        ?>












<?php
                                    include 'functions/connectdb.php';
                                    $add=  mysqli_query($con, "SELECT student_class.student_id, student_class.class_id, student_info.lrn_no as lrn_num , student_info.lastname as lastn, student_info.firstname as firstn, student_info.middlename as middlen FROM student_class order by lastn 
                                    INNER JOIN student_info ON student_class.student_id = student_info.student_id
                                    INNER JOIN class ON student_class.class_id = class.class_id
                                    INNER JOIN users ON class.adviser_id = users.user_id WHERE class.adviser_id = '$current_user_id' ");
                                    while($row=mysqli_fetch_array($add)){
                                        ?>    


<?php

include 'functions/connectdb.php';
$student = $_GET['student'];
$sql = mysqli_query($con,"SELECT student_class.class_id, student_class.adviser_id, student_class.sy_id, student_class.student_id, 
student_info.lrn_no as lrn, student_info.lastname as last, student_info.firstname as first, student_info.middlename as middle, school_year.school_year as sy, class.grade_id, class.adviser_id, class.section as section, users.lastname as ln, users.firstname as fn, users.middlename as mn FROM student_class
INNER JOIN student_info ON student_class.student_id = student_info.student_id 
INNER JOIN class ON student_class.class_id = class.class_id
INNER JOIN grade ON class.grade_id = grade.grade_id
INNER JOIN users ON student_class.adviser_id = users.user_id
INNER JOIN school_year ON student_class.sy_id = school_year.SY_ID
WHERE student_id = '$student' ");
 while($row = mysqli_fetch_array($sql)) {

    $count = mysqli_num_rows($sql);

?>
<input type="hidden" id="id<?php echo $row[0] ?>" name="id" value="<?php echo $row[0]; ?>">


<?php	
         }
                                mysqli_close($con);
                                ?>