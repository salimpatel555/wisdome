<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Wisdom Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url()?>/assets/<?php echo base_url()?>/assets/images/WCELogo.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   <?php  $this->load->view('include/navbar')?>
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">     
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php  $this->load->view('include/sidebar')?>
      <!-- partial -->
      <div class="main-panel">
				<div class="content-wrapper">
          <?php include_once $page_name?>
			    <!-- content-wrapper ends -->
      </div>
        <!-- partial:partials/_footer.html -->
				<footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.  Premium <a href="#" target="_blank">Wisdom admin</a> from Peenacle. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo base_url()?>/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo base_url()?>/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url()?>/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo base_url()?>/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?php echo base_url()?>/assets/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url()?>/assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url()?>/assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url()?>/assets/js/template.js"></script>
  <script src="<?php echo base_url()?>/assets/js/settings.js"></script>
  <script src="<?php echo base_url()?>/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url()?>/assets/js/dashboard.js"></script>
  <script src="<?php echo base_url()?>/assets/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

</body>

</html>

