

<div class="d-flex flex-column min-vh-100">
        <nav class="navbar bg-light shadow-sm">
            <div class="navbar-brand">
            <a href="adviserindex.php"><img class="logo-navbar" width="40" height="40" src="assets/logo.png"></a> ILS JHS 
            </div>
            <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#CC5500">
          <i class="bi bi-person-fill"></i> <?php echo $result['username']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-ad" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="adviseraccount.php"><i class="bi bi-person-lines-fill"></i> Account</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-in-right"></i> Sign Out</a></li>
          </ul>
          </div>
          </nav>