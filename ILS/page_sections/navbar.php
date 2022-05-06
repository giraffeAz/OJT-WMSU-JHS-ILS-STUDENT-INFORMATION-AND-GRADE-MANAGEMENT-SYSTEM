
<div class="d-flex flex-column min-vh-100">

<nav class="navbar  bg-light shadow-sm header">
            <div class="navbar-brand">
            <img class="logo-navbar" width="40" height="40" src="assets/logo.png"> ILS JHS
            </div>
            <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#CC5500">
          <i class="bi bi-person-fill"></i> Admin
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-admin" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="adminaccount.php"><i class="bi bi-person-lines-fill"></i> Account</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-in-right"></i> Sign Out</a></li>
          </ul>
          </div>
      </nav>

          <nav class="navbar navbar-expand-lg navbar-light bg-white  shadow-sm header navlink">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="dashboard.php">List of Classes</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Masterlist
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                     
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
                      <li><a class="dropdown-item" href="manageclass.php">Class</a></li>
                      <li><a class="dropdown-item" href="managequarter.php">Quarter</a></li>
                      <li><a class="dropdown-item" href="schoolyearlist.php">School Year </a></li>
                    </ul>
                  </li>
                  
                </ul>
              
              </div>
            </div>
          </nav>

