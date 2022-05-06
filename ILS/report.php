<!DOCTYPE html>
<html>
<head>
    

    <title>Report Card</title>

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
		margin-top:20px;
		margin-bottom:30px;
		margin-right:50px;
		margin-left:50px;
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
		<p><center><b>Republic of the Philippines</b></center></p>
        <p ><center><b style="color:red;">WESTERN MINDANAO STATE UNIVERSITY</b></center></p>
        <p><center><b style="font-size:10;">College of Teacher Education Intregrated Laboratory School</b></center></p>
        <p><center><b >JUNIOR HIGH SCHOOL</b></center></p>
        <p><center><b style="font-size:10;">Zamboanga City</b></center></p>

		  </div>
		  <div class="row">
		  <div class="col-md-12">
		  <center><p><b><h6>PROGRESS REPORT CARD</h6></b></p></center>
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
          <td style="width:1000px;font-size:12px">
					<label for="" style="">Name:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:12px"><?php echo $row['lastname'] . ', ' . $row['firstname']. ' ' . $row['middlename'] ?></b>
					<br>
					
				</td>
         </table>

		  <table style="line-height:5mm">
			<tr>
            
				<td style="width:600px;font-size:12px">
					<label for="" style="">Grade:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:13px;text-transform: uppercase;">7</b>
					<br>
					<label for="">School Year:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:12px">2022-2023</h>
					
				</td>
				<td style="width:600px;font-size:12px">
				<label for="">Section:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:12px">A</b>
					<br>
					<label for="">LRN:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<b style="font-size:12px"><?php echo $row['lrn_no'] ?></b>
				</td>
                
				
			</tr>

			
			</table> 
		
		
		  </div>
          <?php
   
} mysqli_close($con);
?>
          </div>
          <p style="float:left; font-size:12px;"> Dear Parents,
               </p> <br>
          <p style=" float:left; text-align:justify; font-size:12px;"> 
            &nbsp&nbsp&nbsp&nbsp This report card shows the ability and progress of your child has made in the different learning areas.
            The school welcomes you should you desire to know more about your child's progress. </p>

          <table class="table table-bordered" style="font-size:12px;">
                                
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
                                <?php

                                    include 'functions/connectdb.php';
                                    $student = $_GET['student'];
                                    $query = mysqli_query($con,"SELECT total_grade_subject.tgs_id, total_grade_subject.subject_id, total_grade_subject.sy_id, total_grade_subject.1st_grading, total_grade_subject.2nd_grading, total_grade_subject.3rd_grading, total_grade_subject.4th_grading, total_grade_subject.final_grade, total_grade_subject.remarks, subjects.subject as sub, school_year.school_year, school_year.status FROM total_grade_subject 
                                    INNER JOIN subjects ON total_grade_subject.subject_id = subjects.subject_id 
                                    INNER JOIN school_year ON total_grade_subject.sy_id = school_year.SY_ID
                                    WHERE student_id = '$student' && school_year.status='Yes' ");
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
                                    $student = $_GET['student'];
                                  
                                    $query = mysqli_query($con,"SELECT * FROM student_class_info WHERE student_id = '$student' ");
                                    while($row = mysqli_fetch_assoc($query)) {{


                                    ?>
                                <td><?php echo $row['gen_ave'] ?></td>
                                <td></td>
                                <?php
                         } }
                                mysqli_close($con);
                                ?>
                                </tr>
                                </tbody>
                                </table>

    
	
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