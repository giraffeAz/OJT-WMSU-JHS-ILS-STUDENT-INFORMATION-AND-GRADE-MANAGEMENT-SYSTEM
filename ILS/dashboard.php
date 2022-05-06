
<?php 

require_once 'functions/session.php';

if($_SESSION['user_type']!="admin")
{
    
    header("Location: accessdenied.php");
    die;
  

}
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
        <!-- Font -->
        <link href="assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
       

        <!-- Table -->
        <link href="assets/css/plugins/table.css" rel="stylesheet">

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
        .navlink{
            position: relative;
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
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .sydropdownbox{
          float:right;
          margin:8px;
         
        }
        .dropdown-menu-admin > li > a
        {
            color: #CC5500;
        }
        
        .body-content{
            margin-bottom: 5rem;
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
    <?php require_once 'page_sections/navbar.php'; ?>
          <section class="container body-content" >
          <div class="btn-group sydropdownbox">
          <?php
                                                        include 'functions/connectdb.php';
                                                        $add = mysqli_query($con,"SELECT * FROM school_year where status='Yes'");
                                                        while($row=mysqli_fetch_array($add)){
                                                        ?>    
                    <button type="button" class="btn btn-add " data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" disabled>
                        S.Y <?php echo $row['school_year'] ?>
                    </button>
                    <?php } mysqli_close($con); ?>
                       
                    
            </div>

            <div class="container container-section mt-5 pt-5">
               
                
                <?php
                                   
                                   include 'functions/connectdb.php';
                                    
                                    $sql=  mysqli_query($con, "SELECT  class.class_id, class.grade_id, class.adviser_id, class.section, grade.grade as gradel, users.lastname as adviserl, users.firstname  as adviserf, users.middlename  as adviserm FROM class INNER JOIN grade ON class.grade_id = grade.grade_id  
                                    INNER JOIN users ON class.adviser_id = users.user_id  Order by class_id ");
                                    while($row = mysqli_fetch_array($sql)) {

                                        $count = mysqli_num_rows($sql);
                                    
                                    ?>
                    <div class="col-sm-4">
                        <div class="card w-75 card-section border mb-3 shadow text-center" style="max-width:18rem; float:left;">
                        <input type="hidden" id="id<?php echo $row["class_id"] ?>" name="id" value="<?php echo $row['class_id'] ?>">
                            <div class="card-header">
                                Grade <?php echo $row['gradel'] ?> - Section <?php echo $row['section'] ?>
                            </div>
                            <div class="card-body text-primary">
                                <h6 class="card-title" style="text-transform:capitalize;"><?php echo $row['adviserl'] ?>, <?php echo $row['adviserf'] ?> <?php echo $row['adviserm'] ?></h6>
                                
                                   
                                    <div class="text-center mt-3">
                                        <a href="class.php?class=<?php echo $row['class_id'] ?>&adviserid=<?php echo $row['adviser_id']?>"><button class="btn btn-success"><i class="bi bi-eye"></i> View</button></a>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                    <?php
    
                    }
                    mysqli_close($con);
                    ?>
                  





               
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