<?php 
	error_reporting(0);
	include 'functions/connectdb.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	

	$grade=$_POST['grade'];
	$adviser=$_POST['adviser'];   
    $sec=$_POST['section']; 
	$user = $_SESSION['user_id'];
	if($_POST['id'] == ""){

	if ($sql=mysqli_query($con, "INSERT into class (grade_id, adviser_id, section) 
		VALUES ( '$grade', '$adviser', '$sec' )")){
		
	echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div class='text-center'>
    Succesfully Created!
    </div>
</div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='manageclass.php';  }, 2000);</script>";
	} else {
		echo "<div id='add-adviser-messages' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
        <div class='text-center'>
        Something Went Wrong
        </div>
    </div>";
    echo "<script>
	setTimeout(function(){	window.location.href='manageclass.php';  }, 3000);</script>";
		unset($_POST);


	}
	}
}


	mysqli_close($con);

 ?>