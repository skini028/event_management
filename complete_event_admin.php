<?php

include("initials.php");
session_start();

if(!isset($_SESSION['admin'])){
  header('Location: adminlogin.php');
  exit();
}
$error = "";

if(isset($_POST['submit'])){
    $db;
    $event=$_POST["event"];
    $date_from = mysqli_real_escape_string($db, $_POST["date_from"]);
    $date_to = mysqli_real_escape_string($db, $_POST["date_to"]);
    $no_of_participants = mysqli_real_escape_string($db, $_POST["no_of_participants"]);
    $description = mysqli_real_escape_string($db, $_POST["description"]);
    $outcome = mysqli_real_escape_string($db, $_POST["outcome"]);
    $expenditure = mysqli_real_escape_string($db, $_POST["expenditure"]);
    $revenue = mysqli_real_escape_string($db, $_POST["revenue"]);
    $funding_agency = mysqli_real_escape_string($db, $_POST["funding_agency"]);
    $funds = mysqli_real_escape_string($db, $_POST["funds"]);
    $association = mysqli_real_escape_string($db, $_POST["association"]);
    $rank = mysqli_real_escape_string($db, $_POST["rank"]);
    $ach_student_staff = mysqli_real_escape_string($db, $_POST["ach_student_staff"]);
    $ach_dept = mysqli_real_escape_string($db, $_POST["ach_dept"]);
    $ach_dept = mysqli_real_escape_string($db, $_POST["ach_dept"]);
    $ach_college = mysqli_real_escape_string($db, $_POST["ach_college"]);

    $pso1 = mysqli_real_escape_string($db, $_POST["pso1"]);
    $pso_desc1 = mysqli_real_escape_string($db, $_POST["pso_desc1"]);

    $pso2 = mysqli_real_escape_string($db, $_POST["pso2"]);
    $pso_desc2 = mysqli_real_escape_string($db, $_POST["pso_desc2"]);

    $pso3 = mysqli_real_escape_string($db, $_POST["pso3"]);
    $pso_desc3 = mysqli_real_escape_string($db, $_POST["pso_desc3"]);

    $pso4 = mysqli_real_escape_string($db, $_POST["pso4"]);
    $pso_desc4 = mysqli_real_escape_string($db, $_POST["pso_desc4"]);

    $pso4 = mysqli_real_escape_string($db, $_POST["pso4"]);
    $pso_desc4 = mysqli_real_escape_string($db, $_POST["pso_desc4"]);

    $pso5 = mysqli_real_escape_string($db, $_POST["pso5"]);
    $pso_desc5 = mysqli_real_escape_string($db, $_POST["pso_desc5"]);


    $status = "complete";

    $sql = "UPDATE event set
        no_of_participants = '$no_of_participants',
        description = '$description',
        date_from = '$date_from',
        date_to = '$date_to',
        outcome = '$outcome',
        expenditure = '$expenditure',
        revenue = '$revenue',
        funding_agency = '$funding_agency',
        funds = '$funds',
        status = '$status',
        association = '$association',
        rank = '$rank',
        ach_student_staff = '$ach_student_staff',
        ach_dept = '$ach_dept',
        ach_college = '$ach_college',
        pso1 = '$pso1',
        pso_desc1 = '$pso_desc1',
        pso2 = '$pso2',
        pso_desc2 = '$pso_desc2',
        pso3 = '$pso3',
        pso_desc3 = '$pso_desc3',
        pso4 = '$pso4',
        pso_desc4 = '$pso_desc4',
        pso5 = '$pso5',
        pso_desc5 = '$pso_desc5'
        where title = '$event';";

    $run=mysqli_query($db, $sql);

    if($run){
        $_SESSION["msg"] = "Event succesfully completed";
        $_SESSION["msg_type"] = "success";
        header('Location: ' . 'adminmain.php', true, false ? 301 : 302);
        exit();
    } else {
        echo $sql;
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

  <script type="text/javascript">        
    function addPso() {
      var i;
      for (i = 1; i < 6; i++) {
        var pso = document.getElementById("pso"+i);
        if (pso.hasAttribute('hidden')) {
          pso.removeAttribute('hidden');
          break;
        } 
        if (i == 4) {
          var btn = document.getElementById("addPsoBtn");
          btn.classList.add("disabled");
        }   
      }
    }
    
  </script>

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
        <li class="nav-item active">
            <a class="nav-link" href="complete_event_admin.php">
                <i class="fas fa-fw fa-check"></i>
                <span>Completet Event</span>
            </a>
        </li>

        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="notification.php">
                <i class="fas fa-fw fa-check"></i>
                <span>Send notification</span>
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

          <!-- Page Heading 
            -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Complete Event</h1>
          </div>

            <div class="row justify-content-center">
                <div class="col col-sm-10">
                    <form class="form-signin" method="POST" action="complete_event.php">

                        <div class="row">
                          <div class="input-field col-sm-4 s12 mt-4">
                            <label for="event">Select event for completion</label>
                            <select class="form-control" name="event" id="event" required>
                                <option value="" selected disabled>Select event for completion</option>

                                      <?php
                                      $db;
                                      $sql = "select id from event where status = 'incomplete'";
                                      $execute = mysqli_query($db, $sql);
                                      while ($rows = mysqli_fetch_array($execute)) {
                                          $id = $rows["id"]; 
                                        ?>
                                          <option value="<?php echo $id ?>"><?php echo $id ?></option>
                                      <?php } ?>

                              </select>
                          </div>

                        <div class="input-field col-sm-3 mt-4">
                          <label class="label">No. Of participants</label>
                          <input class="form-control" name="no_of_participants" type="text" placeholder="No. of participants" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col-sm-6 mt-4">
                            <label>Description of event</label>
                          <textarea rows="1" class="form-control" name="description" type="text" placeholder="Enter description of event" required></textarea>
                        </div>
                    
                        <div class="input-field col-sm-6 mt-4">
                            <label>Outcome of event</label>
                          <textarea rows="1" class="form-control" name="outcome" type="text" placeholder="Enter event outcome" required></textarea>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12 mt-4">
                         <label>Expenditure</label>
                          <input class="form-control" name="expenditure" type="text" placeholder="Enter event expenditure" >
                        </div>

                        <div class="input-field col s12 mt-4">
                         <label>Revenue</label>
                          <input class="form-control" name="revenue" type="text" placeholder="Enter event revenue generated" >
                      </div>

                        <div class="input-field col s12 mt-4">
                         <label>Funding agency</label>
                          <input class="form-control" name="funding_agency" type="text" placeholder="Enter event funding agency" >
                        </div>

                        <div class="input-field col-sm-3 s12 mt-4">
                         <label>Funds recieved</label>
                          <input class="form-control" name="funds" type="text" placeholder="Enter event funds recieved" >
                        </div>
                      </div>

                    <div class="row">
                        <div class="col-sm-12 mt-4">
                             <label>Association and Collaboration</label>
                            <input class="form-control" name="association" type="text" placeholder="Enter Association and collaboration">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 mt-4">
                            <label>Rank Achieved</label>
                            <textarea rows="1" class="form-control" name="rank" type="text" placeholder="Enter rank if achieved any"></textarea>
                        </div>

                        <div class="col-sm-6 mt-4">
                            <label>Student/Staff achievement</label>
                            <textarea rows="1" class="form-control" name="ach_student_staff" type="text" placeholder="Enter student and staff achievement"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 mt-4">
                            <label>Department achievement</label>
                            <textarea rows="1" class="form-control" name="ach_dept" type="text" placeholder="Enter department achievement"></textarea>
                        </div>

                        <div class="col-sm-6 mt-4">
                            <label>College achievement</label>
                            <textarea rows="1" class="form-control" name="ach_college" type="text" placeholder="Enter college achievement"></textarea>
                        </div>
                    </div>

                     <div class="row" id="pso1">
                      <div class="input-field col-sm-3 mt-4">
                        <label>PSO1 Objective</label>
                        <input class="form-control" name="pso1" type="text" placeholder="Enter Objective" >
                      </div>

                      <div class="input-field col-sm-9 s12 mt-4">
                        <label>PSO1 Descripion</label>
                        <textarea rows="1" class="form-control" name="pso_desc1" type="text" placeholder="Enter description for PSO1" ></textarea>
                      </div>
                    </div>

                     <div class="row" id="pso2" hidden>
                      <div class="input-field col-sm-3 mt-4">
                        <label>PSO2 Objective</label>
                        <input class="form-control" name="pso2" type="text" placeholder="Enter Objective">
                      </div>

                      <div class="input-field col-sm-9 mt-4">
                            <label>PSO2 Descripion</label>
                        <textarea rows="1" class="form-control" name="pso_desc2" type="text" placeholder="Enter description for PSO2" ></textarea>
                      </div>
                    </div>

                    <div class="row" id="pso3" hidden>
                      <div class="input-field col-sm-3 mt-4">
                            <label>PSO3 Objective</label>
                        <input class="form-control" name="pso3" type="text" placeholder="Enter Objective" >
                      </div>

                      <div class="input-field col-sm-9 mt-4">
                            <label>PSO3 Descripion</label>
                        <textarea rows="1" class="form-control" name="pso_desc3" type="text" placeholder="Enter description for PSO3" ></textarea>
                      </div>
                    </div>

                    <div class="row" id="pso4" hidden>
                      <div class="input-field col-sm-3 mt-4">
                            <label>PSO4 Objective</label>
                        <input class="form-control" name="pso4" type="text" placeholder="Enter Objective" >
                      </div>

                      <div class="input-field col-sm-9 mt-4">
                            <label>PSO4 Descripion</label>
                        <textarea rows="1" class="form-control" name="pso_desc4" type="text" placeholder="Enter description for PSO4" ></textarea>
                      </div>
                    </div>

                    <div class="row" id="pso5" hidden>
                      <div class="input-field col-sm-3 mt-4">
                            <label>PSO5 Objective</label>
                        <input class="form-control" name="pso5" type="text" placeholder="Enter Objective" >
                      </div>

                      <div class="input-field col-sm-9 mt-4">
                            <label>PSO5 Descripion</label>
                        <textarea rows="1" class="form-control" name="pso_desc5" type="text" placeholder="Enter description for PSO5" ></textarea>
                      </div>
                    </div>

                    <div class="input-field col s12 mt-4">
                        <button id="addPsoBtn" type="button" class="btn btn-primary" onclick="addPso()">Add PSO</button>
                    </div>

                   <input class="btn btn-lg btn-primary btn-block text-uppercase mt-4" type="submit" name="submit" value="Submit">
                  </form>
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
