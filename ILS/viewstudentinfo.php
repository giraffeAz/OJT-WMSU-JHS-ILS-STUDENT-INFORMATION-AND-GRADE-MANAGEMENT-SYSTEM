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
         <!-----------JSLOADER------------------>
         <script src="assets/js/load.js"></script>
        <title>Student's Information</title>

        
  
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
            .dropdown-menu-ad > li > a
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
        


            .addsection{
        
            margin-right: 2rem;
            }
            .list-group-item{
                text-align:left;
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
            .card-header{
            border-top: 3px solid #CC5500;
            }


            .footer {
            position:relative;    
           
            bottom: 0;
            width: 100%;
            height: 60px;
            line-height: 60px;
            background-color: #CC5500;
            
            }

            footer span{
                font-size: 12px;
            }
      
            .btn-record{
                float: right;
                margin-right: 2rem;
            }
          
            .grade{
                float: left;
                margin-left: 5rem;
            }
            .section{
                float: right;
                margin-right: 5rem;
            }
            .year{
                float: left;
                margin-left: 5rem;
            }
            .lrn{
                float: right;
                margin-left:-1rem;
                margin-right: 10rem;
            }
            .report-card-title{
              
                margin-right:9rem;
          
                text-align:center;
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
           
        </style>
    </head>
    <body style="background-color:#FFF3E0;" >
    <div class="loader">
    <img src="assets/loader.gif" alt="Loading..." />
    </div>
    <?php require_once 'page_sections/adviserNav.php'; ?>
        
    

            <section>
            <nav aria-label="breadcrumb" style="margin:2rem">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="adviserindex.php">List of Students  </a></li>
                    <?php
                        include 'functions/connectdb.php';
                        $student = $_GET['student'];
                        $sql=  mysqli_query($con, "SELECT * FROM student_info where student_id = '$student' ");
                        while($row = mysqli_fetch_assoc($sql)) {


                        ?>
                    <li class="breadcrumb-item active" aria-current="page" style="text-transform:capitalize;"><?php echo $row['lastname'] . ', ' . $row['firstname']. ' ' . $row['middlename'] ?>'s Information</li>
                    <?php
                    } mysqli_close($con);
                    ?>
                </ol>
            </nav>
            <div class="container container-fluid cardtablePanel">
                        <div class="card border-light mb-3 shadow text-left" style="height:45rem;">
                            <div class="card-header" style="text-transform:capitalize;">
                            <?php
                                include 'functions/connectdb.php'; 
                                $student = $_GET['student'];
                                $sql=  mysqli_query($con, "SELECT * FROM student_info where student_id = '$student' ");
                                while($row = mysqli_fetch_assoc($sql)) {


                                ?>
                                <?php echo $row['lastname'] . ', ' . $row['firstname']. ' ' . $row['middlename'] ?>
                                <a  href="editstudentinfo.php?student=<?php echo $_GET['student']; ?>"> <button class="btn btn-success btn-record" style="align-items:right"><i class="bi bi-pencil-square"></i> Edit</button></a>
                               
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
                          
                                   
                                    <div class="container container-section mt-2 pt-2">
                                        <div class="row align-items-center ">
                                            <div class="col">
                                                <div class="col-md-8" style="color:#CC5500;">
                                                    <h6><b>Student Information Details </b></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                               
                                                <div class="col-md-8">
                                                <b><label for="lrn" class="form-label">LRN</label></b>
                                                <p> <?php echo $row['lrn_no'];?></p>
                                                   
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                            <div class="col-md-8">
                                                <b> <label for="ln" class="form-label">Last name</label></b>
                                                <p> <?php echo $row['lastname'];?></p>
                                            </div> 
                                            </div>

                                            <div class="col">
                                            <div class="col-md-8">
                                                <b> <label for="ln" class="form-label">First name</label></b>
                                                <p> <?php echo $row['firstname'];?></p>
                                            </div> 
                                            </div>
                                            <div class="col">
                                            <div class="col-md-8">
                                                <b> <label for="ln" class="form-label">Middle name</label></b>
                                                <p> <?php echo $row['middlename'];?></p>
                                            </div> 
                                            </div>
                                           
                                        </div>
                                      
                                        <div class="row align-items-center">
                                            <div class="col">
                                            <div class="col-md-8">
                                                <b> <label for="ln" class="form-label">Sex</label></b>
                                                <p> <?php echo $row['sex'];?></p>
                                            </div> 
                                            </div>   
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                            <div class="col-md-8">
                                                <b>  <label for="ln" class="form-label">Date of Birth</label></b>
                                                <p> <?php echo $row['date_of_birth'];?></p>
                                            </div> 
                                            </div>        
                                        </div>

                                        <div class="row align-items-center ">
                                            <div class="col">
                                                <div class="col-md-8" style="color:#CC5500;">
                                                    <h6><b>Elementary School Details </b></h6>
                                                </div>
                                            </div>
                                        </div> 
                                   
                                        <div class="row align-items-center">
                                                <div class="col">
                                                <div class="col-md-8">
                                                    <b><label for="sid" class="form-label">School ID</label></b>
                                                    <p><?php echo $row['school_id'];?></p>
                                                </div> 
                                                </div>        
                                        </div> 
                                        <div class="row align-items-center">
                                                <div class="col">
                                                <div class="col-md-8">
                                                    <b><label for="icc" class="form-label">Name of School</label></b>
                                                    <p><?php echo $row['elementary_school'];?></p>
                                                </div> 
                                                </div>        
                                        </div>
                                        <div class="row align-items-center">
                                                <div class="col">
                                                <div class="col-md-8">
                                                    <b><label for="icc" class="form-label">School Address</label></b>
                                                    <p><?php echo $row['school_address'];?></p>
                                                </div> 
                                                </div>        
                                        </div> 
                                        <div class="row align-items-center">
                                                <div class="col">
                                                <div class="col-md-8">
                                                    <b><label for="icc" class="form-label">General Average</label></b>
                                                    <p><?php echo $row['gen_ave'];?></p>
                                                </div> 
                                                </div>        
                                        </div> 
                                    </div>   
                                                <?php
                                } mysqli_close($con);
                                ?>
         
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
<?php require_once 'page_sections/footer.php'; ?>