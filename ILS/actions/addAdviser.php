<?php 
	error_reporting(0);
	include("functions/connectdb.php"); 
    include("functions/func.php");

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $lastname = $_POST['lname']; 
    $firstname = $_POST['fname'];
	$middlename = $_POST['mname'];
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword']; 
	$user = $_SESSION['user_id'];
	if($_POST['id'] == ""){
        $user_type = "user";
        $access = 2;
        $hash = password_hash($password, PASSWORD_BCRYPT);

	if ($sql=mysqli_query($con, "INSERT into users (lastname,firstname,middlename,username,password,user_type, access) 
    VALUES ('$lastname','$firstname', '$middlename', '$username','$hash','$user_type', '$access')")){
		mysqli_query($con, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added $username in the adviser list','$user',NOW() )");
	echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div class='text-center'>
    Succesfully Created!
    </div>
</div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='adviserlist.php';  }, 2000);</script>";
	} else {
		echo "<div id='add-adviser-messages' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
        <div class='text-center'>
        Confirm Password Doesn't Match
        </div>
    </div>";
    echo "<script>
	setTimeout(function(){	window.location.href='adviserlist.php';  }, 3000);</script>";
		unset($_POST);


	}
	}
}


	mysqli_close($con);

 ?>