<?php



    include("functions/connectdb.php");
    include("functions/func.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cPassword = $_POST['cPassword'];

        if(!empty($lastname) && !empty($firstname) && !empty($username) && !empty($password) && !is_numeric($lastname) && !is_numeric($firstname) && (pwdMatch($password, $cPassword) !== true))
        {	

            //save to database
            $user_id = random_num(20);
			$hash = password_hash($password, PASSWORD_BCRYPT);
            $query = "insert into users (user_id,lastname,firstname,username,password) values ('$user_id','$lastname','$firstname','$username','$hash')";
            
            mysqli_query($con,$query);

            
            header("Location: login.php");
             die;
           
		
        }else 
        {
            echo "Please enter some valid information!";
        }
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <!--- meta tags --->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

         <!--logo-->
         <link rel="shortcut icon" href="assets/logo.png">
        <!--Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>register </title>

       

        <style>
        html{
            height: 100%;
        }
        body{
            margin:0;
            min-height: 100%;
            
        }
        .navbar-brand{
            margin-left: 2rem;
            color: #CC5500;
        }


        .footer {
 
          bottom: 0;
          width: 100%;
          height: 60px;
          line-height: 60px;
          background-color: #CC5500;
          

        }

        footer span{
            font-size: 12px;
        }
        </style>
    </head>
    <body>
        <nav class="navbar bg-light shadow-sm">
            <div class="navbar-brand">
            <img class="logo-navbar" width="30" height="30" src="assets/logo.png"> ILS JHS
            </div>
          </nav>
        <section>
            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 m-auto">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h4>Please Sign Up</h4>
                                <form method="POST">
                                    <input type="text" name="lastname" id="" class="form-control my-3 py-2" placeholder="lastname"/>
                                    <input type="text" name="firstname" id="" class="form-control my-3 py-2" placeholder="firstname"/>
                                    <input type="text" name="username" id="" class="form-control my-3 py-2" placeholder="Username"/>
                                    <input type="password" name="password" id="" class="form-control my-3 py-2" placeholder="Password"/>
                                    <input type="password" name="cPassword" id="" class="form-control my-3 py-2" placeholder="Confirm Password"/>
                                    <div class="text-center mt-3">
                                    <input class="btn btn-primary" name="submit" type="submit" value="Sign Up" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 m-auto">
                        <div class="card border-0 shadow">
                            <div class="card-body forgot">
                                <h5>Forgot Password?</h5>
                                <p>Request Administrator to reset the Password.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
     
        <footer class="footer fixed-bottom">
              <div class="container">
                <span >WMSU Integrated Laboratory School Junior Highschool</span>
             </div>
          </footer>
        
    </body>
</html>