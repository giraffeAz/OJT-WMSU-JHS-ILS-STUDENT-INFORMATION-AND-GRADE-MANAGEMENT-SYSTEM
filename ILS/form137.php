<!DOCTYPE html>
<html>
<head>
    

    <title>FORM 137</title>

     <!--logo-->
     <link rel="shortcut icon" href="assets/logo.png">

     <!--Bootstrap CSS-->
     <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

     <?php require_once 'page_sections/scripts.php'; ?> 
	<style>
	@media print {  
		@page {
			size:8.5in 13in;
            margin: 0;
		}
		head{
			height:0px;
			display: none;
		}
		#head{
			display: none;
			height:0px;
		}
		#print{
		position:fixed;
		top:0px;
		margin-top:10px;
		margin-bottom:5px;
		margin-right:5px;
		margin-left:5px;
		}
		}
		#print{
		width:7.5in;
		}
		input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
}

.foo{
	font-family: "Bodoni MT", Didot, "Didot LT STD", "Hoefler Text", Garamond, "Times New Roman", serif;
	font-size: 24px;
	font-style: italic;
	font-variant: normal;
	font-weight: bold;
	line-height: 24px;
	}
	.p {
	font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
	font-size: 14px;
	font-style: italic;
	font-variant: normal;
	font-weight: 550;
	line-height: 20px;
	 letter-spacing: 2px;
}
        .btn-add{
            background-color: #CC5500;
            color: white;
        }
        .btn-add:hover{
            background-color: #C45302;
            color:white;  
                
        }
        .btn-add:focus{
            border-color: #CC5500;
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
              
        }
	</style>

</head> 
<body style="background-color:white"> 
<span id='returncode'></span>
<div class="col-md-2" id="head" style="float:right; margin-top:1rem;">
	<button class="btn btn-add btn-record" onclick="print()"><i class="bi bi-printer"></i></i> Print</button>
	<a class="btn btn-add btn-record" onClick="history.go(-1);"> Cancel</a>
	
</div>
<center>
<div id='print'>
<div style="margin-left:.5in;margin-right:.5in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;">
        <img class="logo-navbar" width="80" height="80" style="float:left" src="assets/wmsu.png">
        <img class="logo-navbar" width="80" height="80" style="float:right" src="assets/logo.png">
		<p><center>Republic of the Philippines</center></p>
        <p ><center><b style="color:red;">WESTERN MINDANAO STATE UNIVERSITY</b></center></p>
        <p><center><b style="font-size:10;">College of Teacher Education Intregrated Laboratory School</b></center></p>
        <p><center><i >High School Department</i></center></p>
        <p><center><b style="font-size:10;">Zamboanga City</b></center></p>

		  </div>
		  <div class="row">
		  <div class="col-md-12" style="line-height:5mm" >
		  <center><p><b><h6>Learner's Permanent Academic Record for Junior High School</h6></b></p></center>
          <center><p><b><h6>(SF10 - JHS)</h6></b></p></center>
		  </div>
          </div>
          <div class="row">
          <?php
                                    include 'functions/connectdb.php';
                                    $student = $_GET['student'];
                                    $sql=  mysqli_query($con, "SELECT * FROM student_info WHERE  student_id = '$student' ");
                                    while($row = mysqli_fetch_assoc($sql)) {
                                   
                                  

                                    ?>
		  <div class="col-md-12">

          <table style="line-height:5mm">
          <tr>
          <td style="width:1000px;font-size:12px">
					<label for="" style="">LAST NAME:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:12px; text-transform: uppercase;"><?php echo $row['lastname']?></b>
					
				</td>
                <td style="width:1000px;font-size:12px">
					

					<label for="">FIRST NAME:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:12px; text-transform: uppercase;"><?php echo $row['firstname']?></b>
                    

				</td>
                <td style="width:1000px;font-size:12px">
	
                    <label for="">MIDDLE NAME:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:12px; text-transform: uppercase;"><?php echo $row['middlename']?></b>
				</td>
            </tr>
         </table>

		  <table style="line-height:5mm">
			<tr>
            
				<td style="width:600px;font-size:12px">
					<label for="" style="">LRN:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:13px;text-transform: uppercase;"><?php echo $row['lrn_no']?></b>
					<br>
                  
					
				</td>
				<td style="width:600px;font-size:12px">
				<label for="">Date of Birth:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:10px"><?php echo $row['date_of_birth']?></b>
					<br>
                   
				</td>
                <td style="width:600px;font-size:12px">
				<label for="">Sex:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:12px;text-transform: uppercase;"><?php echo $row['sex']?></b>
					<br>
					
				</td>
                <td style="width:600px;font-size:12px">
				<label for="">Gen. Ave:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:12px;text-transform: uppercase;"><?php echo $row['gen_ave']?></b>
					<br>
					
				</td>
                
				
			</tr>

			
			</table> 
            <table style="line-height:5mm">
			<tr>
            
				<td style="width:900px;font-size:12px">
				
                    <label for="" style="">Name of School:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:10px;"><?php echo $row['elementary_school']?></b>
					<br>
					
				</td>
				<td style="width:600px;font-size:12px">
				
                    <label for="" style="">School Address:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:10px;"><?php echo $row['school_address']?></b>
					<br>
				</td>
                <td style="width:600px;font-size:12px">
				<label for="">School ID:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:12px;text-transform: uppercase;"><?php echo $row['school_id']?></b>
					<br>
					
				</td>
                
                
				
			</tr>

			
			</table> 
			
			
			
		
		  </div>
          <?php
   
} mysqli_close($con);
?>
          </div>
         
          <table class="table table-bordered" style="font-size:12px;">
          <thead class="text-center">
                                <tr>
                                <th rowspan=2 colspan=7 scope="col">
                                    <p class="text-start" style="font-weight:normal;">&nbsp &nbsp School: <u style="font-weight:bold;">Western Mindanao State University  - ILS High School</u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   School ID: <u style="font-weight:bold;">600136</u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  Disctrict: <u style="font-weight:bold;">Baliwasan</u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   Division: <u style="font-weight:bold;">Zamboanga City</u>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   Region: <u style="font-weight:bold;">IX</u><p> 
                                    <p class="text-start" style="font-weight:normal;">&nbsp &nbsp Classified as Grade: <u style="font-weight:bold;">   7   </u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Section: <u style="font-weight:bold;">   A   </u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp School Year: <u style="font-weight:bold;">   2022-2023   </u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Name of Adviser: <u style="font-weight:bold;">   Name of Class Adviser        </u> <p>   

                                </th>
                                </tr>

                                </thead>   
                                <thead class="text-center">
                                <tr>
                                <th rowspan=2 scope="col">LEARNING AREAS</th>
                                <th colspan=4 scope="col">QUARTER</th>
                                <th rowspan=2 scope="col">FINAL RATING</th>
                                <th rowspan=2 scope="col">REMARKS</th>
                                </tr>
                                <tr>
                              
                                <th scope="col">1</th>
                                <th scope="col">2</th>
                                <th scope="col">3</th>
                                <th scope="col">4</th>
                                
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <?php

                                    include 'functions/connectdb.php';
                                    $student = $_GET['student'];
                                    $query = mysqli_query($con,"SELECT total_grade_subject.tgs_id, total_grade_subject.subject_id, total_grade_subject.sy_id, total_grade_subject.1st_grading, total_grade_subject.2nd_grading, total_grade_subject.3rd_grading, total_grade_subject.4th_grading, total_grade_subject.final_grade, total_grade_subject.remarks, subjects.subject as sub, school_year.school_year, school_year.status FROM total_grade_subject 
                                    INNER JOIN subjects ON total_grade_subject.subject_id = subjects.subject_id 
                                    INNER JOIN school_year ON total_grade_subject.sy_id = school_year.SY_ID
                                    WHERE student_id = '$student' && gclevel= '7'");
                                    while($row = mysqli_fetch_assoc($query)) {{
                                    
                                    
                                    

                                ?>
                                   <tr>
                                
                                <input type="hidden" id="id<?php echo $row[0] ?>" name="id" value="<?php echo "$last_id"; ?>">
                                <th scope="row"><?php echo $row['sub'] ?></th>

 
                                <td class="text-center"><?php echo $row['1st_grading'] ?></td>
                                <td class="text-center"><?php echo $row['2nd_grading'] ?></td>
                                <td class="text-center"><?php echo $row['3rd_grading'] ?></td>
                                <td class="text-center"><?php echo $row['4th_grading'] ?></td>
                                <td class="text-center" name="final_grade"><?php echo $row['final_grade'] ?></td>
                                <td class="text-center" name="remarks"><?php echo $row['remarks'] ?></td>
                               
                                    
                               
                                </tr>  <?php
                         } }
                                mysqli_close($con);
                                ?>
                                </tr>
                                
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                               
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                 </tr>
                                 <tr>
                                <th colspan=5 scope="row" class="text-end">General Average</th>
                                <?php

include 'functions/connectdb.php';


$query = mysqli_query($con,"SELECT student_class_info.student_id,student_class_info.gen_ave, student_class_info.action, student_class_info.syl, school_year.sy_id, school_year.status FROM student_class_info 
INNER JOIN school_year ON student_class_info.syl = school_year.sy_id
WHERE student_id = '$student' && gradelevel = '7' ");
while($row = mysqli_fetch_assoc($query)) {{


?>
                                <td><?php echo $row['gen_ave'] ?></td>
                               
                                <td><?php echo $row['action'] ?></td>
                                <?php
                                            
                         } }
                                mysqli_close($con);
                                ?>
                                </tr>
                                </tbody>
                                </table>
                                <table class="table table-bordered" style="font-size:12px;">
                                <thead >
                                <tr>
                                <th   scope="col">Remedial Classes</th>
                                <th  colspan=6 scope="col">conducted from (mm/dd/yyyy)_______ to  (mm/dd/yyyy) _______</th>
                                <th   scope="col"></th>
                                </tr>

                                </thead>   
                                <thead class="text-center">
                                <tr>
                                <th  scope="col">Learning Areas</th>
                                <th  colspan=2 scope="col">Final Rating</th>
                                <th  colspan=2 scope="col">Remedial Class Mark</th>
                                <th  colspan=2 scope="col">Recomputed Final Grade</th>
                                <th  scope="col">REMARKS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                
                                </tbody>
                                </table>

    <!-----GRADE 8--------------------------------------------------------------------------------------------------------------------------->
    <table class="table table-bordered" style="font-size:12px;">
          <thead class="text-center">
                                <tr>
                                <th rowspan=2 colspan=7 scope="col">
                                    <p class="text-start" style="font-weight:normal;">&nbsp &nbsp School: <u style="font-weight:bold;">Western Mindanao State University  - ILS High School</u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   School ID: <u style="font-weight:bold;">600136</u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  Disctrict: <u style="font-weight:bold;">Baliwasan</u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   Division: <u style="font-weight:bold;">Zamboanga City</u>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   Region: <u style="font-weight:bold;">IX</u><p> 
                                    <p class="text-start" style="font-weight:normal;">&nbsp &nbsp Classified as Grade: <u style="font-weight:bold;">   8   </u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Section: <u style="font-weight:bold;">   A   </u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp School Year: <u style="font-weight:bold;">   2023-2024   </u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Name of Adviser: <u style="font-weight:bold;">   Name of Class Adviser        </u> <p>   

                                </th>
                                </tr>

                                </thead>   
                                <thead class="text-center">
                                <tr>
                                <th rowspan=2 scope="col">LEARNING AREAS</th>
                                <th colspan=4 scope="col">QUARTER</th>
                                <th rowspan=2 scope="col">FINAL RATING</th>
                                <th rowspan=2 scope="col">REMARKS</th>
                                </tr>
                                <tr>
                              
                                <th scope="col">1</th>
                                <th scope="col">2</th>
                                <th scope="col">3</th>
                                <th scope="col">4</th>
                                
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <?php

                                    include 'functions/connectdb.php';
                                    $student = $_GET['student'];
                                    $query = mysqli_query($con,"SELECT total_grade_subject.tgs_id, total_grade_subject.subject_id, total_grade_subject.sy_id, total_grade_subject.1st_grading, total_grade_subject.2nd_grading, total_grade_subject.3rd_grading, total_grade_subject.4th_grading, total_grade_subject.final_grade, total_grade_subject.remarks, subjects.subject as sub, school_year.school_year, school_year.status FROM total_grade_subject 
                                    INNER JOIN subjects ON total_grade_subject.subject_id = subjects.subject_id 
                                    INNER JOIN school_year ON total_grade_subject.sy_id = school_year.SY_ID
                                    WHERE student_id = '$student' && gclevel= '8' ");
                                    while($row = mysqli_fetch_assoc($query)) {{
   
                                ?>


                                   <tr>
                                
                                <input type="hidden" id="id<?php echo $row[0] ?>" name="id" value="<?php echo "$last_id"; ?>">
                                <th scope="row"><?php echo $row['sub'] ?></th>

 
                                <td class="text-center"><?php echo $row['1st_grading'] ?></td>
                                <td class="text-center"><?php echo $row['2nd_grading'] ?></td>
                                <td class="text-center"><?php echo $row['3rd_grading'] ?></td>
                                <td class="text-center"><?php echo $row['4th_grading'] ?></td>
                                <td class="text-center" name="final_grade"><?php echo $row['final_grade'] ?></td>
                                <td class="text-center" name="remarks"><?php echo $row['remarks'] ?></td>
                               
                                    
                               
                                </tr>  <?php
                         } }
                                mysqli_close($con);
                                ?>
                                </tr>
                                
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                               
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                 </tr>
                                 <tr>
                                <th colspan=5 scope="row" class="text-end">General Average</th>
                                <?php

include 'functions/connectdb.php';


$query = mysqli_query($con,"SELECT student_class_info.student_id,student_class_info.gen_ave, student_class_info.action, student_class_info.syl, school_year.sy_id, school_year.status FROM student_class_info 
INNER JOIN school_year ON student_class_info.syl = school_year.sy_id
WHERE student_id = '$student' && gradelevel = '8'");
while($row = mysqli_fetch_assoc($query)) {{


?>
                                <td><?php echo $row['gen_ave'] ?></td>
                               
                                <td><?php echo $row['action'] ?></td>
                                <?php
                                            
                         } }
                                mysqli_close($con);
                                ?>
                                </tr>
                                </tbody>
                                </table>
                                <table class="table table-bordered" style="font-size:12px;">
                                <thead >
                                <tr>
                                <th   scope="col">Remedial Classes</th>
                                <th  colspan=6 scope="col">conducted from (mm/dd/yyyy)_______ to  (mm/dd/yyyy) _______</th>
                                <th   scope="col"></th>
                                </tr>

                                </thead>   
                                <thead class="text-center">
                                <tr>
                                <th  scope="col">Learning Areas</th>
                                <th  colspan=2 scope="col">Final Rating</th>
                                <th  colspan=2 scope="col">Remedial Class Mark</th>
                                <th  colspan=2 scope="col">Recomputed Final Grade</th>
                                <th  scope="col">REMARKS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                
                                </tbody>
                                </table>
 <!-----GRADE 9------------------------------------------------------------------------------------------------------------------------------------->
 <table class="table table-bordered" style="font-size:12px;">
          <thead class="text-center">
                                <tr>
                                <th rowspan=2 colspan=7 scope="col">
                                    <p class="text-start" style="font-weight:normal;">&nbsp &nbsp School: <u style="font-weight:bold;">Western Mindanao State University  - ILS High School</u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   School ID: <u style="font-weight:bold;">600136</u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  Disctrict: <u style="font-weight:bold;">Baliwasan</u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   Division: <u style="font-weight:bold;">Zamboanga City</u>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   Region: <u style="font-weight:bold;">IX</u><p> 
                                    <p class="text-start" style="font-weight:normal;">&nbsp &nbsp Classified as Grade: <u style="font-weight:bold;">   9   </u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Section: <u style="font-weight:bold;">   A   </u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp School Year: <u style="font-weight:bold;">   2024-2025   </u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Name of Adviser: <u style="font-weight:bold;">   Name of Class Adviser        </u> <p>   

                                </th>
                                </tr>

                                </thead>   
                                <thead class="text-center">
                                <tr>
                                <th rowspan=2 scope="col">LEARNING AREAS</th>
                                <th colspan=4 scope="col">QUARTER</th>
                                <th rowspan=2 scope="col">FINAL RATING</th>
                                <th rowspan=2 scope="col">REMARKS</th>
                                </tr>
                                <tr>
                              
                                <th scope="col">1</th>
                                <th scope="col">2</th>
                                <th scope="col">3</th>
                                <th scope="col">4</th>
                                
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <?php

                                    include 'functions/connectdb.php';
                                    $student = $_GET['student'];
                                    $query = mysqli_query($con,"SELECT total_grade_subject.tgs_id, total_grade_subject.subject_id, total_grade_subject.sy_id, total_grade_subject.1st_grading, total_grade_subject.2nd_grading, total_grade_subject.3rd_grading, total_grade_subject.4th_grading, total_grade_subject.final_grade, total_grade_subject.remarks, subjects.subject as sub, school_year.school_year, school_year.status FROM total_grade_subject 
                                    INNER JOIN subjects ON total_grade_subject.subject_id = subjects.subject_id 
                                    INNER JOIN school_year ON total_grade_subject.sy_id = school_year.SY_ID
                                    WHERE student_id = '$student' && gclevel = '9'");
                                    while($row = mysqli_fetch_assoc($query)) {{
                                    
                                    
                                    

                                ?>
                                   <tr>
                                
                                <input type="hidden" id="id<?php echo $row[0] ?>" name="id" value="<?php echo "$last_id"; ?>">
                                <th scope="row"><?php echo $row['sub'] ?></th>

 
                                <td class="text-center"><?php echo $row['1st_grading'] ?></td>
                                <td class="text-center"><?php echo $row['2nd_grading'] ?></td>
                                <td class="text-center"><?php echo $row['3rd_grading'] ?></td>
                                <td class="text-center"><?php echo $row['4th_grading'] ?></td>
                                <td class="text-center" name="final_grade"><?php echo $row['final_grade'] ?></td>
                                <td class="text-center" name="remarks"><?php echo $row['remarks'] ?></td>
                               
                                    
                               
                                </tr>  <?php
                         } }
                                mysqli_close($con);
                                ?>
                                </tr>
                                
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                               
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                 </tr>
                                 <tr>
                                <th colspan=5 scope="row" class="text-end">General Average</th>
                                <?php

include 'functions/connectdb.php';


$query = mysqli_query($con,"SELECT student_class_info.student_id,student_class_info.gen_ave, student_class_info.action, student_class_info.syl, school_year.sy_id, school_year.status FROM student_class_info 
INNER JOIN school_year ON student_class_info.syl = school_year.sy_id
WHERE student_id = '$student' && gradelevel = '9'");
while($row = mysqli_fetch_assoc($query)) {{


?>
                                <td><?php echo $row['gen_ave'] ?></td>
                               
                                <td><?php echo $row['action'] ?></td>
                                <?php
                                            
                         } }
                                mysqli_close($con);
                                ?>
                                </tr>
                                </tbody>
                                </table>
                                <table class="table table-bordered" style="font-size:12px;">
                                <thead >
                                <tr>
                                <th   scope="col">Remedial Classes</th>
                                <th  colspan=6 scope="col">conducted from (mm/dd/yyyy)_______ to  (mm/dd/yyyy) _______</th>
                                <th   scope="col"></th>
                                </tr>

                                </thead>   
                                <thead class="text-center">
                                <tr>
                                <th  scope="col">Learning Areas</th>
                                <th  colspan=2 scope="col">Final Rating</th>
                                <th  colspan=2 scope="col">Remedial Class Mark</th>
                                <th  colspan=2 scope="col">Recomputed Final Grade</th>
                                <th  scope="col">REMARKS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                
                                </tbody>
                                </table>
 <!-----GRADE 10----------------------------------------------------------------------------------------------------------------------------->
 <table class="table table-bordered" style="font-size:12px;">
          <thead class="text-center">
                                <tr>
                                <th rowspan=2 colspan=7 scope="col">
                                    <p class="text-start" style="font-weight:normal;">&nbsp &nbsp School: <u style="font-weight:bold;">Western Mindanao State University  - ILS High School</u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   School ID: <u style="font-weight:bold;">600136</u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  Disctrict: <u style="font-weight:bold;">Baliwasan</u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp   Division: <u style="font-weight:bold;">Zamboanga City</u>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   Region: <u style="font-weight:bold;">IX</u><p> 
                                    <p class="text-start" style="font-weight:normal;">&nbsp &nbsp Classified as Grade: <u style="font-weight:bold;">   10   </u> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Section: <u style="font-weight:bold;">   A   </u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp School Year: <u style="font-weight:bold;">   2023-2024   </u>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Name of Adviser: <u style="font-weight:bold;">   Name of Class Adviser        </u> <p>   

                                </th>
                                </tr>

                                </thead>   
                                <thead class="text-center">
                                <tr>
                                <th rowspan=2 scope="col">LEARNING AREAS</th>
                                <th colspan=4 scope="col">QUARTER</th>
                                <th rowspan=2 scope="col">FINAL RATING</th>
                                <th rowspan=2 scope="col">REMARKS</th>
                                </tr>
                                <tr>
                              
                                <th scope="col">1</th>
                                <th scope="col">2</th>
                                <th scope="col">3</th>
                                <th scope="col">4</th>
                                
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <?php

                                    include 'functions/connectdb.php';
                                    $student = $_GET['student'];
                                    $query = mysqli_query($con,"SELECT total_grade_subject.tgs_id, total_grade_subject.subject_id, total_grade_subject.sy_id, total_grade_subject.1st_grading, total_grade_subject.2nd_grading, total_grade_subject.3rd_grading, total_grade_subject.4th_grading, total_grade_subject.final_grade, total_grade_subject.remarks, subjects.subject as sub, school_year.school_year, school_year.status FROM total_grade_subject 
                                    INNER JOIN subjects ON total_grade_subject.subject_id = subjects.subject_id 
                                    INNER JOIN school_year ON total_grade_subject.sy_id = school_year.SY_ID
                                    WHERE student_id = '$student' && gclevel = '10' ");
                                    while($row = mysqli_fetch_assoc($query)) {{
                                    
                                    
                                    

                                ?>
                                   <tr>
                                
                                <input type="hidden" id="id<?php echo $row[0] ?>" name="id" value="<?php echo "$last_id"; ?>">
                                <th scope="row"><?php echo $row['sub'] ?></th>

 
                                <td class="text-center"><?php echo $row['1st_grading'] ?></td>
                                <td class="text-center"><?php echo $row['2nd_grading'] ?></td>
                                <td class="text-center"><?php echo $row['3rd_grading'] ?></td>
                                <td class="text-center"><?php echo $row['4th_grading'] ?></td>
                                <td class="text-center" name="final_grade"><?php echo $row['final_grade'] ?></td>
                                <td class="text-center" name="remarks"><?php echo $row['remarks'] ?></td>
                               
                                    
                               
                                </tr>  <?php
                         } }
                                mysqli_close($con);
                                ?>
                                </tr>
                                
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                               
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                 </tr>
                                 <tr>
                                <th colspan=5 scope="row" class="text-end">General Average</th>
                                <?php

include 'functions/connectdb.php';


$query = mysqli_query($con,"SELECT student_class_info.student_id,student_class_info.gen_ave, student_class_info.action, student_class_info.syl, school_year.sy_id, school_year.status FROM student_class_info 
INNER JOIN school_year ON student_class_info.syl = school_year.sy_id
WHERE student_id = '$student' && gradelevel = '10'");
while($row = mysqli_fetch_assoc($query)) {{


?>
                                <td><?php echo $row['gen_ave'] ?></td>
                               
                                <td><?php echo $row['action'] ?></td>
                                <?php
                                            
                         } }
                                mysqli_close($con);
                                ?>
                                </tr>
                                </tbody>
                                </table>
                                <table class="table table-bordered" style="font-size:12px;">
                                <thead >
                                <tr>
                                <th   scope="col">Remedial Classes</th>
                                <th  colspan=6 scope="col">conducted from (mm/dd/yyyy)_______ to  (mm/dd/yyyy) _______</th>
                                <th   scope="col"></th>
                                </tr>

                                </thead>   
                                <thead class="text-center">
                                <tr>
                                <th  scope="col">Learning Areas</th>
                                <th  colspan=2 scope="col">Final Rating</th>
                                <th  colspan=2 scope="col">Remedial Class Mark</th>
                                <th  colspan=2 scope="col">Recomputed Final Grade</th>
                                <th  scope="col">REMARKS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                
                                </tbody>
                                </table>

<!------------END OF GRADES---------------------------------------------------------------------------------------------------------------->
			<table>
			<tr>
				<td align="left" style="width:500px">
					<h5></h5>
				</td>
				<td style="">
					<table>
						
				
					
					<tr>
						<td>
							&nbsp
						</td>
					</tr>

						<tr>
							<td style="width:250px;border-bottom:1px solid black">
								
							</td>
						</tr>
						<tr>
						<td style="width:250px;">
							<center><h6>Adviser</h6></center>
						</td>
					</tr>
                   
					</table>
				</td>

			</tr>
            <table>
            <tr style="align:left;">
							<td style="width:250px;border-bottom:1px solid black">
								
							</td>
						</tr>
						<tr>
						<td style="width:250px;">
							<center><h6>Principal</h6></center>
						</td>
					</tr>
            </table>
			</table>
         	</td>
         </tr>
         </table>

</div>
</p>


</center>
</body>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;

	$.ajax({
		url:'print_log.php?act=form137&id=<?php echo $_GET['id'] ?>',
		success:function(html){
			$('#returncode').html(html);
		}
	});
}
</script>
</html>