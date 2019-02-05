<?php
session_start();
include_once 'initials.php';
if(!isset($_SESSION['user'])){
  header('Location: login.php');
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
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Add Event</span></a>
      </li>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
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
            <h1 class="h3 mb-0 text-gray-800">Create New Event</h1>
          </div>

        <div class="row">

          <div class="col col-sm-6">
            <form id="form" name="create_event" method="post" class="col s12">
                <div class="input-field col s12">
                    <select name="department" class="form-control" required>
                        <option value="">Organising Department</option>
                        <option value="IT">INFORMATION TECHNOLOGY</option>
                        <option value="CIVIL">CIVIL</option>
                        <option value="CS">COMPUTER SCIENCE</option>
                        <option value="MECH">MECHANICAL</option>
                        <option value="EXTC">EXTC</option>
                        <option value="AUTO">AUTOMOBILE</option>
                        <option value="EN">EN CELL</option>
                        <option value="PLACEMENT">PLACEMENT CELL</option>
                        <option value="NSS">NSS CELL</option>
                      </select>
                    </div>

                    <div class="input-field col s12 mt-4">
                        <select name="level" class="form-control" required>
                          <option value="" >Level</option>
                          <option value="INTERNATIONAL">INTERNATIONAL</option>
                          <option value="NATIONAL">NATIONAL</option>
                          <option value="STATE">STATE</option>
                          <option value="INTER-COLLEGE">INTER-COLLEGE</option>
                          <option value="INSTITUTIONAL">INSTITUTIONAL</option>
                        </select>
                    </div>

                    <div class="input-field col s12 mt-4">
                      <select name="type_of_event" class="form-control" required>
                        <option value="">Type of Event</option>
                        <option value="add_on">ADD-ON</option>
                        <option value="site_visit">SITE VISIT</option>
                        <option value="poster_presentation">POSTER PRESENTATION</option>
                        <option value="technical_conference">TECHNICAL CONFRENCE</option>
                        <option value="sttp">STTP</option>
                        <option value="fdp">FDP</option>
                        <option value="industrial_visit">INDUSTRIAL VISIT</option>
                        <option value="model_competition">MODEL COMPETITION</option>
                        <option value="project_competition">PROJECT COMPETITION</option>
                        <option value="paper_presentation">PAPER PRESENTATION</option>
                        <option value="training">TRAINING</option>
                        <option value="any_other">ANY OTHER</opti-on>
                      </select>
                    </div>

                    <div class="input-field col s12 mt-4">
                        <input class="form-control" name="title" type="text" placeholder="Enter event title" required>
                    </div>

                    </br>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label>Date From</label>
                                <input class="form-control" type="date" name="date_from" placeholder="Date from" required />
                            </div>
                            <div class="col">
                                <label>Date To</label>
                                <input class="form-control" type="date" name="date_to" placeholder="Date to" required />
                            </div>
                        </div>
                    </div>
<!--

                    <div class="col s12 mt-4">
                        <input type="text" pattern="\d{4}/\d{1,2}/\d{1,2}" class="datepicker"  id="from" width="276" name="date_from" value="Date From" required/>

                         <script>
                             $('#from').datepicker({
                                 uiLibrary: 'bootstrap4',
                                   format: 'yyyy/mm/dd'

                             });

                         </script>
                    </div>

                    <div class="col s12 mt-4">
                        <input type="text" pattern="\d{4}/\d{1,2}/\d{1,2}" class="datepicker"  id="to" width="276" name="date_to" value="Date To" required/>

                             <script>
                                 $('#to').datepicker({
                                     uiLibrary: 'bootstrap4',
                                       format: 'yyyy/mm/dd'

                                 });

                             </script>
                    </div>

-->



                          <div class="input-field col s12 mt-4">
                        <select name="type_of_participant" class="form-control" required>
                            <option value="">Type of Participants</option>
                          <option value="staff">STAFF</option>
                          <option value="student">STUDENT</option>
                          <option value="both">BOTH</option>
                        </select>

                      </div>




                          <div class="input-field col s12 mt-4">
                            <input class="form-control" name="resource_person_name" type="text" placeholder="Resource Person's Name" required>
                          </div>

                          <div class="input-field col s12 mt-4">
                            <input class="form-control" name="resource_person_desg" type="text" placeholder="Resource Person's Designation" required>
                          </div>


                          <div class="input-field col s12 mt-4">
                            <input class="form-control" name="resource_person_org" type="text" placeholder="Resource Person's Organisation" required>
                          </div>


                          <div class="input-field col s12 mt-4">
                            <input class="form-control" name="area_of_expertise" type="text" placeholder="Area of Expertise" required>
                          </div>



              <div class="card-action">
           <input class="btn btn-lg btn-primary btn-block text-uppercase mt-4"  onclick="submitForm()" type="submit" name="submit" value="Submit">
                 </div>
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
