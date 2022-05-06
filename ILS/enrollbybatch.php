<?php 

   require_once 'functions/session.php';

   if($_SESSION['user_type']!="user")
   {
       
       header("Location: accessdenied.php");
       die;
     
   
   }
    require_once 'functions/connectdb.php';
    require_once 'actions/db.php'

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

         <!-- Font -->
        <link href="assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      
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
        <title>Home</title>

       
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
        .card-header{
            border-top: 3px solid #CC5500;
        }
        .cardtablePanel{
           margin-top: 3rem;
        }
        .pagination > li > a{
            color:#CC5500;
        }
        .pagination > li > a:focus,
        .pagination > li > a:hover,
        .pagination > li > span:focus,
        .pagination > li > span:focus
        {
            color:#CC5500;
            background-color: #FED8B1;
            border-color: #CC5500;
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);

        }
        .pagination > .active > a
        {
            color:white;
            background-color:#CC5500 !Important;
            border: solid 1px #CC5500 !Important;
        }

        .pagination > .active > a:hover
        {
            background-color:#CC5500 !Important;
            border: solid 1px #CC5500 !Important;
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

        .sydropdownbox{
          float:right;
          margin: 2rem;
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
        .row-try{
            background-color:black;
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
    <body style="background-color:#FFF3E0;" >
    <div class="loader">
    <img src="assets/loader.gif" alt="Loading..." />
    </div>
    <?php require_once 'page_sections/adviserNav.php'; ?>
     <!-- Begin Page Content -->
     <div class="container container-fluid cardtablePanel">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                     <?php include 'actions/enrollbatch.php'; ?>
                    <?php 
                       
                        include 'functions/connectdb.php';
                        $current_user_id = $_SESSION['user_id'];
                       
                        
                        $sql = "SELECT class.class_id, class.grade_id, class.adviser_id, class.section, grade.grade as gradel FROM class INNER JOIN grade ON class.grade_id = grade.grade_id  
                        INNER JOIN users ON class.adviser_id = users.user_id WHERE class.adviser_id = '$current_user_id'";
                        $result = mysqli_query($con, $sql);
                       
                        ?>

                            <?php 
                                if (mysqli_num_rows($result) > 0)
                                {
                                    while ($row = mysqli_fetch_array($result))
                                    {
                                       $gradelevel=$row["gradel"];

                               ?>
                        <input type="hidden" id="id<?php echo $row["class_id"] ?>" name="id" value="<?php echo $row['class_id'] ?>">         
                        <h6 class="m-0 font-weight-bold" >Enroll Students </h6>
                     <?php
                                }
                            }
                            ?>
                       
                            <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                  <a href="adviserindex.php"> <button class="btn btn-add" data-bs-toggle="modal"  data-bs-target="#myModal" style="float:right;"> Back</button></a>
                            </div> <!--end of div-action -->
                     
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <form action="" method="post">
                        <div class="col-md-5">
                                                   
                                                   
                                                   <?php
                                                       include 'functions/connectdb.php';
                                                       $add = mysqli_query($con,"SELECT class.class_id, class.grade_id, class.adviser_id, class.section, grade.grade as gradel FROM class INNER JOIN grade ON class.grade_id = grade.grade_id  
                                                       INNER JOIN users ON class.adviser_id = users.user_id WHERE class.adviser_id = '$current_user_id'");
                                                       while($row=mysqli_fetch_array($add)){
                                                       ?>
                                                       <input type="hidden" id="class<?php echo $row[0] ?>" name="adviserid"  value="<?php echo $row[2] ?>">
                                                      <input  type="hidden"  id="class<?php echo $row[0] ?>"  name="grade" type="text"  value="<?php echo $row['gradel'] ?>" readonly>
                                                      <input  type="hidden" id="class<?php echo $row[0] ?>"  name="section" type="text"  value="<?php echo $row[3] ?>" readonly>
                                                       <?php } mysqli_close($con); ?>
                                                   
                                               </div>
                                               <div class="col-md-5">
                                               <?php
                                                       include 'functions/connectdb.php';
                                                       $add = mysqli_query($con,"SELECT * FROM school_year where status='Yes'");
                                                       while($row=mysqli_fetch_array($add)){
                                                       ?>                                     
                                                       <input  type="hidden"  id="schoolyear<?php echo $row[0] ?>"  name="schoolyear" type="text"  value="<?php echo $row[0] ?>" readonly>
                                                       <?php } mysqli_close($con); ?>
                                               </div>
                                               <input  type="hidden"  name="gradele" type="text"  value="<?php echo $_GET["gradeclass"] ?>" readonly>
                            <table class="table table-bordered" id="students" width="100%" cellspacing="0">
                                
                                <thead> 
                                    <tr style="color:#CC5500">
                                        <th > <button class="btn btn-success" name="student_enrollbybatch" > Enroll</button> </th>
                                        <th style="display:none;"> ID</th>
                                        <th style="display:none;"> STUDENT ID</th>
                                        <th> LRN</th>
                                        <th >Name of the Student</th>
                                        <th class="text-center">Classified</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                    <?php
                                                        include 'functions/connectdb.php';
                                                        $gradelevel = $_GET['gradeclass'];
                                                        $add = mysqli_query($con,"SELECT student_status.studentstatus_id, student_status.student_id, student_status.status, student_status.classified_as, student_info.lrn_no as lrn, student_info.lastname as ln, student_info.firstname as fn, student_info.middlename as mn FROM student_status 
                                                        INNER JOIN student_info ON student_status.student_id = student_info.student_id  
                                                        WHERE student_status.status = 'PROMOTED' AND student_status.classified_As = '$gradelevel'");
                                                        while($row=mysqli_fetch_array($add)){
                                                            $student = $row["student_id"];
                                                        ?>
                                    <tr> 
                                    
                                                    
                                        <td ><input type="checkbox" name="student_enroll[]" value="<?php echo $row['studentstatus_id']; ?>"></td> 
                                        <td style="display:none;"><?php echo $row['studentstatus_id']; ?></td>
                                        <td style="display:none;"><input  type="hidden"  name="studentid[]" type="text"  value="<?php echo $row['student_id']; ?>" readonly></td>
                                        <td><?php echo $row['lrn'] ?></td>
                                        <td style="text-transform:capitalize;"><?php echo $row['ln'] ?>, <?php echo $row['fn'] ?> <?php echo $row['mn'] ?></td>
                                        <td class="d-flex justify-content-center">Grade <?php echo $row['classified_as'] ?></td> 
                                        <td><?php echo $row['status'] ?></td>
                                      
           
                                    </tr>
                               
                                    <?php
                                            
                                        } mysqli_close($con);
                                        ?>

                                </tbody>
                                   
                            </table> 
                        </form>
                        </div>
                    </div>
                </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

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
                <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->
            <!-- Modal -->

 
     
<?php require_once 'page_sections/scripts.php'; ?>  
    
    

<?php require_once 'page_sections/footer.php'; ?>