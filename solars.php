<?php 
    $conn = new mysqli('localhost', 'root', '', 'vio');
    if (!$conn) {
      die("Failed to connect to MYSQLi" . $conn->connct_error);
    } 

    $sql = "select * from solar_installations";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->get_result();
    $installations = $results->fetch_all(MYSQLI_ASSOC);




      $sql = "SELECT DISTINCT location FROM solar_installations ORDER BY location ASC; ";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $results = $stmt->get_result();
      $locations = $results->fetch_all(MYSQLI_ASSOC);
?>



<?php include './inc/header.php' ?>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="./assets/img/vio.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal">
          DRTS
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">

    
        <li class="">
        <a href="./user">
            <i class="nc-icon nc-single-02"></i>
            <p>Add Solar Record</p>
        </a>
    </li>
    <li class="active">
        <a href="./solars">
            <i class="nc-icon nc-tile-56"></i>
            <p>Solar Records</p>
        </a>
    </li>
    <li class="">
      <a href="./add-vehicle-record">
        <i class="nc-icon nc-tile-56"></i>
        <p>Add Vehicle Records</p>
      </a>
    </li>
    <li class="">
        <a href="./vehicles">
            <i class="nc-icon nc-single-02"></i>
            <p>Vehicle Records</p>
        </a>
    </li>

    <?php foreach($locations as $location) :?>
      <?php extract($location) ?>
      <li >
          <a href="./card?location=<?= $location ?>">
              <i class="nc-icon nc-tile-56"></i>
              <p><?= $location ?></p>
          </a>
      </li>
    <?php endforeach; ?>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Directorate Of Road Traffic Services (DRTS)</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input onkeyup="myFunction()" type="text" id="search"  class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>      <!-- End Navbar -->


      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Showing Results for <?= $results->num_rows ?> Solar Installation(s)</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th class="th-sm text-secondary">id</th>
                      <th class="th-sm text-secondary">Location</th>
                      <th class="th-sm text-secondary">Capacity</th>
                      <th class="th-sm text-secondary">No. of Batteries</th>
                      <th class="th-sm text-secondary">No. of Panels</th>
                      <th class="th-sm text-secondary">No. of Standalone Street Lights</th>
                      <th class="th-sm text-secondary">Date</th>
                      <th class="th-sm text-secondary">Service Rendered</th>
                      <th class="th-sm text-secondary">Service Rendered</th>
                      <th class="th-sm text-secondary">MTCE_Attestation</th>
                      <th class="th-sm text-secondary">TACS Attestation</th>
                      <th class="th-sm text-secondary">Remarks</th>
                    </thead>
                    <tbody>
                      <?php foreach ($installations as $installation) : ?>
                        <?php extract($installation) ?>
                        <tr>
                          <td><?= $id?></td>
                          <td><?= $location ?></td>
                          <td><?= $capacity ?></td>
                          <td><?= $capacity ?></td>
                          <td><?= $no_of_batteries ?></td>
                          <td><?= $no_of_panels ?></td>
                          <td><?= $no_of_st_lights ?></td>
                          <td><?= $date ?></td>
                          <td><?= $service_rendered ?></td>
                          <td><?= $MTCE_Attestation == 'yes' ? 'Approved' : 'Not Approved'?></td>
                          <td><?= $tacs_attestation == "" ? "Awaiting Approval" : 'Approved' ?></td>
                          <td><?= $remarks ?></td>
                          

                          <td>
                            <a href="edit.php?id=<?= $id; ?>" type="button" rel="tooltip" class="btn btn-small btn-success">
                              <!-- <i class="material-icons">edit</i> -->
                              <span>Edit</span>
                            </a>
                          </td>
                          <td>
                            <a href="delete.php?id=<?= $id; ?>&p=<?= basename($_SERVER['PHP_SELF']) ?>" type="button" rel="tooltip" class="btn btn-small btn-danger">
                              <!-- <i class="material-icons">edit</i> -->
                              <span>Delete</span>
                            </a>
                          </td>

                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <footer class="footer footer-black  footer-white ">
  <div class="container-fluid">
    <div class="row">
      <nav class="footer-nav">
        <ul>
          <li><a href="javascript:void(0)" >Developer Sam - 08112823412</a></li>
          <li><a href="javascript:void(0)" >Blog</a></li>
          <li><a href="javascript:void(0)" >Contact Me</a></li>
        </ul>
      </nav>
      <div class="credits ml-auto">
        <span class="copyright">
          <span>&copy;</span> <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="fa fa-heart heart"></i> by Samuel Ehimen
        </span>
      </div>
    </div>
  </div>
</footer>    </div>
  </div>

  <?php include './inc/scripts.php'?>
  


</body>

</html>