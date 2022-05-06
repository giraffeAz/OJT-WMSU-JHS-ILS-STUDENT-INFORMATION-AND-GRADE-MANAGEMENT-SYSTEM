<?php 

require_once 'functions/session.php';

if($_SESSION['user_type']!="user")
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
        .panel-table{
          margin-top: 3rem;
          margin-bottom: 3rem;
        }
        .footer {
          
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
    <?php require_once 'page_sections/adviserNav.php'; ?>
    <div class="container container-fluid cardtablePanel">
    <div class="row">
	<div class="col-md-12">
		

		<div class="container panel panel-table">
			<div class="panel-heading">
				<div  class="page-heading"> 
        <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="adviserindex.php"> Home </a></li>
                   
                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
        </ol>
      
			</div> <!--end of panel-heading -->

			<div class="panel-body">

				

				<form action="actions/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
					<fieldset>
						<legend>Change Username</legend>

						<div class="changeUsenrameMessages"></div>			

						<div class="form-group">
					    <label for="username" class="col-sm-2 control-label">Username</label>
					    <div class="col-sm-5">
					      <input type="text" class="form-control" id="username" name="username" placeholder="Usename" value="<?php echo $result['username']; ?>"/>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-5">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>"end of > 
					      <button type="submit" class="btn btn-add" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					    </div>
					  </div>
					</fieldset>
				</form>

				<form action="actions/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>Change Password</legend>

						<div class="changePasswordMessages"></div>

						<div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Current Password</label>
					    <div class="col-sm-5">
					      <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="npassword" class="col-sm-2 control-label">New password</label>
					    <div class="col-sm-5">
					      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
					    <div class="col-sm-5">
					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
					    </div>
					  </div>
           
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>"end of > 
					      <button type="submit" class="btn btn-add"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					      
					    </div>
					  </div>


					</fieldset>
				</form>

			</div> <!--end of panel-body -->		

		</div> <!--end of panel -->		
	</div> <!--end of col-md-12 -->	
</div> <!--end of row-->
    </div>
            

           <!-- Footer -->
           <footer class="footer sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>WMSU Integrated Laboratory School Junior Highschool &copy; 2022</span>
                </div>
                </div>
                </footer>

<?php require_once 'page_sections/scripts.php'; ?>                 
<?php require_once 'page_sections/footer.php'; ?>