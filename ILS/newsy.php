<?php 

	include 'functions/connectdb.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	

 
	$sy=$_POST['sy'];

	$user = $_SESSION['user_id'];
	
	if($_POST['id'] == ""){
	

	if ($sql=mysqli_query($con, "INSERT into school_year (school_year, status) 
		VALUES ( '$sy', 'No' )")) { 
			
			mysqli_query($con, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added $sy in the school year list','$user',NOW() )");
	echo "<div  class='alert alert-success d-flex align-items-center text-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div class='text-center'>
    Succesfully Created!
    </div>
</div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='schoolyearlist.php';  }, 2000);</script>";
	} else {
		echo "<div  class='alert alert-danger d-flex align-items-center text-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
        <div class='text-center'>
        Something Went Wrong
        </div>
    </div>";
    echo "<script>
	setTimeout(function(){	window.location.href='schoolyearlist.php';  }, 3000);</script>";
		unset($_POST);
	}
	}
}



	mysqli_close($con);

 ?>