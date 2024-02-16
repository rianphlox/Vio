<?php
$conn = new mysqli('localhost', 'root', '', 'vio');
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
        <a href="javascript:void(0)" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="./assets/img/vio.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="javascript:void(0)" class="simple-text logo-normal">
          DTRS
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">

          <li class="active">
            <a href="./user">
              <i class="nc-icon nc-single-02"></i>
              <p>Add Solar Record</p>
            </a>
          </li>
          <li>
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


          <?php foreach ($locations as $location) : ?>
            <?php extract($location) ?>
            <li>
              <a href="./card?location=<?= $location ?>">
                <i class="nc-icon nc-tile-56"></i>
                <p><?= $location ?></p>
              </a>
            </li>
          <?php endforeach; ?>
          <!-- <li >
        <a href="./secondary">
            <i class="nc-icon nc-tile-56"></i>
            <p>Secondary Payments</p>
        </a>
    </li> -->
          <!-- <li class="active-pro">
        <a href="./upgrade">
            <i class="nc-icon nc-spaceship"></i>
            <p>Upgrade to PRO</p>
        </a>
    </li> -->

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
            <a class="navbar-brand" href="javascript:void(0);">
              <div class="logo-image-small">
                <!-- <img height="50px" src="./assets/img/vio.png"> -->
              </div>
              Directorate Of Road Traffic Services (DRTS)
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
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
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
      </nav> <!-- End Navbar -->
      <div class="content">
        <div class="row">

          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <!-- <h5 class="card-title text-center">Maintenance Division</h5> -->
                <h5 class="text-sm text-center">Solar Installations Service Card</h5>
              </div>
              <div class="card-body">
                <form method="post" id="addSolarPanel">
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Location / Traffic Area Command</label>
                        <select name="location" id="location" class="form-control">
                          <option>HQ-1</option>
                          <option>HQ-2</option>
                          <option>HQ-3</option>
                          <option>HQ-4</option>
                          <option>HQ-5</option>
                          <option>HQ-6</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Capacity of Inverter</label>
                        <input type="text" placeholder="1kVA" class="form-control" name="capacity">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. Of Batteries</label>
                        <input type="number" class="form-control" min="1" name="no_of_batteries" id="">
                      </div>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. of Panels</label>
                        <input type="number" min="1" name="no_of_panels" id="zcx" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. of Stand Alone Street Lights</label>
                        <input type="number" name="no_of_st_lights" id="zx" min="0" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" id="date" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Service Rendered</label>
                        <input type="text" name="service_rendered" id="service_rendered" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" name="remarks" id="remarks" class="form-control">
                      </div>
                    </div>


                  </div>

              </div>
              <div class="_row">
                <div class="_update ml-auto _mr-auto">
                  <button type="submit" class="btn btn-block btn-primary _btn-round">Add Record</button>
                </div>
              </div>
              </form>
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
              <li><a href="javascript:void(0)">Creative Tim</a></li>
              <li><a href="javascript:void(0)">Blog</a></li>
              <li><a href="javascript:void(0)">Licenses</a></li>
            </ul>
          </nav>
          <div class="credits ml-auto">
            <span class="copyright">
              &copy; <script>
                document.write(new Date().getFullYear())
              </script>, made with <i class="fa fa-heart heart"></i> by Samuel Michael
            </span>
          </div>
        </div>
      </div>
    </footer>
  </div>
  </div>

  <?php include './inc/scripts.php' ?>

  <script>
    const form = document.querySelector('#addSolarPanel')

    form.addEventListener('submit', e => {
      e.preventDefault();
      fetch("./req/add.php", {
          method: "POST",
          body: new FormData(form)
        })
        .then(res => res.json())
        .then(data => {
          demo.showNotification('top', 'right', data.msgClass, data.msg, data.icon);
          if (data.msgClass == 'success') {
            form.reset();
          }
        })
    })
  </script>

</body>

</html>