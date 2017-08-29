<!DOCTYPE html>
<html lang="en">

  <head>

    <?php

      session_start(); 

      $GLOBALS['linksActive'] = array(
        "dashboard" => false,
        "data_usage" => false,
        "users" => false,
        "wifi_config" => false,
        "nfc" => false);

      $GLOBALS['links'] = array(
        "dashboard" => "Dashboard.php",
        "data_usage" => "UsageData.php",
        "users" => "Users.php",
        "wifi_config" => "WifiConfig.php",
        "nfc" => "NFC.php"
        );

      function setActive(String $link){
        foreach($GLOBALS['linksActive'] as $key => $value){
          if ($key == $link)
            $GLOBALS['linksActive'][$key] = true;
          else
            $GLOBALS['linksActive'][$key] = false;
        }
      }

      function getActive(String $link){
        if ($GLOBALS['linksActive'][$link]){
          echo "\"nav-item active\"";
        }
        else {
          echo "\"nav-item\"";
        }
      }

      function getURL(){
        foreach($GLOBALS['linksActive'] as $key => $value){
          if ($value){
            echo $GLOBALS['links'][$key];
            return;
          }
        }
      }

      setActive("dashboard");

      if(!isset($_GET)){
        setActive("dashboard");
      }

      if (isset($_SESSION['validated']) && $_SESSION['validated'] == false) {
          header('Location: login.php');
        }


    ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pi-Web - Management Console</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="#">Pi-Web</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class=<?php getActive("dashboard");?> data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="#">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">
                Dashboard</span>
            </a>
          </li>
          
          <li class=<?php getActive("data_usage");?> data-toggle="tooltip" data-placement="right" title="Data Usage">
            <a class="nav-link" href="#">
              <i class="fa fa-fw fa-area-chart"></i>
              <span class="nav-link-text">
                Data Usage</span>
            </a>
          </li>
          <li class=<?php getActive("users");?> data-toggle="tooltip" data-placement="right" title="Connected Users">
            <a class="nav-link" href="#">
              <i class="fa fa-fw fa-table"></i>
              <span class="nav-link-text">
                Connected Users</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuration">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-wrench"></i>
              <span class="nav-link-text">
                Configuration</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseComponents">
              <li>
                <a class=<?php getActive("wifi_config");?> href="#">WiFi Hotspot</a>
              </li>
              <li>
                <a class=<?php getActive("nfc");?> href="#">NFC</a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">System Overview</li>
        </ol>
      </div>

      <iframe src=<?php getUrl();?> name="main_iframe" style="border:none;" width="100%" height="100%"></iframe>
    </div>
    <!-- /.content-wrapper -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Design 3 - Team 50 - 2017</small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php?logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/sb-admin.min.js"></script>

  </body>

</html>
