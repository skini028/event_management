

<?php

include("initials.php");
session_start();

if(!isset($_SESSION['faculty'])){
  header('Location: main.php');
  exit();
}
$error = "";

if(isset($_POST['submit'])){
    $db;
    $event=$_POST["event"];
    $no_of_participants = mysqli_real_escape_string($db, $_POST["no_of_participants"]);
    $description = mysqli_real_escape_string($db, $_POST["description"]);
    $pso = mysqli_real_escape_string($db, $_POST["pso"]);
    $pso_desc = mysqli_real_escape_string($db, $_POST["pso_desc"]);
    $outcome = mysqli_real_escape_string($db, $_POST["outcome"]);
    $expenditure = mysqli_real_escape_string($db, $_POST["expenditure"]);
    $revenue = mysqli_real_escape_string($db, $_POST["revenue"]);
    $funding_agency = mysqli_real_escape_string($db, $_POST["funding_agency"]);
    $funds = mysqli_real_escape_string($db, $_POST["funds"]);
    $status = "complete";

    $sql = "UPDATE event set
        no_of_participants = '$no_of_participants',
        description = '$description',
        pso = '$pso',
        pso_desc = '$pso_desc',
        outcome = '$outcome',
        expenditure = '$expenditure',
        revenue = '$revenue',
        funding_agency = '$funding_agency',
        funds = '$funds',
        status = '$status'
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

<style>

:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

.btn-google {
  color: white;
  background-color: #ea4335;
}

.btn-facebook {
  color: white;
  background-color: #3b5998;
}
</style>


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
            <h5 class="card-title text-center">Complete event</h5>
            <form class="form-signin" method="POST">

                <div class="input-field col s12 mt-4">
                    <select class="form-control" name="event" required>
                    <option value="" selected disabled>Select event for completion</option>

                    <?php
                    $db;
                    $faculty = $_SESSION['faculty'];
                    $sql = "select title from event where username = '$faculty' and status = 'incomplete'";
                    $execute = mysqli_query($db, $sql);
                    while ($rows = mysqli_fetch_array($execute)) {
                        $title = $rows["title"]; ?>
                        <option value="<?php echo $title ?>"><?php echo $title ?></option>
                    <?php } ?>

                    </select>
                </div>

              <div class="input-field col s12 mt-4">
                <input class="form-control" name="no_of_participants" type="text" placeholder="Enter no. of participants" required>
              </div>

              <div class="input-field col s12 mt-4">
                <input class="form-control" name="description" type="text" placeholder="Enter description of event" required>
              </div>
            
              <div class="input-field col s12 mt-4">
                <input class="form-control" name="pso" type="text" placeholder="Enter PSO" required>
              </div>

              <div class="input-field col s12 mt-4">
                <input class="form-control" name="pso_desc" type="text" placeholder="Enter PSO description" required>
              </div>

              <div class="input-field col s12 mt-4">
                <input class="form-control" name="outcome" type="text" placeholder="Enter event outcome" required>
              </div>

              <div class="input-field col s12 mt-4">
                <input class="form-control" name="expenditure" type="text" placeholder="Enter event expenditure" required>
              </div>

              <div class="input-field col s12 mt-4">
                <input class="form-control" name="revenue" type="text" placeholder="Enter event revenue generated" required>
              </div>

              <div class="input-field col s12 mt-4">
                <input class="form-control" name="funding_agency" type="text" placeholder="Enter event funding agency" required>
              </div>

              <div class="input-field col s12 mt-4">
                <input class="form-control" name="funds" type="text" placeholder="Enter event funds recieved" required>
              </div>

            </br>

              <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="Submit" />

            </br>
            <a href="main.php"><button class="btn btn-lg btn-primary btn-block text-uppercase">Main Page</button></a>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  function button() {
    var unique = document.getElementById("unique_id");

    if (!inpObj.checkValidity()) {
      document.getElementById("submit").innerHTML = inpObj.validationMessage;
    } else {
      document.getElementById("submit").innerHTML = "Input OK";
    }
  }
  </script>

</body>
</html>
