<?php 
  session_start();
  if (!isset($_SESSION['SESSION_ID'])) {
	header('Location: login.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plantilla/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plantilla/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plantilla/dist/css/table.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plantilla/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plantilla/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plantilla/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTable -->
  <link href="plantilla/plugins/table/datatables.min.css" rel="stylesheet">
  <!-- Toast -->
  <link href="plantilla/plugins/toastr/toastr.min.css" rel="stylesheet">
	<!-- SweetAlert2-->
	<link rel="stylesheet" href="plantilla/plugins/sweetalert2/sweetalert2.min.css">
  <!--Link css loader -->
  <link rel="stylesheet" href="plantilla/dist/css/loader.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="plantilla/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include 'view/include/navbar.php' ?>
  <!-- /.navbar -->
  <!-- ===================================================== -->

  <!-- Main Sidebar Container -->
  <?php include 'view/include/menu.php' ?>
  <!-- /Main Sidebar Container -->
  <!-- ===================================================== -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="main_container">
  <?php include 'view/include/main_container.php' ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include 'view/include/footer.php' ?>
  <!-- /Footer -->
  <!-- ===================================================== -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


 <!-- ScriptJS -->

  <!-- ===================================================== -->
  
<!-- Agrega jQuery (asegúrate de tener jQuery antes de cargar el archivo de DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- jQuery -->
<script src="plantilla/plugins/jquery/jquery.min.js"></script>
<!-- Agrega jQuery (asegúrate de tener jQuery antes de cargar el archivo de DataTables) -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="plantilla/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plantilla/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plantilla/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="plantilla/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plantilla/plugins/moment/moment.min.js"></script>
<script src="plantilla/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plantilla/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plantilla/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plantilla/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="plantilla/dist/js/adminlte.js"></script>

<!-- js personalize with controller -->
<script src="js/controller_view_page.js"></script>

<!-- DataTable -->
<script src="plantilla/plugins/table/datatables.min.js"></script>
<script src="plantilla/plugins/toastr/toastr.min.js"></script>

<!-- SweetAlert2-->
<script src="plantilla/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="plantilla/plugins/sweetalert2/sweetalert2.min.js"></script>

  
</script>
</body>
</html>
