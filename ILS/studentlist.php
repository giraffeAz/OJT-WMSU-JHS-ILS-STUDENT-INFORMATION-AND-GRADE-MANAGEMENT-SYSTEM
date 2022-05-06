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
    

        <title>Student List</title>
 
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

            .formlabel{
                text-align:left;
                justify-content:left;
               
            }
            .actionbutton{
                margin-left: 2rem;
                margin-right: 2rem;
            }
            footer {
             
                bottom: 0;
                width: 100%;
                height: 60px;
                line-height: 60px;
                background-color: #CC5500;
            }

            footer span{
                font-size: 12px;
            }
        </style>
    </head>
    <body>
    <div class="d-flex flex-column min-vh-100">
    <nav class="navbar bg-light shadow-sm header">
            <div class="navbar-brand">
            <img class="logo-navbar" width="30" height="30" src="assets/logo.png"> ILS JHS 
            </div>
            <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#CC5500">
          <i class="bi bi-person-fill"></i> Admin
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill"></i> Account</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-in-right"></i> Sign Out</a></li>
          </ul>
          </div>
          </nav>

          <nav class="navbar navbar-expand-lg navbar-light shadow-sm navlink">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">List of Classes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="form137.php">Form 137</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Masterlist
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="studentlist.php">Students List </a></li>
                      <li><a class="dropdown-item" href="adviserlist.php">Advisers List</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="subjectlist.php">Subjects List</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Maintenance
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="schoolyearlist.php">School Year </a></li>
                      <li><a class="dropdown-item" href="gradelist.php">Grade list</a></li>
                    </ul>
                  </li>
                  
                </ul>
              
              </div>
            </div>
          </nav>
            <section>
           
            <div class="container mt-5 pt-5">
                <div class="row">
                    <div class="col-sm-8 col-md-12 m-auto">
                        <div class="card border mb-3 shadow text-center" style="width: 70rem;">
                            <div class="card-header text-start">
                                   
                                <p class="h6 text-start">List of Student</p>
                                                    <div class="droplevel"  style="float:right;">
                                                    <label for="validationCustom04" class="form-label">Grade Level</label>
                                                    <select class="form-select" id="validationCustom04" placeholder="Select" required>
                                                    <option>Select Grade Level</option>   
                                                    <option selected>Grade 7</option>
                                                    <option>Grade 8</option>
                                                    <option>Grade 9</option>
                                                    <option>Grade 10</option>
                                                    </select>
        </div>
                                                  
                                                
                                
                            </div>
                            <div class="card-body">
                               <p class="text-start"></p>
                               <br>
                               <br>
                               <br>
                               <div class="table-responsive-sm">
                                <table class="table">
                                <thead >
                                <tr>
                                <th  scope="col">#</th>   
                                <th  colspan=2 scope="col">Name of the Student</th>
                                <th  scope="col">Section</th> 
                                <th  colspan=3 scope="col">Action</th>
                               
                                </tr>

                                </thead>   
                                <thead class="text-center">
                                <tr>
                               
                                </thead>
                                <tbody>
                                <tr>
                                <td>1</td>
                                <td colspan=2  >Juan Jose Dela Cruz</td>
                                <td>A</td>
                                <td colspan=3 class="actionbutton">
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#infoModal" ><i class="bi bi-info-circle"></i></button>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" ><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="bi bi-trash"></i></button>
                               </td>
                              
                                </tr>
                                
                                
                                </tbody>
                                </table>
 
                            </div>
 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </section>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create New Record</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form class="row g-3 needs-validation" novalidate>

                                                <div class="col-md-12">
                                                    <label for="validationCustom01" class="form-label">Subject name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Last Name"  required>
                                                    <div class="valid-feedback">
                                                    Looks good!
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                <label for="validationCustom02" class="form-label">Applied Grade Level</label>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        All
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Grade 7
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Grade 8
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Grade 9
                                                    </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Grade 10
                                                    </label>
                                                    </div>

                                                    
                                                </div>
                                                
                                               
                                               
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="addadviser.php"><button type="button" class="btn btn-primary">Create</button></a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                          <!-- Modal -->
     <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Science Info</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form class="row g-3 needs-validation" novalidate>

                                            <div class="col-md-12">
                                                    <label for="validationCustom01" class="form-label">Subject name:  Science</label>
                                                    
                                                </div>
                                                
                                                <div class="col-md-12">
                                                <label for="validationCustom02" class="form-label">Applied Grade Level : All</label>
                                                   
                                                   
                                                   
                                                </div>
                                                
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                               
                                            </div>
                                            </div>
                                        </div>
                                        </div>                         

             <!-- Modal -->
     <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form class="row g-3 needs-validation" novalidate>

                                                <div class="col-md-8">
                                                    <label for="validationCustom03" class="form-label">LRN</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="123456789" required>
                                                    <div class="invalid-feedback">
                                                    Please Enter LRN.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="validationCustom01" class="form-label">Last name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Dela Cruz"  required>
                                                    <div class="valid-feedback">
                                                    Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="validationCustom02" class="form-label">First name</label>
                                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Juan" required>
                                                    <div class="valid-feedback">
                                                    Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="validationCustomUsername" class="form-label">Middle Name</label>
                                                    <div class="input-group has-validation">
                                                    
                                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Jose" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <label for="validationCustom04" class="form-label">Sex</label>
                                                    <select class="form-select" id="validationCustom04" placeholder="Select" required>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    Please select a Sex.
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="validationCustom05" class="form-label">Date of Birth</label>
                                                    
                                                        <div class="input-group date" id="datepicker" id="validationCustom05" placeholder="dd/mm/yyyy" required>
                                                            <input type="text" class="form-control">
                                                            <span class="input-group-append">
                                                                <span class="input-group-text bg-white d-block">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                            </span>
                                                        </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="validationCustom01" class="form-label">School ID</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="School ID"  required>
                                                    <div class="valid-feedback">
                                                    Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="validationCustom02" class="form-label">Name of School</label>
                                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Name of the school" required>
                                                    <div class="valid-feedback">
                                                    Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="validationCustomUsername" class="form-label">School Address</label>
                                                    <div class="input-group has-validation">
                                                    
                                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="School Address" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                    </div>
                                                </div>
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Create</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>                     
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                           
                                            <div class="modal-body">
                                            <form class="row g-3 needs-validation" novalidate>

                                            <div class="col-md-12 text-center">
                                                   <h2><i class="bi bi-exclamation-triangle" style="color:red;"></i></h2>
                                                    <h5><p>You are About to Delete this Item.</p></h5>
                                                    
                                                </div>
                                                
                                               
                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="addadviser.php"><button type="button" class="btn btn-danger">Delete</button></a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>          
     
            <footer class="footer fixed-bottom">
              <div class="container">
                <span >WMSU Integrated Laboratory School Junior Highschool</span>
             </div>
          </footer>
    </div>    
    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>

    </body>
</html>