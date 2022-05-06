<?php 
error_reporting(0);
	include 'functions/connectdb.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$sub=$_POST['sub'];
	$applied_grade=$_POST['applied'];
	$checklist= implode(",",$applied_grade);
	$user= $_SESSION['user_id'];
	if($_POST['id'] == ""){

	if ($sql=mysqli_query($con, "INSERT into subjects (subject, applied_grade) 
		VALUES ( '$sub', '$checklist' )")){
		
	echo "<div id='alertM' class='alert alert-success d-flex align-items-center text-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div class='text-center'>
    Succesfully Created!
    </div>
</div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='subjectlist.php';  }, 2000);</script>";
	} else {
		echo "<div id='alertM' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
        <div class='text-center'>
        Something Went Wrong
        </div>
    </div>";
     "<script>
	 setTimeout(function(){	window.location.href='subjectlist.php';  }, 2000);</script>";
		unset($_POST);

	}

}
	}
	mysqli_close($con);

 ?>

