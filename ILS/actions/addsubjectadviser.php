<?php 



$dbhost ="localhost";
$dbuser ="root";
$dbpass ="";
$dbname ="ils_jhs";

if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("Failed to connect: " . mysqli_connect_error());
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['addsubject'])){

	
	$sub=$_POST['sub'];
	$for=$_POST['applied'];
	$checklist= implode(",",$for);
	
	$sql="INSERT into subjects (subject, `FOR`) VALUES ( '$sub', '$checklist' )";
	$sql_run=mysqli_query($con,$sql);

	if ($sql_run){
		
	echo "<div id='alertM' class='alert alert-success d-flex align-items-center text-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div class='text-center'>
    Succesfully Added Subject!
    </div>
</div>";
	echo "<script>
	document.getElementsByTagName('body')[0].setAttribute('style', 'filter:blur()');
	setTimeout(function(){	window.location.href='record.php?student=$studentid&grade=7&section=A&sy=2022-2023';  }, 2000);</script>";
	} else {
		echo "<div id='alertM' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
        <div class='text-center'>
        Something Went Wrong
        </div>
    </div>";
     "<script>
	 setTimeout(function(){	window.location.href='record.php?student=16&grade=7&section=A&sy=2022-2023';  }, 2000);</script>";
		unset($_POST);


	}
	
}
	

}



 ?>