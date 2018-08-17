<!-- - var menuBorder = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Deal Finder. Find amazing deals  around you. Save on restaurants, events, travel, various products and many more...">
  <meta name="keywords" content="dealls finder, deal, savings, travel,products, restaurants, entertainment">
  <meta name="author" content="PIXINVENT">
  <title>Deal Finder -  Save on everyday purchases</title>
  <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/selects/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/custom.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/app.css">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/search.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/checkboxes-radios.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css"> -->
  <link rel="stylesheet" type="text/css" href="../../../css/app.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 1-column   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark navbar-border">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <!-- <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="{{url('/')}}"><i class="ft-menu font-large-1"></i></a></li> -->
          <li class="nav-item">
            <a class="navbar-brand" href="{{url('/')}}">
              <img class="brand-logo" alt="stack admin logo" src="../../../app-assets/images/logo/stack-logo-light.png">
              <h2 class="brand-text">Deal Finder</h2>
            </a>
          </li>
          <!-- <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li> -->
        </ul>
      </div>
      <div class="navbar-container">
        <!-- <div class="collapse navbar-toggleable-sm justify-content-end" id="navbar-mobile">
          <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="{{url('/')}}"><i class="ficon ft-arrow-left"></i></a></li>
            <li class="dropdown nav-item">
              <a class="nav-link mr-2 nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-settings"></i></a>
            </li>
          </ul>
        </div> -->
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  @yield('body')

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer fixed-bottom footer-dark navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href=""
        target="_blank">Deal Finder </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="../../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="../../../app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="../../../app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="../../../app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="../../../app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/forms/tags/form-field.js" type="text/javascript"></script>
  <script src="../../../app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>

</html>