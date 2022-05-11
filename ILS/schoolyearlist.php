<?php 

require_once 'functions/session.php';

if($_SESSION['user_type']!="admin")
{
    
    header("Location: accessdenied.php");
    die;
  

}


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
        <title>Manage School Year</title>
 
       
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
    <div class="loader">
    <img src="assets/loader.gif" alt="Loading..." />
    </div>  
    <?php require_once 'page_sections/navbar.php'; ?>
          <!-- Begin Page Content -->
          <div class="container container-fluid cardtablePanel">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold" >Manage School Year</h6>
                        <?php
                        include 'newsy.php';
                        ?> 
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
                        <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                  <button class="btn btn-add" data-bs-toggle="modal" id="addModalBtn" data-bs-target="#exampleModal" style="float:right;"><i class="bi bi-plus-lg"></i> School Year</button>
                        </div> <!--end of div-action -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="color:#CC5500">
                                        <th style="display:none;">Id</th>
                                        <th class="text-center">School Year</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php 
                                    include 'functions/connectdb.php';

                                    
                                    $sql=  mysqli_query($con, "SELECT * FROM school_year");
                                     while($row = mysqli_fetch_assoc($sql)) {
 
                                         $count = mysqli_num_rows($sql);
                                     
                                     ?>
                                     
                                 
 
                                    <tr>
                                        <td style="display:none;" class="sy_id"><?php echo $row['sy_id']; ?></td>
                                        <td><?php echo $row['school_year']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td class="d-flex justify-content-center">
                                            
                                            <button  class="btn btn-success editbtn" data-bs-toggle="modal"  ><i class="bi bi-pencil-square"></i> Edit</button> &nbsp&nbsp&nbsp&nbsp
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
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="" >
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="head">Create New School Year</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form class="" method="post">
                                            <input type="hidden" id="id" name="id">
                                                <div class="col-md-12">
                                                    <label for="sy" class="form-label">School Year</label>
                                                    <input type="text" class="form-control" id="sy" name="sy"
                                                     placeholder="From (YYYY) - To (YYYY)" value="<?php if(isset($_POST['sy'])){echo $_POST['sy'];} ?>"/>
                                                    
                                                </div>
                                                
                                                <p style="color:red;">
                                                     <?php if(isset($errors['sy'])){echo "<div class='alert' id='alert'>" .$errors['sy']. "</div>"; } ?>
                                                </p>
                                               
                                         
                                               
                                               
                                               
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

 <!--EDIT Modal -->
                                    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="head">Edit School Year</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="updateschoolyear.php" method="post">
                                            <input type="hidden" id="update_id" name="update_id">
                                                <div class="col-md-12">
                                                    <label for="sy" id="sy" class="form-label">School Year</label>
                                                    <input type="text" class="form-control" id="school_year" name="sy"
                                                      value="" readonly/>
                                                    
                                                </div>
                                                
                                                <div class="form-group">
                                                <label for="sy" class="cols-sm-2 control-label">Current</label>
                                                <div class="cols-sm-4" >
                                                <select name="status" id="status" class="form-select" required>
                                                <option disabled selected > </option>
                                                <option>No</option>
                                                <option>Yes</option>
                                                </select>
                                                </div>
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
                                       
<?php require_once 'page_sections/scripts.php'; ?> 
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
            $('#alertM').alert('close');
        }, 3000);
    });
</script>
<script>
 $('#dataTable').on('click','.editbtn', function(){   

        $('#editmodal').modal('show');

        $tr = $(this).closest ('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();

        }).get();

        console.log(data);

        $('#update_id').val(data[0]);
        $('#school_year').val(data[1]);
        $('#status option:selected').text(data[2]);
        
});
</script>

<?php require_once 'page_sections/footer.php'; ?>  