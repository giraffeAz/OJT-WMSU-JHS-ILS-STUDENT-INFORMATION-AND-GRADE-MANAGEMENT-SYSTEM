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
        <title>Student's Record</title>

        
  
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
                    <li class="breadcrumb-item" aria-current="page" style="text-transform:capitalize;"><a href="record.php?student=<?php echo $row['student_id'] ?>"><?php echo $row['lastname'] . ', ' . $row['firstname']. ' ' . $row['middlename'] ?>'s Academic Record</a></li>
                    <?php
    } mysqli_close($con);
      ?>
                     <li class="breadcrumb-item active" aria-current="page" style="text-transform:capitalize;">Edit Record</li>
                </ol>
            </nav>
            <div class="container container-fluid cardtablePanel">
                        <div class="card border-light mb-3 shadow text-left" style="height:60rem;">
                            <div class="card-header" style="text-transform:capitalize;">
                            <?php
                                include 'functions/connectdb.php';
                                $student = $_GET['student'];
                                $sql=  mysqli_query($con, "SELECT * FROM student_info where student_id = '$student' ");
                                while($row = mysqli_fetch_assoc($sql)) {


                                ?>
                                <?php echo $row['lastname'] . ', ' . $row['firstname']. ' ' . $row['middlename'] ?> 
                                <?php
                                } mysqli_close($con);
                                ?>
                            </div>
            
                            <div class="card-body">
                               
                                   
                                    <div class="div-action pull pull-right text-end" style="padding-bottom:20px;">
                                    <button class="btn btn-success" style="float:right;" data-bs-toggle="modal" data-bs-target="#editModal" ><i class="bi bi-pencil-square" ></i> Save Record</button> 
                                           
                                    </div>

                                  
                                    
                             
                                    <?php
                                include 'actions/addsubjectadviser.php';
                                ?> 
                                <p class="h6 report-card-title text-center"> </p>
                                
                                <div class="table-responsive-sm">
                                <table class="table table-bordered ">
                                <thead class="text-center">
                                <tr>
                                <?php 
                       
                       include 'functions/connectdb.php';
                       $schoolyear = $_GET['sy'];
                       $current_user_id = $_SESSION['user_id'];
                       
                       
                       $sql = "SELECT class.class_id, class.grade_id, class.adviser_id, class.section, grade.grade as gradel, users.lastname as adviserl, users.firstname  as adviserf, users.middlename  as adviserm FROM class INNER JOIN grade ON class.grade_id = grade.grade_id  
                       INNER JOIN users ON class.adviser_id = users.user_id WHERE class.adviser_id = '$current_user_id'";
                       $result = mysqli_query($con, $sql);
                       ?>

                           <?php 
                               if (mysqli_num_rows($result) > 0)
                               {
                                   while ($row = mysqli_fetch_array($result))
                                   {

                              ?>
                                <td rowspan=2 colspan=7 scope="col">
                                  
                                    <input type="hidden" id="id<?php echo $row["class_id"] ?>" name="id" value="<?php echo $row['class_id'] ?>"> 
                                   Grade<input  id="currentgrade<?php echo $row['class_id'] ?>"  name="current" type="text" style="border:0px" value="<?php echo $row['gradel'] ?>"readonly>
                                   Section <input style="border:none;text-transform:capitalize;" id="sec<?php echo $row['class_id'] ?>"  name="sec" type="text" style="border:0px" value="<?php echo $row[3] ?>"readonly>
                                   Adviser <input style="border:none; text-transform:capitalize; " id="adviser<?php echo $row['class_id'] ?>"  name="adviser" type="text" style="border:0px" value=" <?php echo $row['adviserl'] ?>, <?php echo $row['adviserf'] ?> <?php echo $row['adviserm'] ?>"readonly>
                                  
                                   <?php
                                                        include 'functions/connectdb.php';
                                                        $add = mysqli_query($con,"SELECT school_year FROM school_year where status='Yes'");
                                                        while($row=mysqli_fetch_array($add)){
                                                        ?>                                     
                                  < S.Y <input  id="schoolyear<?php echo $row[0] ?>"  name="schoolyear" type="text" style="border:0px" value="<?php echo $row['school_year'] ?>" readonly>
                                   <?php } mysqli_close($con); ?>
                        
                                </td>
                                <?php
                                }
                            }
                            ?>

                                   
                                </tr>

                                </thead>   
                                <thead class="text-center">
                                <tr>
                                <th rowspan=2 scope="col">LEARNING AREAS</th>
                                <th colspan=4 scope="col">QUARTER</th>
                                
                                </tr>
                                <tr>
                              
                                <th scope="col">1</th>
                                <th scope="col">2</th>
                                <th scope="col">3</th>
                                <th scope="col">4</th>
                                
                                </tr>

                                </thead>
                                <tbody>
                               
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                </tr>
                                <?php
                                    include 'functions/connectdb.php';

                                    
                                    $sql=  mysqli_query($con, "SELECT *,`FOR` as applied FROM subjects Order by subject_id ");
                                    while($row = mysqli_fetch_assoc($sql)) {

                                        $count = mysqli_num_rows($sql);
                                    
                                    ?>
                                <tr>
                                
                                <input type="hidden" id="id<?php echo $row["subject_id"] ?>" name="id" value="<?php echo $row['subject_id'] ?>">
                                <th scope="row"><?php echo $row['subject'] ?></th>
                                <td><input type="text" class="form-control" id="firstg" name="firstg"   maxlength="5" required></td>
                                <td><input type="text" class="form-control" id="secondg" name="secondg"   maxlength="5" required></td>
                                <td><input type="text" class="form-control" id="thirdg" name="thirdg"   maxlength="5" required></td>
                                <td><input type="text" class="form-control" id="thirdg" name="fourthg"   maxlength="5" required></td>
                              
                                <?php
                                    
                                }
                                mysqli_close($con);
                                ?>
                                </tr>
                               
                               
                                 <tr>
                                <th colspan=3 scope="row" class="text-end">General Average</th>
                                
                                <td></td>
                                <td></td>
                                </tr>
                                </tbody>
                               
                                </table>
                    
                                </div>


                                <div class="table-responsive-sm">
                                <table class="table table-bordered ">
                                <thead >
                                <tr>
                                <th   scope="col">Remedial Classes</th>
                                <th  colspan=6 scope="col">conducted from (mm/dd/yyyy)_______ to  (mm/dd/yyyy) _______</th>
                                <th   scope="col"></th>
                                </tr>

                                </thead>   
                                <thead class="text-center">
                                <tr>
                                <th  scope="col">Learning Areas</th>
                                <th  colspan=2 scope="col">Final Rating</th>
                                <th  colspan=2 scope="col">Remedial Class Mark</th>
                                <th  colspan=2 scope="col">Recomputed Final Grade</th>
                                <th  scope="col">REMARKS</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                
                                </tbody>
                                </table>
                                
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
                 <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="head">Academic Record</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form class="" method="post">
                                            <input type="hidden" id="id" name="id">
                                                <div class="col-md-12">
                                                    <label for="sub" class="form-label">Subject name</label>
                                                    <input type="text" class="form-control" id="sub" name="sub" id="sub"
                                                     placeholder="Enter Subject Name" value="<?php if(isset($_POST['sub'])){echo $_POST['sub'];} ?>"/>
                                                </div>
                                                <p style="color:red;">
                                                <?php if(isset($errors['sub'])){echo "<div class='alert'>" .$errors['sub']. "</div>"; } ?>
                                                </p>
                                                  
                                                

                                                <div class="col-md-12">
                                                <label for="applied" class="form-label">Applicable Grade Level</label>
                                                   
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="7" name="applied[]" id="applied" >
                                                    <label class="form-check-label" for="applied">
                                                        Grade 7
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="8" name="applied[]" id="applied" >
                                                    <label class="form-check-label" for="applied">
                                                        Grade 8
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="9" name="applied[]" id="applied" >
                                                    <label class="form-check-label" for="applied">
                                                        Grade 9
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="10" name="applied[]" id="applied" >
                                                    <label class="form-check-label" for="applied">
                                                        Grade 10
                                                    </label>
                                                    </div>

                                                    
                                                </div>
                                            
                                               
                                                <!--form--->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button id="btn_add" class="btn btn-add">Create</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>


                       <!-- EDIT Modal -->
     <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form class="row g-3 needs-validation" novalidate>
                                                <div class="col-md-12">
                                                    <label for="validationCustom04" class="form-label">Quarter</label>
                                                    <select class="form-select" id="validationCustom04" placeholder="Select" required>  
                                                    <option>Quarter 1</option>
                                                    <option>Quarter 2</option>
                                                    <option>Quarter 3</option>
                                                    <option>Quarter 4</option>
                                                    </select>
                                                    
                                                </div>
                                               
                                                <div class="col-md-5">
                                                    <label for="validationCustom03" class="form-label">Filipino</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="" required>
                                                   
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="validationCustom03" class="form-label">English</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="" required>
                                                   
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="validationCustom03" class="form-label">Mathematics</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="" required>
                                                   
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="validationCustom03" class="form-label">Science</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="" required>
                                                   
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="validationCustom03" class="form-label">Araling Panlipunan</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="" required>
                                                   
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="validationCustom03" class="form-label">Values Education</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="" required>
                                                   
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="validationCustom03" class="form-label">TLE</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="" required>
                                                   
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="validationCustom03" class="form-label">MAPEH</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="" required>
                                                   
                                                </div>
                                               
                                                
                                               
                                               
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-add">Save</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>  
                                   <!-- Modal -->
<?php require_once 'page_sections/scripts.php'; ?>              
<?php require_once 'page_sections/footer.php'; ?>