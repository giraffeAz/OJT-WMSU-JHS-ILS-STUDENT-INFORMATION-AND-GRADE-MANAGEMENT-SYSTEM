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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <title>Manage Class</title>

       
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
    
    <?php require_once 'page_sections/navbar.php'; ?>
          <!-- Begin Page Content -->
          <div class="container container-fluid cardtablePanel">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold" >Manage Class</h6>
                        <?php
                        include 'newclass.php';
                            ?> 
                        <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                  <button class="btn btn-add" data-bs-toggle="modal" id="addCategoriesModalBtn" data-bs-target="#exampleModal" style="float:right;"><i class="bi bi-plus-lg"></i> Class</button>
                        </div> <!--end of div-action -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="color:#CC5500">
                                        <th style="display:none;">Id</th>
                                        <th >Grade</th>
                                        <th class="text-center">Section</th>
                                        <th class="text-center">Class Adviser</th>
                                        <th class="text-center">Action</th>
                                        
                                    </tr>
                                </thead>
                                 
                                <tbody>
                                <?php
                                   
                                   include 'functions/connectdb.php';
                                    
                                    $sql=  mysqli_query($con, "SELECT  class.class_id, class.grade_id, class.adviser_id, class.section, grade.grade as gradel, users.lastname as adviserl, users.firstname  as adviserf, users.middlename as adviserm FROM class INNER JOIN grade ON class.grade_id = grade.grade_id  
                                    INNER JOIN users ON class.adviser_id = users.user_id  Order by grade_id ");
                                    while($row = mysqli_fetch_array($sql)) {

                                        $count = mysqli_num_rows($sql);
                                    
                                    ?>
                                    
                                   
                                    <tr>
                                        <td style="display:none;" class="class_id"><?php echo $row['class_id'] ?></td>
                                        <td class="text-center"> <?php echo $row['gradel'] ?></td>
                                        <td class="text-center"><?php echo $row['section'] ?></td>
                                        <td  style="text-transform: capitalize;"><?php echo $row['adviserl'] ?>, <?php echo $row['adviserf'] ?> <?php echo $row['adviserm'] ?></td>
                                        
                                        <td class="d-flex justify-content-center">
                                           
                                            <button class="btn btn-success editbtn" data-bs-toggle="modal"  ><i class="bi bi-pencil-square"></i> Edit</button> &nbsp&nbsp&nbsp&nbsp
                                            <button class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="bi bi-trash"></i> Delete</button>
                                        </td> 
                                       
                                    </tr>
                                   
                                    <?php
    
                                        }
                                        mysqli_close($con);
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
 <!--ADD  Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " id="">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="head">Create New Class</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"> 
                                            <form class="" method="post"> 
                                                <div class="col-md-12">
                                                    <label for="gradeoptionlist" class="form-label">Grade Level</label>
                                                    <select class="form-select"  name="grade" id="gradel1"  required>
                                                    <option value="" id="gradel" disabled selected>Select Grade Level</option>   
                                                    <?php
                                                        include 'functions/connectdb.php';
                                                        $sql = mysqli_query($con,"SELECT * from grade"); 
                                                        while($row=mysqli_fetch_array($sql)){
                                                        ?>
                                                        <option value="<?php echo $row[0] ?>"> Grade
                                                        <?php echo $row[1] ?>
                                                        </option>
                                                        <?php } mysqli_close($con); ?>
                                                    </select>
                                                  
                                                </div> 
                                                <div class="col-md-12">
                                                    <label for="adviseroptionlist" class="form-label">Class Adviser</label>
                                                    <select class="form-select" name="adviser" id="adviserl1"  required>
                                                    <option value="" id="advisern" disabled selected>Select Adviser</option>   
                                                    <?php
                                                        include 'functions/connectdb.php';
                                                        $add = mysqli_query($con,"SELECT * from users where access = 2");
                                                        while($row=mysqli_fetch_array($add)){
                                                        ?>
                                                        <option value="<?php echo $row[0] ?>"> 
                                                        <?php echo $row[1] ?>, <?php echo $row[2] ?> <?php echo $row[3] ?>
                                                        </option>
                                                        <?php } mysqli_close($con); ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="section" class="form-label">Section Name</label>
                                                    <input type="text" class="form-control" id="sectionn" name="section" placeholder="Enter Section Name" required>

                                                </div>
                                               

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button  id="btn_add" class="btn btn-add">Create</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
 <!--EDIT Modal -->
                                    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="head">Edit Class</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="updateclass.php" method="post">
                                            <input type="hidden" id="update_id" name="update_id">
                                                <div class="col-md-12">
                                                    <label for="classlevel" id="classlevel" class="form-label">Grade Level</label>
                                                    <input type="text" class="form-control" id="grade" name="grade"
                                                      value="" readonly/>
                                                    
                                                </div>
                                               <div class="col-md-12">
                                                    <label for="sec" id="sec" class="form-label">Section</label>
                                                    <input type="text" class="form-control" id="section" name="section"
                                                      value="" />
                                                    
                                                </div>
                                                <div class="col-md-12" >
                                                    <label for="adviserlist" class="form-label">Class Adviser</label>
                                                    <select  name="adviserl" id="adviserl" class="form-control" required>
                                                    <option disabled selected > </option>
                                                    <?php
                                                        include 'functions/connectdb.php';
                                                        $add = mysqli_query($con,"SELECT * from users where access = 2");
                                                        while($row=mysqli_fetch_array($add)){
                                                        ?>
                                                        <option value="<?php echo $row[0] ?>"> 
                                                        <?php echo $row[1] ?>, <?php echo $row[2] ?> <?php echo $row[3] ?>
                                                        </option>
                                                        <?php } mysqli_close($con); ?>
                                                    </select>
                                                </div>
                                                
                                               
                                               
                                                <!--form--->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button id="btn_add" name="updatedata" class="btn btn-add">Update</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
 <!-- DELETE Modal -->
                                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                           
                                            <div class="modal-body">
                                            <form action="deleteclass.php" method="POST">

                                            <div class="col-md-12 text-center">
                                                    <input  type="hidden" name="class_id"  id="delete_id">
                                                    <h2><i class="bi bi-exclamation-triangle" style="color:red;"></i></h2>
                                                    <h5><p>You are About to Delete this Item.</p></h5>
                                                    
                                                </div>
                                                
                                               
                                                

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button class="btn btn-danger" name="deletedata">Delete</button></a>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                        </div>          

                                             
            

<?php require_once 'page_sections/scripts.php'; ?>  
<script>

$(document).ready( function () {
    $('.editbtn').on('click', function(){
        $('#editmodal').modal('show');

        $tr = $(this).closest ('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();

        }).get();

        console.log(data);

        $('#update_id').val(data[0]);
        $('#grade').val(data[1]);
        $('#section').val(data[2]);
        $('#adviserl option:selected').val(data[3]);
   
      

    });
});
</script>
<script>
  $(document).ready(function(){
      $('.deletebtn').click(function (e){
          e.preventDefault();

        var class_id = $(this).closest('tr').find('.class_id').text();
        console.log(class_id);
        $('#delete_id').val(class_id);
        $('#deleteModal').modal('show');
      });
  })
</script>     

<?php require_once 'page_sections/footer.php'; ?>