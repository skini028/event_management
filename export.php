<?php
session_start();
include_once 'initials.php';
if(!isset($_SESSION['admin'])){
  header('Location: adminlogin.php');
  exit();
}

$entries = array();
$line = "Title,Department,Level,Type of event,Date from,Date to,Type of Participant,Resource Person Name,Resource Person Designation,Resource Person Org,No. Of Participant,Area of expertise,Description,Outcome,Expenditure,Revenue,Funding Agency,Funds,Status,Association,Rank,Achievement Student/Staff,Achievement Dept.,Achievement College,PSO1 No.,PSO1 Desc.,PSO2 No.,PSO2 Desc.,PSO3 No.,PSO3 Des.,PSO4 No.,PSO4 Desc.,PSO5 No.,PSO5 Desc.";
array_push($entries, $line);

$db;
$sql = "select * from event where status = 'complete';";
//$sql = "select * from event;";
$result = mysqli_query($db, $sql);
if ($result) {
    while($rows = mysqli_fetch_assoc($result)) {
        $line = $rows["title"].",";
        $line .= $rows["title"] .",";
        $line .= $rows["department"].",";
        $line .= $rows["level"].",";
        $line .= $rows["type_of_event"].",";
        $line .= $rows["date_from"].",";
        $line .= $rows["date_to"].",";
        $line .= $rows["type_of_participant"].",";
        $line .= $rows["resource_person_name"].",";
        $line .= $rows["resource_person_desg"].",";
        $line .= $rows["resource_person_org"].",";
        $line .= $rows["no_of_participants"].",";
        $line .= $rows["area_of_expertise"].",";
        $line .= $rows["description"].",";
        $line .= $rows["outcome"].",";
        $line .= $rows["expenditure"].",";
        $line .= $rows["revenue"].",";
        $line .= $rows["expenditure"].",";
        $line .= $rows["funding_agency"].",";
        $line .= $rows["funds"].",";
        $line .= $rows["association"].",";
        $line .= $rows["rank"].",";
        $line .= $rows["ach_student_staff"].",";
        $line .= $rows["ach_dept"].",";
        $line .= $rows["ach_college"].",";
        $line .= $rows["pso1"].",";
        $line .= $rows["pso_desc1"].",";
        $line .= $rows["pso2"].",";
        $line .= $rows["pso_desc2"].",";
        $line .= $rows["pso3"].",";
        $line .= $rows["pso_desc3"].",";
        $line .= $rows["pso4"].",";
        $line .= $rows["pso_desc4"].",";
        $line .= $rows["pso5"].",";
        $line .= $rows["pso_desc5"];
        array_push($entries, $line);
    } 
}

//$file = fopen("EventReport.csv","w");
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="EventReport.csv;"');

$file = fopen('php://output', 'w');

foreach ($entries as $line) {
  fputcsv($file, explode(',',$line));
}

?> 
