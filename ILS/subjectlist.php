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
        <title>Manage Subject</title>

       
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
                        <h6 class="m-0 font-weight-bold" >Manage Subject</h6>
                        <?php
                        include 'newsubject.php';
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
                                  <button class="btn btn-add" data-bs-toggle="modal" id="addModalBtn" data-bs-target="#exampleModal" style="float:right;"><i class="bi bi-plus-lg"></i> Subject</button>
                        </div> <!--end of div-action -->
                    </div>
                    <section>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="color:#CC5500">
                                        <th style="display:none;">Id</th>
                                        <th class="text-center">Subject</th>
                                        <th class="text-center">Applicable for</th>
                                        <th class="text-center">Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                    include 'functions/connectdb.php';

                                    
                                    $sql=  mysqli_query($con, "SELECT * FROM subjects Order by subject_id ");
                                    while($row = mysqli_fetch_assoc($sql)) {

                                        $count = mysqli_num_rows($sql);
                                    
                                    ?>
  
                                    <tr>
                                        <td style="display:none;" class="subject_id"><?php echo $row['subject_id'] ?></td>
                                        <td><?php echo $row['subject'] ?></td>
                                        <td><?php echo $row['applied_grade'] ?></td>
                                        <td class="d-flex justify-content-center">
                                            
                                            <button  class="btn btn-success editbtn" data-bs-toggle="modal"  ><i class="bi bi-pencil-square"></i> Edit</button> &nbsp&nbsp&nbsp&nbsp
                                            <button class="btn btn-danger deletebtn" data-bs-toggle="modal"  data-bs-target="#deleteModal" ><i class="bi bi-trash"></i> Delete</button>
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
                     </section>
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
<!--ADD Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="head">Create New Subject</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form class="" method="post">
                                           
                                            
                                                <div class="col-md-12">
                                                    <label for="sub" class="form-label">Subject name</label>
                                                    <input type="text" class="form-control" id="sub" name="sub" id="sub"
                                                     placeholder="Enter Subject Name" value="" required/>
                                                </div>
                                               
                                                  
                                                

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
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" >Edit Subject</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form  action="updatesubject.php" method="post" id="editForm">
                                            <input type="hidden" id="update_id" name="update_id">
                                                <div class="col-md-12">
                                                    <label for="sub" class="form-label">Subject name</label>
                                                    <input type="text" class="form-control" name="sub" id="subj"
                                                     placeholder="Enter Subject Name" value=""/>
                                                </div>
                                               
                                                  
                                                

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
                                            <form action="deletesubject.php" method="POST">

                                            <div class="col-md-12 text-center">
                                                    <input  type="hidden" name="subject_id"  id="delete_id">
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
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
            $('#alertM').alert('close');
        }, 3000);
    });
</script>
<script>
  $('#dataTable').on('click','.deletebtn', function(e){
          e.preventDefault();

        var subject_id = $(this).closest('tr').find('.subject_id').text();
        console.log(subject_id);
        $('#delete_id').val(subject_id);
        $('#deleteModal').modal('show');
      
  });
</script> 
<script>

$('#dataTable').on('click','.editbtn', function(){
        

        $tr = $(this).closest ('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();

        }).get();

        console.log(data);

        $('#update_id').val(data[0]);
        $('#subj').val(data[1]);

        
       
        $('#editModal').modal('show');


   
});
</script>
<?php require_once 'page_sections/footer.php'; ?>  