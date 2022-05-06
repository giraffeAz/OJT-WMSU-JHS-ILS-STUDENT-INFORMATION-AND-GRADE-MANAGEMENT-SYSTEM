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
        
        

        <!-- Datatables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

         <!-- jquery -->
        <script src="assets/jquery/jquery.min.js"></script>
        <!-- jquery ui -->  
        <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
        <script src="assets/jquery-ui/jquery-ui.min.js"></script>
          <!-----------JSLOADER------------------>
          <script src="assets/js/load.js"></script>
        <title>Manage Class Adviser</title>

       
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
                        <h6 class="m-0 font-weight-bold" >Manage Adviser</h6>
                        <?php include 'actions/addAdviser.php' ?>
                        <?php

                        if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                        {
                            ?>
                            <div id='add-adviser-messages' class='alert alert-success d-flex align-items-center text-center' role='alert'>
                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                            <div class='text-center'>
                            <?php echo $_SESSION['success']; ?>
                            </div>
                            </div>
                        <?php
                        }
                        unset($_SESSION['success']);
                        ?>
                        <?php

                        if(isset($_SESSION['error']) && $_SESSION['error'] != '')
                        {
                            ?>
                            <div id='add-adviser-messages' class='alert alert-danger d-flex align-items-center text-center' role='alert'>
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
                                  <button class="btn btn-add" data-bs-toggle="modal" id="addAdviserModalBtn" data-bs-target="#addAdviserModal" style="float:right;"><i class="bi bi-plus-lg"></i> Adviser</button>
                        </div> <!--end of div-action -->
                    </div>
                    <div class="card-body">
                    
                        <div class="table-responsive">
                            <table class="table table-bordered"  id="manageAdviserTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="color:#CC5500">
                                        <th style="display:none;">Id</th>
                                        
                                        <th >Name of Class Adviser</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Password</th>
                                       
                                        <th class="text-center">Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>

                                <?php
                                     include 'functions/connectdb.php';

                                    
                                     $sql=  mysqli_query($con, "SELECT * FROM users WHERE access = 2");
                                     while($row = mysqli_fetch_assoc($sql)) {
 
                                         $count = mysqli_num_rows($sql);
                                     
                                     ?>  

                                   
                                  
                                   <tr>
                                       <td style="display:none;" class="adviser_id"><?php echo $row['user_id'] ?></td>
                                       <td  style="text-transform: capitalize;"><?php echo $row['lastname'] ?>, <?php echo $row['firstname'] ?>  <?php echo $row['middlename'] ?></td>
                                       <td ><?php echo $row['username'] ?></td>
                                       <td class="text-center">**********</td>
                                       <td class="d-flex justify-content-center">
                                           <button class="btn btn-info resetbtn" data-bs-toggle="modal" ><i class="bi bi-bootstrap-reboot"></i> Reset</button> &nbsp&nbsp&nbsp&nbsp
                                           <button class="btn btn-success editbtn" data-bs-toggle="modal"  ><i class="bi bi-pencil-square"></i> Edit</button> &nbsp&nbsp&nbsp&nbsp
                                           <button  class="btn btn-danger deletebtn"  ><i class="bi bi-trash"></i> Delete</button>
                                        
                                       </td> 
                                         
                                   </tr>
                                  
                                   <?php } mysqli_close($con);
                                  

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
 
<!--ADD Modal -->
                                  <div class="modal fade" id="addAdviserModal" tabindex="-1"  aria-labelledby="addModalLabel" aria-hidden="true" role="dialog" >
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable "id="">
                                            <div class="modal-content">
                                            <div class="modal-header ">
                                                <h5 class="modal-title" id="head">Create New Record</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                            <div id="add-adviser-messages"></div>
                                           
                                            <form   id="submitAdviserForm" action="" method="POST">

                                                <div class="col-md-12">
                                                    <label for="lname" class="form-label">Last name</label>
                                                    <input type="text" autocomplete="off" name="lname" class="form-control" id="lname" placeholder="Last Name" required>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="fname" class="form-label">First name</label>
                                                    <input type="text" autocomplete="off" name="fname" class="form-control"  id="fname" placeholder="First Name" required>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="middlename" class="form-label">Middle name</label>
                                                    <input type="text" autocomplete="off" name="mname" class="form-control"  id="mname" placeholder="First Name" required>
                                                    
                                                </div>
                                              
                                                
                                               
                                                <div class="col-md-12">
                                                    <label for="uname" class="form-label">Username</label>
                                                    <input type="text" autocomplete="off" name="uname" class="form-control" id="uname" placeholder="Enter Username" required>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="password" class="form-label">Password</label>
                                                   
                                                    
                                                    <input type="password" name="password" class="form-control" id="password"  aria-describedby="inputGroupPrepend" placeholder="Password" required>
                                                    
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                                    
                                                    
                                                    <input type="password" name="cPassword" class="form-control" id="cpassword" aria-describedby="inputGroupPrepend" placeholder="Confirm Password" required>
                                                
                                                </div>
                                                
                                            
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                                                <input class="btn btn-add" id="btn_add"  name="submit" type="submit"  value="Create" />
                                            </div>
                                            </form>  
                                            </div>
                                            </div>
                                          
                                        </div>
                                        </div>
<!--Reset Modal -->
                                    <div class="modal fade" id="resetmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="head">Reset Password</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="resetpassword.php" method="post" >
                                            <input  type="hidden" name="adviser_id"  id="reset_id">
                                                <div class="col-md-12">
                                                    <label for="resetpassword" class="form-label">New Password</label>
                                                    <div class="input-group mb-3">
                                                    <input type="password" name="resetpassword" class="form-control" id="resetpassword"  aria-describedby="inputGroupPrepend" placeholder="Enter New Password" required>
                                                   
                                                        <span class="input-group-text">
                                                        <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer"></i>
                                                        </span>
                                                    
                                                    </div>         
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="confirmpassword" class="form-label">Confirm Password</label>
                                                    <div class="input-group mb-3">
                                                    <input type="password" name="confirmpassword" class="form-control" id="confirmpassword"  aria-describedby="inputGroupPrepend" placeholder="Confirm Password" required> 
                                                    <span class="input-group-text">
                                                        <i class="bi bi-eye-slash" id="toggleCPassword" style="cursor: pointer"></i>
                                                    </span>
                                                </div> 
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button  class="btn btn-danger" name="resetpass" >Reset</button>
                                              
                                            </div> 
                                        </form>
                                            </div>
                                        </div>
                                        </div>   

<!--EDIT Modal -->
                                     <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="head">Edit Adviser Name</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form >
                                            <input type="hidden" id="update_id" name="update_id">
                                             <div class="col-md-12">
                                                    <label for="lastname" class="form-label">Last name</label>
                                                    <input type="text" name="lastname" class="form-control" id="lastname"  required>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="firstname" class="form-label">First name</label>
                                                    <input type="text" name="firstname" class="form-control"  id="firstname"  required>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="firstname" class="form-label">Middle name</label>
                                                    <input type="text" name="firstname" class="form-control"  id="middlename"  required>
                                                    
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
                                                    
                                                </div>
                                              

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
                                          <div class="modal fade" id="deleteModal" tabindex="-1" >
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                           
                                            <div class="modal-body">
                                            <form action="deleteadviser.php" method="POST">

                                            <div class="col-md-12 text-center">
                                                    <input  type="hidden" name="adviser_id"  id="delete_id">
                                                    <h2><i class="bi bi-exclamation-triangle" style="color:red;"></i></h2>
                                                    <h5><p>You are About to Delete this Item.</p></h5>
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button  class="btn btn-danger" name="deletedata" >Delete</button>
                                            </div>
                                        </form>
                                            </div>
                                        </div>
                                        </div>  
                                      

                                                      
                                       
<?php require_once 'page_sections/scripts.php'; ?>  

<script>
  $(document).ready(function(){
      $('.deletebtn').click(function (e){
          e.preventDefault();

        var adviser_id = $(this).closest('tr').find('.adviser_id').text();
        console.log(adviser_id);
        $('#delete_id').val(adviser_id);
        $('#deleteModal').modal('show');
      });
  })
</script> 

<script>
  $(document).ready(function(){
      $('.resetbtn').click(function (e){
          e.preventDefault();

        var adviser_id = $(this).closest('tr').find('.adviser_id').text();
        console.log(adviser_id);
        $('#reset_id').val(adviser_id);
        $('#resetmodal').modal('show');
      });
  })
</script> 
   
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
        $('#lastname').val(data[1]);
        $('#firstname').val(data[2]);
        $('#middlename').val(data[3]);
        $('#username').val(data[3]);
       
        


    });
});
</script>
<script>
   const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#resetpassword");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

      
</script>
<script>
   const toggleCPassword = document.querySelector("#toggleCPassword");
        const cpassword = document.querySelector("#confirmpassword");

        toggleCPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = cpassword.getAttribute("type") === "cpassword" ? "text" : "cpassword";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        
</script>    

<?php require_once 'page_sections/footer.php'; ?>  