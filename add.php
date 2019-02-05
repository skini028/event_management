<?php
session_start();
include_once 'initials.php';
if(!isset($_SESSION['faculty'])){
  header('Location: index.php');
  exit();
}

include_once 'initials.php';
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
    $user = $_SESSION["faculty"];

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



<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Events</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>



  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<!-- DATEPICKER -->




<link href="css/mystyle.css" type="text/css" />

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">

      <div class="mx-auto order-0">
        <a class="navbar-brand" href="#">
         <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">Saraswati College of Engineering
       </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
              <span class="navbar-toggler-icon"></span>
          </button>
      </div>
      <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link active" href="logout.php">Log Out</a>
              </li>

          </ul>
      </div>
  </nav>




  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Add Event</h5>
            <form id="form" method="post" class="col s12">



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
    </div>
  </div>



</body>
</html>
