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
                    <?php 
                       
                        include 'functions/connectdb.php';
                        $current_user_id = $_SESSION['user_id'];
                       
                        
                        $sql = "SELECT class.class_id, class.grade_id, class.adviser_id, class.section, grade.grade as gradel FROM class INNER JOIN grade ON class.grade_id = grade.grade_id  
                        INNER JOIN users ON class.adviser_id = users.user_id WHERE class.adviser_id = '$current_user_id' ";
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
                        <h6 class="m-0 font-weight-bold" >Grade <?php echo $row["gradel"];?> - Section <?php echo $row["section"];?></h6>
                     <?php
                                }
                            }
                            ?>
                        <?php
                        include 'actions/addstudent.php';
                        ?>

                        <?php 

                            if ($gradelevel==8||$gradelevel==9||$gradelevel==10)
                           
                            {?>
                        <div class="div-action pull pull-right" style="padding-bottom:20px;">
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
                                    <a href="enrollbybatch.php?gradeclass=<?php echo $row['gradel'] ?>"> <button class="btn btn-add e"  style="float:right;"><i class="bi bi-plus-lg"></i>  Batch Enroll</button></a>
                                   <br><br><br>
                                  <button class="btn btn-add a" data-bs-toggle="modal" id="addStudentModalBtn" data-bs-target="#myModal" style="float:right;"><i class="bi bi-plus-lg"></i>New Student</button>
                                  <?php
                                }
                            }
                            ?>
                                </div> <!--end of div-action -->
                        
                        <?php } else{
                            ?>
                            <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                  <button class="btn btn-add" data-bs-toggle="modal"  data-bs-target="#myModal" style="float:right;"><i class="bi bi-plus-lg"></i> Student</button>
                            </div> <!--end of div-action -->
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="students" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="color:#CC5500">
                                        <th style="display:none;">Id</th>
                                        <th >LRN </th>
                                        <th >Name of the Student</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Status</th>
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>

                                <?php
                                                        include 'functions/connectdb.php';
                                                        $add = mysqli_query($con,"SELECT student_class.sc_id, student_class.student_id, student_class.school_year, student_class.grade, student_class.section, school_year.sy_id, school_year.status, student_info.lrn_no as lrn, student_info.lastname as ln, student_info.firstname as fn, student_info.middlename as mn FROM student_class 
                                                        INNER JOIN student_info ON student_class.student_id = student_info.student_id  
                                                        INNER JOIN school_year ON student_class.school_year = school_year.sy_id 
                                                        INNER JOIN users ON student_class.adviser_id = users.user_id WHERE school_year.status='Yes' AND student_class.adviser_id = '$current_user_id'");
                                                        while($row=mysqli_fetch_array($add)){
                                                            $student = $row["student_id"];
                                                        ?>
                                    <tr> 
                                    
                                                    
                                        <td style="display:none;" class="student_id"><?php echo $row['student_id'] ?></td>             
                                        <td><?php echo $row['lrn'] ?></td>
                                        <td style="text-transform:capitalize;"><?php echo $row['ln'] ?>, <?php echo $row['fn'] ?> <?php echo $row['mn'] ?></td>
                                        <td class="d-flex justify-content-center">
                                                <a href="viewstudentinfo.php?student=<?php echo $row['student_id'] ?>"><button class="btn btn-info info_btn" data-bs-toggle="modal" ><i class="bi bi-info-circle"></i> Info</button></a> &nbsp&nbsp&nbsp&nbsp
                                                <a href="form137.php?student=<?php echo $row['student_id'] ?>"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" ><i class="bi bi-eye"></i> Form 137</button></a> &nbsp&nbsp&nbsp&nbsp
                                                <a href="record.php?student=<?php echo $row['student_id'] ?>&current=<?php echo $row['grade']?>&class=<?php echo $row['section']?>&yearid=<?php echo $row['school_year']?>"><button class="btn btn-danger"><i class="bi bi-archive"></i> Record</button></a>
                                        </td>
                                            <?php

                                            include 'functions/connectdb.php';


                                            $query = mysqli_query($con,"SELECT student_class_info.student_id, student_class_info.action, student_class_info.syl, school_year.sy_id, school_year.status FROM student_class_info 
                                            INNER JOIN school_year ON student_class_info.syl = school_year.sy_id
                                            WHERE student_id = '$student' && school_year.status = 'Yes'");
                                            while($row = mysqli_fetch_assoc($query)) {{
                                                $action = $row['action'];


                                            ?>
                                            <?php if($action=='PROMOTED'){ ?>  

                                            <td class="text-center" style="color:green;"> <b><?php echo $row['action']?></b></td>
                                            <?php } elseif ($action=='RETAINED'){ ?>
                                            <td class="text-center" style="color:red;"><b><?php echo $row['action'] ?><b></td>
                                            <?php } else {?>
                                            <td class="text-center"><b><?php echo $row['action'] ?><b></td>
                                            <?php } ?>
                                    </tr>
                               
                                    <?php
                                            }}
                                        } mysqli_close($con);
                                        ?>

                                </tbody>
                            </table>
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
<!-- ADD Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create New Record</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"> 
                                        
                                            <form class=""  method="post">
                                                <fieldset>

                                                <div class="col-md-8">
                                                    <label for="lrn" class="form-label">LRN</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="lrn" name="lrn" pattern="[0-9]+" placeholder="Enter LRN"  maxlength="12" required>
                                                   
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="ln" class="form-label">Last name</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="name" name="lname" placeholder="Last Name"  required>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="fn" class="form-label">First name</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="name" name="fname" placeholder="First Name" required>
                                                  
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="mname" class="form-label">Middle Name</label>
                                                    <div class="input-group has-validation">
                                                    
                                                    <input type="text" class="form-control" autocomplete="off" id="name" name="mname" aria-describedby="inputGroupPrepend" placeholder="Middle Name" required>
                                                   
                                                    </div>
                                                </div> 
                                              <div  class="col-md-12" > 
                                               <div class="col-md-3">
                                                    <label for="sex" class="form-label">Sex</label>
                                                    <select  id="sex"  name="sex" class="form-select input-xs" placeholder="Select" required>
                                                    <option disabled selected>Select Sex</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    </select> 
                                                   
                                              </div>
                                                <div class="col-md-5 form-group">
                                                <label class="col-xs-5 control-label" for="dob">Date of Birth</label>  
                                                <div class="col-xs-7">
                                                <input id="dob" name="dob" type="date" placeholder="YYYY-MM-DD" class="form-control input-md" required="">
                                                </div>
                                               </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12" style="border-bottom:1px solid #333">
                                                <h6><b>Elementary School Details </b></h6>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="sid" class="form-label">School ID</label>
                                                    <input type="text" class="form-control" id="sid" name="sid" pattern="[0-9]+" maxlength="6" placeholder="Enter School ID"  required>
                                                   
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="icc" class="form-label">Name of School</label>
                                                    <input type="text" class="form-control" id="icc" name="icc" placeholder="Enter Name of Elementary School Graduate" required>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="s_add" class="form-label">School Address</label>
                                                    <div class="input-group has-validation">
                                                    
                                                    <input type="text" class="form-control" id="s_add" name="s_add" aria-describedby="inputGroupPrepend" placeholder="Enter School Address" required>
                                                   
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="ave" class="form-label">General Average</label>
                                                    <div class="input-group has-validation">
                                                    
                                                    <input  class="form-control" id="ave" name="ave" type="integer" aria-describedby="inputGroupPrepend" pattern="[0-9]+" maxlength="2" placeholder="Enter General Average" required>
                                                   
                                                    </div>
                                                </div>
                                                <br>
                                
                                                <div class="col-md-5">
                                                   
                                                   
                                                    <?php
                                                        include 'functions/connectdb.php';
                                                        $add = mysqli_query($con,"SELECT class.class_id, class.grade_id, class.adviser_id, class.section, grade.grade as gradel FROM class INNER JOIN grade ON class.grade_id = grade.grade_id  
                                                        INNER JOIN users ON class.adviser_id = users.user_id WHERE class.adviser_id = '$current_user_id'");
                                                        while($row=mysqli_fetch_array($add)){
                                                        ?>
                                                        <input type="hidden" id="class<?php echo $row[0] ?>" name="adviserid"  value="<?php echo $row[2] ?>">
                                                       <input  type="hidden"  id="class<?php echo $row[0] ?>"  name="grade" type="text" style="border:0px" value="<?php echo $row['gradel'] ?>" readonly>
                                                       <input  type="hidden" id="class<?php echo $row[0] ?>"  name="section" type="text" style="border:0px" value="<?php echo $row[3] ?>" readonly>
                                                        <?php } mysqli_close($con); ?>
                                                    
                                                </div>
                                                <div class="col-md-5">
                                                <?php
                                                        include 'functions/connectdb.php';
                                                        $add = mysqli_query($con,"SELECT * FROM school_year where status='Yes'");
                                                        while($row=mysqli_fetch_array($add)){
                                                        ?>                                     
                                                        <input  type="hidden"  id="schoolyear<?php echo $row[0] ?>"  name="schoolyear" type="text" style="border:0px" value="<?php echo $row[0] ?>" readonly>
                                                        <?php } mysqli_close($con); ?>
                                                </div>
                                            </fieldset>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-add " name="submitb" value="Create">
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
       
     
          
 
     
<?php require_once 'page_sections/scripts.php'; ?>  
<?php require_once 'page_sections/footer.php'; ?>