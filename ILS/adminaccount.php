<?php 

require_once 'functions/session.php';

if($_SESSION['user_type']!="admin")
{
    
    header("Location: accessdenied.php");
    die;
  

}
 require_once 'functions/connectdb.php'; 
 require_once 'actions/db.php'; 

?>
<?php 
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();
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
        <!-- Font -->
        <link href="assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Table -->
        <link href="assets/css/table.css" rel="stylesheet">

        <!-- Datatables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

         <!-- jquery -->
        <script src="assets/jquery/jquery.min.js"></script>
        <!-- jquery ui -->  
        <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
        <script src="assets/jquery-ui/jquery-ui.min.js"></script>
         <!-----------JSLOADER------------------>
         <script src="assets/js/load.js"></script>
        <title>home</title>

       
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
        .addsection{
       
          margin-right: 2rem;
        }
        .container-section{
            margin-left:2.5rem;
        }
        .sydropdownbox{
          float:right;
          margin:8px;
         
        }
        .dropdown-menu-admin > li > a
        {
            color: #CC5500;
        }
        

        .dropdown-menu > li > a:hover
        {
            background-image:none !important;
        }
        .dropdown-menu > li > a:hover
        {
            color:#CC5500;
            background-color: #FED8B1;
        }
        .card-header{
            border-top: 3px solid #CC5500;
            }
        .card-title{
            color:#CC5500;
        }
        .card-table {
            word-break: break-all;
            }
        .form-control:focus{
            border-color: #CC5500;
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
           
            }
        .btn-add{
            background-color: #CC5500;
            color: white;
        }
        .btn-add:hover{
            background-color: #C45302;
            color:white;  
                
        }
        .btn-add:focus{
            border-color: #CC5500;
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
              
        }

        .modal-header {
            background: #CC5500;
            color: white;
        }

        .footer {
          position: relative;
          bottom:0;
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
    <?php require_once 'page_sections/navbar.php'; ?>
 
    <section>
            <nav aria-label="breadcrumb" style="margin:2rem">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home  </a></li>
                    
                    <li class="breadcrumb-item active" aria-current="page" style="text-transform:capitalize;">Settings</li>
                    
                </ol>
            </nav>
            <div class="container container-fluid cardtablePanel">
                        <div class="card border-light mb-3 shadow text-left" style="height:45rem;">
                            <div class="card-header" style="text-transform:capitalize;">
                           
                            
                                <?php echo $result['lastname'] . ', ' . $result['firstname']. ' ' . $result['middlename'] ?>'s Account
                                
                            </div>
            
                            <div class="card-body">
                            <?php 
                        if(isset($_SESSION['success']) && $_SESSION['success'] !='')
                        {
                            echo "<div id='alertM' class='alert alert-success d-flex align-items-center text-center' role='alert'>
                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                            <div class='text-center'>
                            ".$_SESSION['success']."
                            </div>
                        </div>";
                            unset($_SESSION['success']);
                        }
                        ?>
                        <?php

                        if(isset($_SESSION['error']) && $_SESSION['error'] != '')
                        {
                            ?>
                            <div id='alertM' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                            <div class='text-center'>
                            <?php echo $_SESSION['error']; ?>
                            </div>
                            </div>
                        <?php   
                        }
                       
                        unset($_SESSION['error']);
                        ?>
                                    <div class="container container-section mt-2 pt-2">
                                
                                    <form action="updateNAME.php" method="post" class="form-horizontal" id="changeNAMEForm">
                                       
                                      <div class="row align-items-center ">
                                            <div class="col">
                                                <div class="col-md-8" style="color:#CC5500;">
                                                    <h6><b>Edit Name</b></h6>
                                                </div>
                                            </div>
                                        </div>	

                                       
                                            <div class="form-group">
                                                <label for="lname" class="col-sm-2 control-label">Last name</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="lastname" value="<?php echo $result['lastname']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="fname" class="col-sm-2 control-label">First name</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="firstname" value="<?php echo $result['firstname']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mname" class="col-sm-2 control-label">Middle name</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" id="mname" name="mname" placeholder="middlename" value="<?php echo $result['middlename']; ?>"/>
                                                </div>
                                            </div>
                                            

                                        
                                        <br>
                                            <div class="form-group">
                                            <div class="col-sm-offset-2 col-md-5">
                                                <input type="hidden" name="update_id"  value="<?php echo $result['user_id'] ?>"> 
                                                <button id="btn_add" name="updateadminname" class="btn btn-add">Save</button>
                                            </div>
                                            </div>
                                       
                                        </form>
                                        <br>
                                        <form action="changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
                                        <fieldset>
                                        <div class="row align-items-center ">
                                            <div class="col">
                                                <div class="col-md-8" style="color:#CC5500;">
                                                    <h6><b>Edit Username</b></h6>
                                                </div>
                                            </div>
                                        </div>	  
                                        <div class="form-group">
                                          <label for="username" class="col-sm-2 control-label">Username</label>
                                          <div class="col-md-5">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $result['username']; ?>"/>
                                          </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                          <div class="col-sm-offset-2 col-md-5">
                                            <input type="hidden" name="update_id"  value="<?php echo $result['user_id'] ?>"> 
                                            <button id="btn_add" name="updateadmindata" class="btn btn-add">Save</button>
                                          </div>
                                        </div>
                                      </fieldset>
                                    </form>
                                    
                                    <br> 

                                    <form action="actions/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
                                      <fieldset>
                                      <div class="row align-items-center ">
                                            <div class="col">
                                                <div class="col-md-8" style="color:#CC5500;">
                                                    <h6><b>Change Password</b></h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="changePasswordMessages"></div>

                                        <div class="form-group">
                                          <label for="password" class="col-sm-2 control-label">Current Password</label>
                                          <div class="col-md-5">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="npassword" class="col-sm-2 control-label">New password</label>
                                          <div class="col-md-5">
                                            <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
                                          <div class="col-md-5">
                                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                          </div>
                                        </div>
                                      
                                        <br> 
                                        <div class="form-group">
                                          <div class="col-sm-offset-2 col-md-10">
                                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>"end of > 
                                            <button type="submit" class="btn btn-add"> <i class="glyphicon glyphicon-ok-sign"></i> Save </button>
                                            
                                          </div>
                                        </div>


                                      </fieldset>
                                    </form>
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


<?php require_once 'page_sections/scripts.php'; ?>  
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
            $('#alertM').alert('close');
        }, 3000);
    });
 
</script>

<?php require_once 'page_sections/footer.php'; ?>