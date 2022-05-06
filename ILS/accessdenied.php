<?php 

   session_start();
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
        <title>Access Denied </title>

       

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
        .func{
           
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
        </style>
    </head>
    <body>
    <div class="d-flex flex-column min-vh-100">
       
        <section>
            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 m-auto">
                        <div class="card text-dark bg-light border-danger shadow">
                            <div class="card-body text-center">
                                <div style="font-size:8rem" ><i class="bi bi-lock-fill" style="color:red" ></i></div>
                                <h4 >Access Denied</h4>
                                <p>The Page you are trying to access is restricted.</p>
                                <button onClick="history.go(-1);" class="btn btn-primary" >Go Back</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
        </section>
     
     
    </div>
    </body>
</html>