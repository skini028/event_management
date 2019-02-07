<?php

include("initials.php");
session_start();

if(!isset($_SESSION['user'])){
  header('Location: login.php');
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
        header('Location: ' . 'main.php', true, false ? 301 : 302);
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
    
    function eventChange() {
        var event = document.getElementById("event").value;
        console.log("event changed");
        window.location.href = "complete_event.php?event=" + event;
    }

    
  </script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Event Management</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="main.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Add Event</span></a>
      </li>

      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="complete_event.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Event Completion</span></a>
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
            -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Comlete event</h1>
          </div>

            <div class="row justify-content-center">
                <div class="col col-sm-9">
                    <form class="form-signin" method="POST" action="complete_event.php">

                        <div class="row">
                          <div class="input-field col s12 mt-4">
                              <select class="form-control" name="event" id="event" onchange="eventChange()" required>
                              <option value="" selected disabled>Select event for completion</option>

                              <?php
                              $db;
                              $user = $_SESSION['user'];
                              $sql = "select title from event where username = '$user' and status = 'incomplete'";
                              $execute = mysqli_query($db, $sql);
                              while ($rows = mysqli_fetch_array($execute)) {
                                  $title = $rows["title"]; 
                                  if (isset($_GET["event"])) {
                                      $event = $_GET["event"];
                                  } else {
                                      $event = "";
                                  }
                                ?>
                                  <option value="<?php echo $title ?>" <?php if($event == $title) echo 'selected' ?> ><?php echo $title ?></option>
                              <?php } ?>

                              </select>
                          </div>
                      </div>

                    
                    </br>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <?php if(isset($_GET["event"])) {
                                    $event = $_GET["event"];
                                    $sql = "select date_from, date_to from event where title = '$event'";
                                    $execute = mysqli_query($db, $sql);
                                    $result = mysqli_fetch_array($execute);
                                    $date_from = $result[0];
                                    $date_to = $result[1];
                                ?>
                                <label>Date From</label>
                                <input class="form-control" type="date" name="date_from" value="<?php echo $date_from; ?>" placeholder="Date from" required />
                            </div>
                            <div class="col">
                                <label>Date To</label>
                                <input class="form-control" type="date" name="date_to" value="<?php echo $date_to; ?>" placeholder="Date to" required />
                            </div>
                            <?php
                              }
                            ?>
                        </div>
                    </div>


                      <div class="row">
                        <div class="input-field col mt-4">
                          <input class="form-control" name="no_of_participants" type="text" placeholder="Enter no. of participants" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12 mt-4">
                          <input class="form-control" name="description" type="text" placeholder="Enter description of event" required>
                        </div>
                      </div>
                    
                      <div class="row">
                        <div class="input-field col s12 mt-4">
                          <input class="form-control" name="outcome" type="text" placeholder="Enter event outcome" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12 mt-4">
                          <input class="form-control" name="expenditure" type="text" placeholder="Enter event expenditure" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12 mt-4">
                          <input class="form-control" name="revenue" type="text" placeholder="Enter event revenue generated" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12 mt-4">
                          <input class="form-control" name="funding_agency" type="text" placeholder="Enter event funding agency" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col-sm-12 s12 mt-4">
                          <input class="form-control" name="funds" type="text" placeholder="Enter event funds recieved" required>
                        </div>
                      </div>


                    <div class="row">
                        <div class="col-sm-12 mt-4">
                            <input class="form-control" name="association" type="text" placeholder="Enter Association and collaboration">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12 mt-4">
                            <input class="form-control" name="rank" type="text" placeholder="Enter rank if achieved any">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 mt-4">
                            <input class="form-control" name="ach_student_staff" type="text" placeholder="Enter student and staff achievement">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 mt-4">
                            <input class="form-control" name="ach_dept" type="text" placeholder="Enter department achievement">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 mt-4">
                            <input class="form-control" name="ach_college" type="text" placeholder="Enter college achievement">
                        </div>
                    </div>

                     <div class="row" id="pso1">
                      <div class="input-field col-sm-2 mt-4">
                        <input class="form-control" name="pso1" type="text" placeholder="Enter PSO1" required>
                      </div>

                      <div class="input-field col-sm-10 s12 mt-4">
                        <input class="form-control" name="pso_desc1" type="text" placeholder="Enter description for PSO1" required>
                      </div>
                    </div>

                     <div class="row" id="pso2" hidden>
                      <div class="input-field col-sm-2 mt-4">
                        <input class="form-control" name="pso2" type="text" placeholder="Enter PSO2">
                      </div>

                      <div class="input-field col-sm-10 mt-4">
                        <input class="form-control" name="pso_desc2" type="text" placeholder="Enter description for PSO2" >
                      </div>
                    </div>

                    <div class="row" id="pso3" hidden>
                      <div class="input-field col-sm-2 mt-4">
                        <input class="form-control" name="pso3" type="text" placeholder="Enter PSO3" >
                      </div>

                      <div class="input-field col-sm-10 mt-4">
                        <input class="form-control" name="pso_desc3" type="text" placeholder="Enter description for PSO3" >
                      </div>
                    </div>

                    <div class="row" id="pso4" hidden>
                      <div class="input-field col-sm-2 mt-4">
                        <input class="form-control" name="pso4" type="text" placeholder="Enter PSO4" >
                      </div>

                      <div class="input-field col-sm-10 mt-4">
                        <input class="form-control" name="pso_desc4" type="text" placeholder="Enter description for PSO4" >
                      </div>
                    </div>

                    <div class="row" id="pso5" hidden>
                      <div class="input-field col-sm-2 mt-4">
                        <input class="form-control" name="pso5" type="text" placeholder="Enter PSO5" >
                      </div>

                      <div class="input-field col-sm-10 mt-4">
                        <input class="form-control" name="pso_desc5" type="text" placeholder="Enter description for PSO5" >
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
