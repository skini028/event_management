<?php
session_start();
include_once 'initials.php';
if(!isset($_SESSION['user'])){
  header('Location: login.php');
  exit();
}

if(isset($_POST['submit'])){
    $db;
    $id = $_POST["event"];
    $sql = "UPDATE event set status = 'Cancelled' where id = '$id'";
    $run = mysqli_query($db, $sql);
    if ($run) {
        $_SESSION["msg"] = "Event succesfully cancelled";
        $_SESSION["msg_type"] = "info";
        header('Location: ' . 'main.php', true, false ? 301 : 302);
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Event Management System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
     
    <style>
    </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">Event Management</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="main.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Add Event</span></a>
      </li>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="complete_event.php">
          <i class="fas fa-fw fa-check"></i>
          <span>Event Completion</span></a>
      </li>

      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="cancel_event.php">
          <i class="fas fa-fw fa-times"></i>
          <span>Cancel Event</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        <div class="sidebar-brand-icon">
          <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="SCOE">
        </div>
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-text mx-3">Saraswati College of Engineering</div>
      </a>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="logout.php">
                Logout
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

        <?php
            if(isset($_SESSION["msg"]) && $_SESSION["msg"] != '' && $_SESSION["msg_type"] != '') {
        ?>
            <div class="alert alert-<?php echo $_SESSION["msg_type"]; ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION["msg"]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
        <?php
                unset($_SESSION["msg"]);
                unset($_SESSION["msg_type"]);
            }
        ?>


          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cancel Event</h1>
          </div>

            <form class="form-signin col-sm-6 offset-sm-3" method="POST" action="cancel_event.php">
              <div class="input-field s12 mt-4">
                <label for="event">Select event to cancel</label>
                <select class="form-control" name="event" id="event" required>
                    <option value="" selected disabled>Select event to cancel</option>
                      <?php
                      $db;
                      $user = $_SESSION['user'];
                      $sql = "select id from event where username = '$user' and status = 'incomplete'";
                      $execute = mysqli_query($db, $sql);
                      while ($rows = mysqli_fetch_array($execute)) {
                          $id = $rows["id"]; 
                        ?>
                          <option value="<?php echo $id ?>"><?php echo $id ?></option>
                      <?php } ?>

                  </select>
              </div>

               <input class="btn btn-lg btn-primary text-uppercase mt-4 offset-sm-4" type="submit" name="submit" value="Submit">
            </form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Saraswati College Of Engineering</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
