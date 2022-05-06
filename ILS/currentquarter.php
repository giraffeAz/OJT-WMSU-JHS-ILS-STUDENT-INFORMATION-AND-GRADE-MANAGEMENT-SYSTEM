<?php 

	include 'functions/connectdb.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	

 
	$quarter=$_POST['qt'];

	$user = $_SESSION['user_id'];
	
	if($_POST['id'] == ""){
	

	if ($sql=mysqli_query($con, "INSERT into quarter (quarter_name, status) 
		VALUES ( '$quarter', 'No' )")) { 
			
			mysqli_query($con, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added $quarter in the manage quarter','$user',NOW() )");
	echo "<div  class='alert alert-success d-flex align-items-center text-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div class='text-center'>
    Succesfully Created!
    </div>
</div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='managequarter.php';  }, 2000);</script>";
	} else {
		echo "<div  class='alert alert-danger d-flex align-items-center text-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
        <div class='text-center'>
        Something Went Wrong
        </div>
    </div>";
    echo "<script>
	setTimeout(function(){	window.location.href='managequarter.php';  }, 3000);</script>";
		unset($_POST);
	}
	}else{ 
		$id=$_POST['id'];
		$status=$_POST['status'];
		$sql = "UPDATE quarter SET quarter_name='$quarter',status='$status' WHERE quarter_id='$id'";
		$sql2 = mysqli_query($con,"UPDATE quarter SET status='No' WHERE quarter_id != '$id'");
		if($status == 'Yes'){
			
			
			$query = mysqli_query($con,"SELECT * FROM quarter where quarter_id = '$id' ");
			$data = mysqli_fetch_assoc($query);
			$qt= $data['quarter_name'];
		$sql3=mysqli_query($con, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $qt as the current quarter ','$user',NOW() )");
	}

		if (mysqli_query($con, $sql)) {
			echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div class='text-center'>
            Succesfully Updated!
            </div>
        </div>";
			echo "<script>
			setTimeout(function(){	window.location.href='managequarter.php';  }, 2000);</script>";

		} else {
    echo "Error updating record: " . mysqli_error($con);
		}
	}
}else{
	echo "<script>setTimeout(function(){	$('.alert').hide()  }, 3000);</script>";
}



	mysqli_close($con);

 ?>