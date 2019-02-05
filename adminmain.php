<?php
session_start();
include_once 'initials.php';
if(!isset($_SESSION['admin'])){
  header('Location: adminlogin.php');
  exit();
}

if(isset($_POST['submit'])){
    $db;
    $date=$_POST["date_from"];
    $title = mysqli_real_escape_string($db, $_POST["title"]);
    $department = mysqli_real_escape_string($db, $_POST["department"]);
    $level = mysqli_real_escape_string($db, $_POST["level"]);
    $type_of_event = mysqli_real_escape_string($db, $_POST["type_of_event"]);
    $date_from = mysqli_real_escape_string($db, $_POST["date_from"]);
    $date_to = mysqli_real_escape_string($db, $_POST["date_to"]);
    $type_of_participant = mysqli_real_escape_string($db, $_POST["type_of_participant"]);
    $resource_person_name = mysqli_real_escape_string($db, $_POST["resource_person_name"]);
    $resource_person_desg = mysqli_real_escape_string($db, $_POST["resource_person_desg"]);
    $resource_person_org = mysqli_real_escape_string($db, $_POST["resource_person_org"]);
    $area_of_expertise = mysqli_real_escape_string($db, $_POST["area_of_expertise"]);
    $status = "incomplete";
    $user = $_SESSION["user"];

    $sql = "INSERT INTO event (title, department, level, type_of_event,
            date_from, date_to, type_of_participant, resource_person_name,
            resource_person_desg, resource_person_org, area_of_expertise, status, username)
            values ('$title', '$department', '$level', '$type_of_event', '$date_from', '$date_to',
                    '$type_of_participant', '$resource_person_name', '$resource_person_desg',
                    '$resource_person_org', '$area_of_expertise', '$status', '$user')";
    $run=mysqli_query($db,$sql);
    if($run){
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

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="SCOE">
        </div>
        <div class="sidebar-brand-text mx-3">Event Management</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="create_faculty.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Create Faculty account</span></a>
      </li>

      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="adminmain.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Generate Report</span></a>
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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Event Report</h1>
          </div>

        <div class="row">

          <div class="col col-sm-12">






        <div style="overflow-x: scroll">
            <table class="table" style="min-height: 80%">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Department</th>
                  <th scope="col">Level</th>
                  <th scope="col">Type of event</th>
                  <th scope="col">Date from</th>
                  <th scope="col">Date to</th>
                  <th scope="col">Type of Participant</th>
                  <th scope="col">Resource Person Name</th>
                  <th scope="col">Resource Person Designation</th>
                  <th scope="col">Resource Person Org</th>
                  <th scope="col">No. Of Participant</th>
                  <th scope="col">Area of expertise</th>
                  <th scope="col">Description</th>
                  <th scope="col">Outcome</th>
                  <th scope="col">Expenditure</th>
                  <th scope="col">Revenue</th>
                  <th scope="col">Funding Agency</th>
                  <th scope="col">Funds</th>
                  <th scope="col">Status</th>
                  <th scope="col">Association</th>
                  <th scope="col">Rank</th>
                  <th scope="col">Achievement Student/Staff</th>
                  <th scope="col">Achievement Dept.</th>
                  <th scope="col">Achievement College</th>
                  <th scope="col">PSO1 No.</th>
                  <th scope="col">PSO1 Desc.</th>
                  <th scope="col">PSO2 No.</th>
                  <th scope="col">PSO2 Desc.</th>
                  <th scope="col">PSO3 No.</th>
                  <th scope="col">PSO3 Des.</th>
                  <th scope="col">PSO4 No.</th>
                  <th scope="col">PSO4 Desc.</th>
                  <th scope="col">PSO5 No.</th>
                  <th scope="col">PSO5 Desc.</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $db;
                    $sql = "select * from event where status = 'complete';";
                    $result = mysqli_query($db, $sql);
                    if ($result) {
                        while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td scope="row"><?php echo $rows["title"] ?></td>
                        <td scope="row"><?php echo $rows["department"] ?></td>
                        <td scope="row"><?php echo $rows["level"] ?></td>
                        <td scope="row"><?php echo $rows["type_of_event"] ?></td>
                        <td scope="row"><?php echo $rows["date_from"] ?></td>
                        <td scope="row"><?php echo $rows["date_to"] ?></td>
                        <td scope="row"><?php echo $rows["type_of_participant"] ?></td>
                        <td scope="row"><?php echo $rows["resource_person_name"] ?></td>
                        <td scope="row"><?php echo $rows["resource_person_desg"] ?></td>
                        <td scope="row"><?php echo $rows["resource_person_org"] ?></td>
                        <td scope="row"><?php echo $rows["no_of_participants"] ?></td>
                        <td scope="row"><?php echo $rows["area_of_expertise"] ?></td>
                        <td scope="row"><?php echo $rows["description"] ?></td>
                        <td scope="row"><?php echo $rows["outcome"] ?></td>
                        <td scope="row"><?php echo $rows["expenditure"] ?></td>
                        <td scope="row"><?php echo $rows["revenue"] ?></td>
                        <td scope="row"><?php echo $rows["expenditure"] ?></td>
                        <td scope="row"><?php echo $rows["funding_agency"] ?></td>
                        <td scope="row"><?php echo $rows["funds"] ?></td>
                        <td scope="row"><?php echo $rows["association"] ?></td>
                        <td scope="row"><?php echo $rows["rank"] ?></td>
                        <td scope="row"><?php echo $rows["ach_student_staff"] ?></td>
                        <td scope="row"><?php echo $rows["ach_dept"] ?></td>
                        <td scope="row"><?php echo $rows["ach_college"] ?></td>
                        <td scope="row"><?php echo $rows["pso1"] ?></td>
                        <td scope="row"><?php echo $rows["pso_desc1"] ?></td>
                        <td scope="row"><?php echo $rows["pso2"] ?></td>
                        <td scope="row"><?php echo $rows["pso_desc2"] ?></td>
                        <td scope="row"><?php echo $rows["pso3"] ?></td>
                        <td scope="row"><?php echo $rows["pso_desc3"] ?></td>
                        <td scope="row"><?php echo $rows["pso4"] ?></td>
                        <td scope="row"><?php echo $rows["pso_desc4"] ?></td>
                        <td scope="row"><?php echo $rows["pso5"] ?></td>
                        <td scope="row"><?php echo $rows["pso_desc5"] ?></td>
                    </tr>
                <?php 
                        } 
                    }
                ?>
              </tbody>
            </table>
        </div>


            <button class="btn btn-primary"><a href="export.php" style="color:white">Export</a></button>
          </div>

        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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
