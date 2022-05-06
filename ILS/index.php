<?php


session_start();
require_once 'functions/checklogin.php';
require_once 'functions/connectdb.php';

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
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        

        <!-----------JSLOADER------------------>
        <script src="assets/js/load.js"></script>

        <title>login </title>

        <!-----------Need to refract into prepared statements, didn't prioritize security because the focus is on the functionality of the system within a given amount of time tehee -azgiraffe------------------>
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
        .form-control:focus{
            border-color: #CC5500;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
           
        }
       
        .btn-signin{
            background-color: #CC5500;
            color:white;  
        }
        .btn-signin:hover{
                background-color: #C45302;
                color:white;  
                
            }
        .btn-signin:focus{
            border-color: #CC5500;
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
              
        }

        .footer {
          position: relative;
          bottom: 0;
          width: 100%;
          height: 60px;
          line-height: 60px;
          background-color: #CC5500;
          

        }

        footer span{
            font-size: 12px;
        }
         /*------------------------------------LOADER---------------------------------------------*/
        .loader {
            position: fixed;
            z-index: 99;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

            .loader > img {
                width: 100px;
            }

            .loader.hidden {
                animation: fadeOut 1s;
                animation-fill-mode: forwards;
            }

            @keyframes fadeOut {
                100% {
                    opacity: 0;
                    visibility: hidden;
                }
            }
        </style>
    </head>
    <body style="background-color:#FFF3E0;">
    <div class="loader">
    <img src="assets/loader.gif" alt="Loading..." />
    </div>  
    <div class="d-flex flex-column min-vh-100">
        <nav class="navbar bg-light shadow-sm">
            <div class="navbar-brand">
            <img class="logo-navbar" width="30" height="30" src="assets/logo.png"> ILS JHS 
            </div>
          </nav>
        <section>
            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 m-auto">
                        <div class="card text-dark bg-light border-0 shadow">
                            <div class="card-body">
                                <h4 >Please Sign in</h4>
                                <div class="func">
                                <?php
                                    include("functions/connectdb.php");
                                    include("functions/func.php");


                                    if($_SERVER['REQUEST_METHOD'] == "POST")
                                    {
                                        
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];

                                        if(!empty($username) && !empty($password) && !is_numeric($username))
                                        {
                                           
                                            $query = "select * from users where username = '$username' limit 1";
                                            $result = mysqli_query($con,$query);
                                            

                                            if($result)
                                            {
                                                if($result && mysqli_num_rows($result) > 0)
                                                {
                                                
                                                    $data = $result->fetch_array();
                                                if (password_verify($password, $data['password']))
                                                    {

                                                        $_SESSION['user_id'] = $data['user_id'];
                                                       
                                                    
                                                        if($data["user_type"]=="admin")
                                                        {
                                                            $_SESSION['username']=$username;
                                                            $_SESSION['user_type']="admin";
                                                            header("Location: dashboard.php");
                                                        die;
                                                        }
                                                        elseif($data["user_type"]=="user")
                                                        {
                                                            $_SESSION['username']=$username;
                                                            $_SESSION['user_type']="user";

                                                            header("Location: adviserindex.php");
                                                        die;
                                                        }
                                                    
                                                    }
                                                }
                                            }
                                            
                                            echo "<div id='alertM'class='alert alert-danger d-flex align-items-center text-center' role='alert'>
                                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                                            <div class='text-center'>
                                            Username or Password Does Not Match.
                                            </div>
                                        </div>";
                                        }else
                                        {
                                            echo "<div id='alertM' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
                                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                                            <div class='text-center'>
                                            Enter Username or Password.
                                            </div>
                                        </div>";
                                        }
                                    }
                                   
                                    ?>
                                </div>
                                <form method="POST">
                                    <input type="text" autocomplete="off" name="username" id="" class="form-control my-3 py-2" placeholder="Username"/>
                                    <div class="input-group mb-3">
                                    <input type="password" name="password" id="password" class="form-control" aria-describedby="inputGroupPrepend" placeholder="Password"/>
                                    <span class="input-group-text">
                                            <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer"></i>
                                        </span>
                                    </div>     
                                    <div class="text-center mt-3">
                                   
                                        <input class="btn btn-signin" name="submit" type="submit" value="Sign in" />
                                           
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5 pt-5 " style="margin-bottom:1rem;">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 m-auto">
                        <div class="card text-dark bg-light border-0 shadow">
                            <div class="card-body forgot">
                                <h5>Forgot Password?</h5>
                                <p>Request Administrator to reset the Password.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
     
         <!-- Footer -->
         <footer class="footer sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>WMSU Integrated Laboratory School Junior Highschool &copy; 2022</span>
                </div>
                </div>
                </footer>
                <!-- End of Footer -->
          
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>      
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
            $('#alertM').alert('close');
        }, 5000);
    });
 
    </script>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");

            togglePassword.addEventListener("click", function () {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
                
                // toggle the icon
                this.classList.toggle("bi-eye");
            });

            
    </script>
    </body>
</html>