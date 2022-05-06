<?php
include("functions/connectdb.php"); 
error_reporting(0);
if(isset($_POST['updatestatus']))
{
    $studentid=$_POST['studentid'];
    $sy_id=$_POST['sy_id'];
    $actionstatus=$_POST['actionstatus'];
    $gradel=$_POST['gradelevel'];
    $current=$_POST['current'];
	$class=$_POST['class'];
    $yearid=$_POST['yearid'];

    if($_POST['id'] == ""){	
		
		switch ($actionstatus){
			case '1':
                $action='PROMOTED';
                $classified=$gradel+1;
                $sql=mysqli_query($con,"UPDATE student_class_info SET to_be_classified ='$classified', action ='$action' WHERE student_id = '$studentid' AND syl= '$sy_id'");
                $sql=mysqli_query($con,"UPDATE student_status SET classified_as ='$classified', status ='$action'WHERE student_id = '$studentid' AND sy_id= '$sy_id'");
            
                echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                <div class='text-center'>
                Succesfully Update Student Status
                </div>
                </div>";
            
                echo "<script>
                document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
                setTimeout(function(){ window.location.href='record.php?student=$studentid&current=$current&class=$class&yearid=$yearid'; }, 2000);</script>";
                break;
				

			case '2':
                $action='RETAINED';
                $classified=$gradel;
                $sql=mysqli_query($con,"UPDATE student_class_info SET to_be_classified ='$classified', action ='$action' WHERE student_id = '$studentid' AND syl= '$sy_id'");
                $sql=mysqli_query($con,"UPDATE student_status SET classified_as ='$classified', status ='$action'WHERE student_id = '$studentid' AND sy_id= '$sy_id'");
            
                echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                <div class='text-center'>
                Succesfully Update Student Status
                </div>
                </div>";
            
                echo "<script>
                document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
                setTimeout(function(){ window.location.href='record.php?student=$studentid&current=$current&class=$class&yearid=$yearid'; }, 2000);</script>";
                break;
				

			case '3':
                $action='DROPPED';
                $classified=$gradel;
                $sql=mysqli_query($con,"UPDATE student_class_info SET to_be_classified ='$classified',action ='$action' WHERE student_id = '$studentid' AND syl= '$sy_id'");
                $sql=mysqli_query($con,"UPDATE student_status SET classified_as ='$classified', status ='$action'WHERE student_id = '$studentid' AND sy_id= '$sy_id'");
            
                echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                <div class='text-center'>
                Succesfully Update Student Status
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