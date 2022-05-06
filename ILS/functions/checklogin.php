<?php 

error_reporting(0);
if($_SESSION['user_type']=="admin") {
	header('location: dashboard.php');
    die;	
} 
elseif($_SESSION['user_type']=="user") {
	header('location: adviserindex.php');
    die;	
} 
?>