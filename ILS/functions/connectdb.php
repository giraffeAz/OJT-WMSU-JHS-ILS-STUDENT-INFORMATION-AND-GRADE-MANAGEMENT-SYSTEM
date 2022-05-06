<?php

$dbhost ="localhost";
$dbuser ="root";
$dbpass ="";
$dbname ="ils_jhs";

if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("Failed to connect: " . mysqli_connect_error());
}