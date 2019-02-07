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

    $query = "SELECT COUNT(id) from event where department = '$department'";
    $run = mysqli_query($db, $query);
    $existing_count = mysqli_fetch_array($run)[0];
    $existing_count = $existing_count + 1;
    $event_id = $department . $existing_count;

    $sql = "INSERT INTO event (id, title, department, level, type_of_event,
            date_from, date_to, type_of_participant, resource_person_name,
            resource_person_desg, resource_person_org, area_of_expertise, status, username)
            values ('$event_id','$title', '$department', '$level', '$type_of_event', '$date_from', '$date_to',
                    '$type_of_participant', '$resource_person_name', '$resource_person_desg',
                    '$resource_person_org', '$area_of_expertise', '$status', '$user')";
    $run=mysqli_query($db,$sql);
    if($run){
        $_SESSION["msg"] = "Event succesfully created with ID " . $event_id;
        $_SESSION["msg_type"] = "success";
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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">Event Management</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
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

      <li class="nav-item">
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
            <h1 class="h3 mb-0 text-gray-800">Create New Event</h1>
          </div>

        <div class="row justify-content-center">

          <div class="col col-sm-10">
            <form id="form" name="create_event" method="post" class="col s12">

                <div class="row">
                    <div class="input-field col s12 mt-4">
                        <label>Title of the event</label>
                        <input class="form-control" name="title" type="text" placeholder="Enter event title" required>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col-sm-6 s12 mt-4">
                        <label>Department</label>
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

                    <div class="input-field col-sm-6 s12 mt-4">
                        <label>Event level</label>
                        <select name="level" class="form-control" required>
                          <option value="" >Level</option>
                          <option value="INTERNATIONAL">INTERNATIONAL</option>
                          <option value="NATIONAL">NATIONAL</option>
                          <option value="STATE">STATE</option>
                          <option value="INTER-COLLEGE">INTER-COLLEGE</option>
                          <option value="INSTITUTIONAL">INSTITUTIONAL</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col-sm-6 s12 mt-4">
                        <label>Event type</label>
                          <select name="type_of_event" class="form-control" required>
                            <option value="">Type of Event</option>
                            <option value="ADD-ON">ADD-ON</option>
                            <option value="SITE VISIT">SITE VISIT</option>
                            <option value="POSTER PRESENTATION">POSTER PRESENTATION</option>
                            <option value="TECHNICAL CONFRENCE">TECHNICAL CONFRENCE</option>
                            <option value="STTP">STTP</option>
                            <option value="FDP">FDP</option>
                            <option value="INDUSTRIAL VISIT">INDUSTRIAL VISIT</option>
                            <option value="MODEL COMPETITION">MODEL COMPETITION</option>
                            <option value="PROJECT COMPETITION">PROJECT COMPETITION</option>
                            <option value="PAPER PRESENTATION">PAPER PRESENTATION</option>
                            <option value="TRAINING">TRAINING</option>
                            <option value="ANY OTHER">ANY OTHER</option>
                          </select>
                    </div>
                      <div class="input-field col s12 mt-4">
                        <label>Participant type</label>
                        <select name="type_of_participant" class="form-control" required>
                            <option value="">Type of Participants</option>
                              <option value="staff">STAFF</option>
                              <option value="student">STUDENT</option>
                              <option value="both">BOTH</option>
                        </select>

                      </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col mt-4">
                                <label>Date From</label>
                                <input class="form-control" type="date" name="date_from" placeholder="Date from" required />
                            </div>
                            <div class="col mt-4">
                                <label>Date To</label>
                                <input class="form-control" type="date" name="date_to" placeholder="Date to" required />
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                      <div class="input-field col s12 mt-4">
                        <label>Resource person's name</label>
                        <input class="form-control" name="resource_person_name" type="text" placeholder="Resource Person's Name" required>
                      </div>

                      <div class="input-field col s12 mt-4">
                        <label>Resource person's designation</label>
                        <input class="form-control" name="resource_person_desg" type="text" placeholder="Resource Person's Designation" required>
                      </div>
                </div>


                <div class="row">
                  <div class="input-field col s12 mt-4">
                        <label>Resource person's organisation</label>
                    <input class="form-control" name="resource_person_org" type="text" placeholder="Resource Person's Organisation" required>
                  </div>

                  <div class="input-field col s12 mt-4">
                        <label>Resource person's area of expertise</label>
                    <input class="form-control" name="area_of_expertise" type="text" placeholder="Area of Expertise" required>
                  </div>
                </div>

              <div class="card-action">
               <input class="btn btn-lg btn-primary offset-sm-5 text-uppercase mt-4"  onclick="submitForm()" type="submit" name="submit" value="Submit">
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
