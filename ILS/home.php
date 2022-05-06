
     <!-- Begin Page Content -->
     <div class="container container-fluid cardtablePanel">
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">

                               
                                    
                        <h6 class="m-0 font-weight-bold" >Grade - Section </h6>

                       
                        <?php
                        include 'actions/addstudent.php';
                        ?>
                        <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                  <button class="btn btn-add" data-bs-toggle="modal" id="addCategoriesModalBtn" data-bs-target="#myModal" style="float:right;"><i class="bi bi-plus-lg"></i> Student</button>
                        </div> <!--end of div-action -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="students" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="color:#CC5500">
                                        <th >LRN </th>
                                        <th >Name of the Student</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Status</th>
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                    include 'functions/connectdb.php';
                                    $sql=  mysqli_query($con, "SELECT * FROM student_info order by lastname ");
                                    while($row = mysqli_fetch_assoc($sql)) {
                                    $sid = $row['student_id'];
                                  

                                    ?>
                                    <tr>
                                   
                                        <td><?php echo $row['lrn_no'] ?></td>
                                        <td><?php echo $row['lastname'] . ', ' . $row['firstname']. ' ' . $row['middlename'] ?></td>
                                        <td class="d-flex justify-content-center">
                                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#infoModal" ><i class="bi bi-info-circle"></i> Info</button> &nbsp&nbsp&nbsp&nbsp
                                                <a href="form137.php"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" ><i class="bi bi-eye"></i> Form 137</button></a> &nbsp&nbsp&nbsp&nbsp
                                                <a href="record.php"><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> Record</button></a>
                                        </td> 
                                        
                                        <td><div class="btn-group">
                                            <button type="button" class="btn btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                Status
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                                <li><button class="dropdown-item" type="button">Promoted</button></li>
                                                <li><button class="dropdown-item" type="button">Retained</button></li>
                                                <li><button class="dropdown-item" type="button">Dropped</button></li>
                                            </ul>
                                            </div>
                                        </td>
                                      
                                       
                                    </tr>
                               
                                    <?php
   
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

               

                </div>
                <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->
            <!-- Modal -->
     <!-- Modal -->
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
                                                    <input type="text" class="form-control" id="lrn" name="lrn" placeholder="Enter LRN"  maxlength="12" required>
                                                   
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="ln" class="form-label">Last name</label>
                                                    <input type="text" class="form-control" id="name" name="lname" placeholder="Last Name"  required>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="fn" class="form-label">First name</label>
                                                    <input type="text" class="form-control" id="name" name="fname" placeholder="First Name" required>
                                                  
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="mname" class="form-label">Middle Name</label>
                                                    <div class="input-group has-validation">
                                                    
                                                    <input type="text" class="form-control" id="name" name="mname" aria-describedby="inputGroupPrepend" placeholder="Middle Name" required>
                                                   
                                                    </div>
                                                </div>
                                              <div  class="col-md-12" > 
                                               <div class="col-md-3">
                                                    <label for="sex" class="form-label">Sex</label>
                                                    <select  id="sex"  name="sex" class="form-control input-xs" placeholder="Select" required>
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
                                                <h6><b>Intermediate Course Details </b></h6>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="sid" class="form-label">School ID</label>
                                                    <input type="text" class="form-control" id="sid" name="sid"  placeholder="Enter School ID"  required>
                                                   
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
                                                <div class="col-md-8">
                                                    <label for="ave" class="form-label">General Average</label>
                                                    <div class="input-group has-validation">
                                                    
                                                    <input  class="form-control" id="ave" name="ave" type="integer" aria-describedby="inputGroupPrepend" placeholder="Enter General Average" required>
                                                   
                                                    </div>
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
       
     
          
 
                                        <script>
    $(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_students.php',
          type: 'POST',
          data: 'id='+uid,
          beforeSend:function()
{
 $("#content").html('Working on Please wait ..');
},
success:function(data)
{
   $("#content").html(data);
},
     })

    });
})
  </script> 

<?php require_once 'page_sections/scripts.php'; ?>  
    <script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 2, "asc" ]] }
      );
        });
    </script>
