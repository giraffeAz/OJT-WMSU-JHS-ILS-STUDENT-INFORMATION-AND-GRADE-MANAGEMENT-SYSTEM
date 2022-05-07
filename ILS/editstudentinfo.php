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
        <title>Update Student's Information</title>

        
  
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
            .card-header{
            border-top: 3px solid #CC5500;
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
                        <div class="card border-light mb-3 shadow text-left" style="height:53rem;">
                            <div class="card-header" style="text-transform:capitalize;">
                            <?php
                                include 'functions/connectdb.php'; 
                                $student = $_GET['student'];
                                $sql=  mysqli_query($con, "SELECT * FROM student_info where student_id = '$student' ");
                                while($row = mysqli_fetch_assoc($sql)) {


                                ?>
                                <?php echo $row['lastname'] . ', ' . $row['firstname']. ' ' . $row['middlename'] ?>
                               
                            </div>
            
                            <div class="card-body">
                            <form class=""  method="post">   
                                    <div class="container container-section mt-2 pt-2">
                                        <div class="row align-items-center ">
                                            <div class="col">
                                                <div class="col-md-8" style="color:#CC5500;">
                                                    <h6><b>Edit Student Information Details </b></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                               
                                                <div class="col-md-2">
                                                <b><label for="lrn" class="form-label">LRN</label></b>
                                                <input type="text" class="form-control" autocomplete="off" id="lrn" name="lrn" pattern="[0-9]+" value=" <?php echo $row['lrn_no'];?>"  maxlength="12" required>  
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                            <div class="col-md-8">
                                                <b> <label for="ln" class="form-label">Last name</label></b>
                                                <input type="text" class="form-control" autocomplete="off" id="name" name="lname" value="<?php echo $row['lastname'];?>"  required>
                                            </div> 
                                            </div>

                                            <div class="col">
                                            <div class="col-md-8">
                                                <b> <label for="ln" class="form-label">First name</label></b>
                                                <input type="text" class="form-control" autocomplete="off" id="name" name="fname" value="<?php echo $row['firstname'];?>"  required>
                                            </div> 
                                            </div>
                                            <div class="col">
                                            <div class="col-md-8">
                                                <b> <label for="ln" class="form-label">Middle name</label></b>
                                                <input type="text" class="form-control" autocomplete="off" id="name" name="mname" value="<?php echo $row['middlename'];?>"  required>
                                            </div> 
                                            </div>
                                           
                                        </div>
                                      
                                        <div class="row align-items-center">
                                            <div class="col">
                                            <div class="col-md-2">
                                                <b> <label for="ln" class="form-label">Sex</label></b>
                                                <select  id="sex"  name="sex" class="form-control input-xs" required>
                                                    <option disabled selected><?php echo $row['sex'];?></option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    </select> 
                                                
                                            </div> 
                                            </div>   
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                            <div class="col-md-2">
                                                <b>  <label for="ln" class="form-label">Date of Birth</label></b>
                                                <input id="dob" name="dob" type="date" value="<?php echo $row['date_of_birth'];?>" class="form-control input-md" required="">
                                                
                                            </div> 
                                            </div>        
                                        </div>
                                        <br>
                                        <div class="row align-items-center ">
                                            <div class="col">
                                                <div class="col-md-8" style="color:#CC5500;">
                                                    <h6><b>Edit Elementary School Details </b></h6>
                                                </div>
                                            </div>
                                        </div> 
                                   
                                        <div class="row align-items-center">
                                                <div class="col">
                                                <div class="col-md-8">
                                                    <b><label for="sid" class="form-label">School ID</label></b>
                                                    <input type="text" class="form-control" id="sid" name="sid" pattern="[0-9]+" maxlength="6" value="<?php echo $row['school_id'];?>"  required>
                                                </div> 
                                                </div>  
                                                      
                                        </div> 
                                        <div class="row align-items-center">
                                                <div class="col">
                                                <div class="col-md-8">
                                                    <b><label for="icc" class="form-label">Name of School</label></b>
                                                    <input type="text" class="form-control" id="icc" name="icc" value="<?php echo $row['elementary_school'];?>" required>
                                                </div> 
                                                </div>     
                                        </div>
                                        <div class="row align-items-center">
                                                <div class="col">
                                                <div class="col-md-8">
                                                    <b><label for="icc" class="form-label">School Address</label></b>
                                                    <input type="text" class="form-control" id="s_add" name="s_add" aria-describedby="inputGroupPrepend" value="<?php echo $row['school_address'];?>" required>
                                                </div> 
                                                </div>        
                                        </div> 
                                        <div class="row align-items-center">
                                                <div class="col">
                                                <div class="col-md-8">
                                                    <b><label for="icc" class="form-label">General Average</label></b>
                                                    <input  class="form-control" id="ave" name="ave" type="integer" aria-describedby="inputGroupPrepend" pattern="[0-9]+" maxlength="2" value="<?php echo $row['gen_ave'];?>" required>
                                                </div> 
                                                </div>        
                                        </div> 
                                    </div>   
                                                <?php
                                } mysqli_close($con);
                                ?>
                                </div>
                                        <div class="modal-footer">
                                                        <a href="viewstudentinfo.php?student=<?php echo $student ?>"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button></a>
                                                        <input type="submit" class="btn btn-add " name="submitb" value="Save">
                                                        </form>
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



<!-- ADD GRADES Modal -->
                                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form class="" method="POST">
                                            <input name="studentid" type="hidden" value="<?php echo $_GET["student"] ?>">
                                            <input name="current" type="hidden" value="<?php echo $_GET["current"] ?>">
                                            <input name="class" type="hidden" value="<?php echo $_GET["class"] ?>">
                                            <input name="yearid" type="hidden" value="<?php echo $_GET["yearid"] ?>">

                                            <input name="school" type="hidden" value="Western Mindanao State University - ILS High School">
                                            <input name="school_id" type="hidden" value="600136">
                                            <input name="district" type="hidden" value="Zamboanga City">
                                            <input name="division" type="hidden" value="Baliwasan">
                                            <input name="region" type="hidden" value="IX">

                                            <?php
                                                include 'functions/connectdb.php';
                                                $current_user_id = $_SESSION['user_id'];
                                                $student = $_GET['student'];
                                                $yearid = $_GET['yearid'];
                                                $add = mysqli_query($con,"SELECT student_class.sc_id, student_class.student_id, student_class.school_year, student_class.grade, student_class.section, student_info.lrn_no as lrn, student_info.lastname as ln, student_info.firstname as fn, student_info.middlename as mn, users.lastname as aln, users.firstname as afn, users.middlename as amn FROM student_class INNER JOIN student_info ON student_class.student_id = student_info.student_id  
                                                INNER JOIN users ON student_class.adviser_id = users.user_id WHERE student_class.adviser_id = '$current_user_id' && student_class.student_id = '$student' && student_class.school_year='$yearid'");
                                                while($row=mysqli_fetch_assoc($add)){  
                                                    


                                             ?> 
                                             <input name="sylevel" type="hidden" value="<?php echo $row['school_year'] ?>">
                                             <input name="slevel" type="hidden" value="<?php echo $row['section'] ?>">
                                             <input name="glevel" type="hidden" value="<?php echo $row['grade'] ?>">
                                             <input name="adviser" type="hidden" value="<?php echo $row['afn'] ?> <?php echo $row['amn'] ?> <?php echo $row['aln'] ?>">
                                             <?php
                                                    } mysqli_close($con);?>

                                            <?php
                                                        include 'functions/connectdb.php';
                                                        $add = mysqli_query($con,"SELECT * FROM school_year where status='Yes'");
                                                        while($row=mysqli_fetch_array($add)){
                                                        ?>                                     
                                                    <input   type="hidden" id="schoolyear<?php echo $row[0] ?>"  name="schoolyear" type="text" style="border:0px" value="<?php echo $row[0] ?>" readonly>
                                            <?php } mysqli_close($con); ?>
                                            <div class="col-md-12">
                                                    <label for="quarter" class="form-label">Current Quarter</label>
                                                    <select class="form-select"  name="quarter" id="quarter"  required>
                                                      
                                                    <?php
                                                        include 'functions/connectdb.php';
                                                        $sql = mysqli_query($con,"SELECT * from quarter WHERE status='Yes'"); 
                                                        while($row=mysqli_fetch_array($sql)){
                                                        ?>
                                                         <option value="<?php echo $row[0] ?>">
                                                        <?php echo $row[1] ?>
                                                        </option>
                                                        <?php } mysqli_close($con); ?>
                                                       
                                                    </select>
                                                  
                                                </div> 
                                            <div class="col-md-12">
                                                    <label for="subject" class="form-label">Add Grade by Subject</label>
                                                    <select class="form-select"  name="subject" id="subject"  required>
                                                    <option value="" id="subject" disabled selected>Select Subject</option>   
                                                    <?php
                                                        include 'functions/connectdb.php';
                                                        $sql = mysqli_query($con,"SELECT * from subjects"); 
                                                        while($row=mysqli_fetch_array($sql)){
                                                        ?>
                                                        <option value="<?php echo $row[0] ?>">
                                                        <?php echo $row[1] ?>
                                                        </option>
                                                        <?php } mysqli_close($con); ?>
                                                    </select>
                                                  
                                                </div> 
  
                                              
                                                  <div class="col-md-5">
                                                    <label for="grades" class="form-label">Enter Grade</label>
                                                    <input type="text" class="form-control" id="grades" name="grades" pattern="[0-9]+" maxlength="2" placeholder="" required>
                                                   
                                                </div>
                                               
                                               

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-add">Save</button>
                                            </div>
                                             </form>
                                            </div>
                                        </div>
                                        </div>  
                                   <!-- Modal -->
<?php require_once 'page_sections/scripts.php'; ?>              
<?php require_once 'page_sections/footer.php'; ?>