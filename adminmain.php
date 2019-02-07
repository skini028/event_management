<?php
session_start();
include_once 'initials.php';
if(!isset($_SESSION['admin'])){
  header('Location: adminlogin.php');
  exit();
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-text mx-3">Event Management</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="adminmain.php">
                  <i class="fas fa-fw fa-file-alt"></i>
                  <span>Generate Report</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="create_faculty.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Create Faculty account</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="complete_event_admin.php">
                    <i class="fas fa-fw fa-check"></i>
                    <span>Completet Event</span>
                </a>
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
                    <!-- Page Heading
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Event Report</h1>
                    </div>
                    -->
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



                    <div class="row">
                        <div class="col">
                            <div style="overflow-x: scroll">
                                <table class="table" style="min-height: 80%">
                                    <thead class="thead-dark">
                                        <tr class="d-flex">
                                            <th class="col-1" scope="col">Title</th>
                                            <th class="col-1" scope="col">Department</th>
                                            <th class="col-1" scope="col">Level</th>
                                            <th class="col-1" scope="col">Type of event</th>
                                            <th class="col-1" scope="col">Date from</th>
                                            <th class="col-1" scope="col">Date to</th>
                                            <th class="col-1" scope="col">Type of Participant</th>
                                            <th class="col-1" scope="col">Resource Person Name</th>
                                            <th class="col-1" scope="col">Resource Person Designation</th>
                                            <th class="col-1" scope="col">Resource Person Org</th>
                                            <th class="col-1" scope="col">No. Of Participant</th>
                                            <th class="col-1" scope="col">Area of expertise</th>
                                            <th class="col-1" scope="col">Description</th>
                                            <th class="col-1" scope="col">Outcome</th>
                                            <th class="col-1" scope="col">Expenditure</th>
                                            <th class="col-1" scope="col">Revenue</th>
                                            <th class="col-1" scope="col">Funding Agency</th>
                                            <th class="col-1" scope="col">Funds</th>
                                            <th class="col-1" scope="col">Status</th>
                                            <th class="col-1" scope="col">Association</th>
                                            <th class="col-1" scope="col">Rank</th>
                                            <th class="col-1" scope="col">Achievement Student/Staff</th>
                                            <th class="col-1" scope="col">Achievement Dept.</th>
                                            <th class="col-1" scope="col">Achievement College</th>
                                            <th class="col-1" scope="col">PSO1 Objective<th>
                                            <th class="col-2" scope="col">PSO1 Desc.</th>
                                            <th class="col-1" scope="col">PSO2 Objective<th>
                                            <th class="col-2" scope="col">PSO2 Desc.</th>
                                            <th class="col-1" scope="col">PSO3 Objective<th>
                                            <th class="col-2" scope="col">PSO3 Des.</th>
                                            <th class="col-1" scope="col">PSO4 Objective<th>
                                            <th class="col-2" scope="col">PSO4 Desc.</th>
                                            <th class="col-1" scope="col">PSO5 Objective<th>
                                            <th class="col-2" scope="col">PSO5 Desc.</th>
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
                                        <tr class="d-flex">
                                            <td class="col-1"><?php echo $rows["title"] ?></td>
                                            <td class="col-1"><?php echo $rows["department"] ?></td>
                                            <td class="col-1"><?php echo $rows["level"] ?></td>
                                            <td class="col-1"><?php echo $rows["type_of_event"] ?></td>
                                            <td class="col-1"><?php echo $rows["date_from"] ?></td>
                                            <td class="col-1"><?php echo $rows["date_to"] ?></td>
                                            <td class="col-1"><?php echo $rows["type_of_participant"] ?></td>
                                            <td class="col-1"><?php echo $rows["resource_person_name"] ?></td>
                                            <td class="col-1"><?php echo $rows["resource_person_desg"] ?></td>
                                            <td class="col-1"><?php echo $rows["resource_person_org"] ?></td>
                                            <td class="col-1"><?php echo $rows["no_of_participants"] ?></td>
                                            <td class="col-1"><?php echo $rows["area_of_expertise"] ?></td>
                                            <td class="col-1"><?php echo $rows["description"] ?></td>
                                            <td class="col-1"><?php echo $rows["outcome"] ?></td>
                                            <td class="col-1"><?php echo $rows["expenditure"] ?></td>
                                            <td class="col-1"><?php echo $rows["revenue"] ?></td>
                                            <td class="col-1"><?php echo $rows["expenditure"] ?></td>
                                            <td class="col-1"><?php echo $rows["funding_agency"] ?></td>
                                            <td class="col-1"><?php echo $rows["funds"] ?></td>
                                            <td class="col-1"><?php echo $rows["association"] ?></td>
                                            <td class="col-1"><?php echo $rows["rank"] ?></td>
                                            <td class="col-1"><?php echo $rows["ach_student_staff"] ?></td>
                                            <td class="col-1"><?php echo $rows["ach_dept"] ?></td>
                                            <td class="col-1"><?php echo $rows["ach_college"] ?></td>
                                            <td class="col-1"><?php echo $rows["pso1"] ?></td>
                                            <td class="col-2"><?php echo $rows["pso_desc1"] ?></td>
                                            <td class="col-1"><?php echo $rows["pso2"] ?></td>
                                            <td class="col-2"><?php echo $rows["pso_desc2"] ?></td>
                                            <td class="col-1"><?php echo $rows["pso3"] ?></td>
                                            <td class="col-2"><?php echo $rows["pso_desc3"] ?></td>
                                            <td class="col-1"><?php echo $rows["pso4"] ?></td>
                                            <td class="col-2"><?php echo $rows["pso_desc4"] ?></td>
                                            <td class="col-1"><?php echo $rows["pso5"] ?></td>
                                            <td class="col-2"><?php echo $rows["pso_desc5"] ?></td>
                                        </tr>
                                        <?php 
                                            } 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="export.php"><button class="btn btn-primary btn-lg mt-4">Export</button></a>
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
