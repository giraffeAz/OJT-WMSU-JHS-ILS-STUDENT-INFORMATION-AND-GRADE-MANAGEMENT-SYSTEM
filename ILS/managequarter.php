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
        <title>Manage Quarter</title>
 
       
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
                        <h6 class="m-0 font-weight-bold" >Manage Quarter</h6>
                        <?php
                        include 'currentquarter.php';
                        ?> 
                        <div style="display:none;" class="div-action pull pull-right" style="padding-bottom:20px;">
                                  <button class="btn btn-add" data-bs-toggle="modal" id="addModalBtn" data-bs-target="#exampleModal" style="float:right;"><i class="bi bi-plus-lg"></i> Quarter</button>
                        </div> <!--end of div-action -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="color:#CC5500">
                                        <th class="text-center">Quarter</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php 
                                    include 'functions/connectdb.php';

                                    
                                    $sql=  mysqli_query($con, "SELECT * FROM quarter");
                                     while($row = mysqli_fetch_assoc($sql)) {
 
                                         $count = mysqli_num_rows($sql);
                                     
                                     ?>
                                     
                                 
 
                                    <tr>
                                        <input type="hidden" id="id<?php echo $row["quarter_id"] ?>" name="id" value="<?php echo $row['quarter_id'] ?>">
                                        <td><input id="qt<?php echo $row["quarter_id"] ?>"  name="qt" type="text" style="border:0px" value="<?php echo $row['quarter_name'] ?>" disabled type></td>
                                        <td><input id="stats<?php echo $row["quarter_id"] ?>"  name="stats" type="text" style="border:0px" value="<?php echo $row['status'] ?>" disabled type></td>
                                        <td class="d-flex justify-content-center">
                                            
                                            <button onclick="update_qt(<?php echo $row["quarter_id"] ?>)" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="bi bi-pencil-square"></i> Edit</button> &nbsp&nbsp&nbsp&nbsp
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

                

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="" >
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="head">Edit Quarter</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form class="" method="post">
                                            <input type="hidden" id="id" name="id">
                                                <div class="col-md-12">
                                                    <label for="qt" class="form-label">Quarter</label>
                                                    <input type="text" class="form-control" id="qt" name="qt"
                                                     placeholder="" value="<?php if(isset($_POST['qt'])){echo $_POST['qt'];} ?>"readonly/>
                                                    
                                                </div>
                                           
                                                <div id="status"></div>
                                               
                                               
                                                <!--form--->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button id="btn_add" class="btn btn-add">Save</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>

                                        

                    
     
<?php require_once 'page_sections/scripts.php'; ?>    
<script>
  function update_qt($i){
   var i = $i;
   var stats = $("#stats"+i).val();
      $("#id").val($("#id"+i).val());
      $("#qt").val($("#qt"+i).val());
      $("#head").html('Update Quarter');
      $("#btn_add").html('Update');
     
    data = '<div class="form-group">'+
              '<label for="sy" class="cols-sm-2 control-label">Current</label>'+
            '<div class="cols-sm-4">'+
            '<select name="status" class="form-control" required>'+
            '<option disabled selected>'+stats+'</option>'+
              '<option>No</option>'+
              '<option>Yes</option>'+
            '</select>'+
             '</div>'+
            '</div>';
            $('#status').html(data);

  }
</script>

<?php require_once 'page_sections/footer.php'; ?>  