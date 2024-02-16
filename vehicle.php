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
                    <li class="">
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
                    <li class="active">
                        <a href="./vehicles">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Vehicle Records</p>
                        </a>
                    </li>


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
                                <input onkeyup="myFunction()" type="text" id="search" class="form-control" placeholder="Search...">
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
            </nav> <!-- End Navbar -->


            <div class="content">
                <div class="row">


                    <div class="col-md-12">
                        <div>
                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="vehicles">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vehicle</li>
                            </ol>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Showing Records for Vehicle Inspection Number <?= $_GET['vin'] ?></h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th class="th-sm">Date</th>
                                            <th class="th-sm">Service Rendered</th>
                                            <th class="">H MTCE Attestation</th>
                                            <th class="">Driver's Attestation</th>
                                            <th class="">Grade</th>
                                            <th class=""></th>
                                            <th class=""></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>No Records for <?= $_GET['vin'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="view.php?vin=<?= $_GET['vin'] ?>" type="button" rel="tooltip" class="btn btn-small btn-warning">
                                                        <span>Add Record</span>
                                                    </a>
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

            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="javascript:void(0)">Developer Sam - 08112823412</a></li>
                                <li><a href="javascript:void(0)">Blog</a></li>
                                <li><a href="javascript:void(0)">Contact Me</a></li>
                            </ul>
                        </nav>
                        <div class="credits ml-auto">
                            <span class="copyright">
                                <span>&copy;</span>
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart heart"></i> by Samuel Ehimen
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php include './inc/scripts.php' ?>

</body>

</html>