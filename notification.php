<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include("initials.php");
session_start();

if(!isset($_SESSION['admin'])){
 header('Location: adminlogin.php');
 exit();
}

function sendEmail($email, $id) {
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'collabooktest@gmail.com';                 // SMTP username
        $mail->Password = 'c\qp<=PjOM+E';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('collabooktest@gmail.com', 'SCOE');
        $mail->addAddress($email);     // Add a recipient
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Event completition alert';
        $mail->Body    = 'The event <b>' . $id . '</b> you registered for has ended. Please fill the event complition form';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $_SESSION["msg"] = "Email notification has been sent";
        $_SESSION["msg_type"] = "success";
    } catch (Exception $e) {
        $_SESSION["msg"] = "Failed to send email notification";
        $_SESSION["msg_type"] = "danger";
        exit();
    }

}

if(isset($_POST["submit"])) {
    $id = $_POST["event"];
    $user = $_POST["user"];
    $email = $_POST["email"];
    sendEmail($email, $id);
}

if(isset($_POST["send_all"])) {
    $db;
    $sql = "select event.id, event.title, event.date_from , event.date_to, event.username, faculty.email from event INNER JOIN faculty on event.username = faculty.username where event.date_to <= CURDATE() - INTERVAL 2 DAY AND event.status = 'incomplete'";
    $run = mysqli_query($db, $sql);
    while($rows = mysqli_fetch_array($run)) {
        sendEmail($rows["email"], $rows["id"]);
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

      <li class="nav-item">
        <a class="nav-link" href="adminmain.php">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Generate Report</span></a>
      </li>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="create_faculty.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Create Faculty account</span></a>
      </li>

        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="complete_event_admin.php">
                <i class="fas fa-fw fa-check"></i>
                <span>Completet Event</span>
            </a>
        </li>

        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="notification.php">
                <i class="fas fa-fw fa-mail"></i>
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
        <div class="sidebar-brand-icon">
          <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="SCOE">
        </div>
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-text mx-3">Saraswati College of Engineering</div>
      </a>


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
          <div class="d-sm-flex justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
          </div>

        <div class="row justify-content-center">

          <div class="col">

            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Date From</th>
                  <th scope="col">Date to</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $db;
                    $sql = "select event.id, event.title, event.date_from , event.date_to, event.username, faculty.email from event INNER JOIN faculty on event.username = faculty.username where event.date_to <= CURDATE() - INTERVAL 2 DAY AND event.outcome IS NULL AND event.status = 'incomplete'";
                    $run = mysqli_query($db, $sql);
                    while($rows = mysqli_fetch_array($run))
                    {
                ?>
                        <tr>
                            <td><?php echo $rows["id"]; ?></td>
                            <td><?php echo $rows["title"]; ?></td>
                            <td><?php echo $rows["date_from"]; ?></td>
                            <td><?php echo $rows["date_to"]; ?></td>
                            <td>
                                <form method="post">
                                    <input type="text" name="event" value="<?php echo $rows["id"]; ?>" hidden />
                                    <input type="text" name="user" value="<?php echo $rows["username"]; ?>" hidden />
                                    <input type="text" name="email" value="<?php echo $rows["email"]; ?>" hidden />
                                    <button name="submit" class="btn btn-primary">Send notification</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                ?>
              </tbody>
            </table>
            <form method="post">
                <button class="offset-sm-5 btn btn-primary" name="send_all" class="btn btn-primary">Send notification to all</button>
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
