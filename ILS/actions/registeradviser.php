<?php

include("functions/connectdb.php");
include("functions/func.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $output = '';
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];
  

    if(!empty($lastname) && !empty($firstname) && !empty($username) && !empty($password) && !is_numeric($lastname) && !is_numeric($firstname) && (pwdMatch($password, $cPassword) !== true))
    {	

        //save to database
        $user_id = random_num(20);
        $user_type = "user";
        $access = 2;
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "insert into users (user_id,lastname,firstname,username,password,user_type, access) values ('$user_id','$lastname','$firstname','$username','$hash','$user_type', '$access')";
        
        mysqli_query($con,$query);



        
        echo "<div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
        <div class='text-center'>
        Succesfully Created!
        </div>
    </div>";
      

    }else 
    {
      echo "<div id='alertM' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
      <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
      <div class='text-center'>
      Confirm Password Doesn't Match.
      </div>
  </div>";
    }
}

?>