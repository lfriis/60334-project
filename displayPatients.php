<?php //displayPatients.php

//continuing previous session that was instantiated on login
  session_start();

//checking if user has proper access level
  if (($_SESSION['user_level']) <= 4) {
     echo "<p>Your session is running " . $_SESSION['user_login'] . "</p>";
  } else {
      echo "You do not have access to display the patients";
      exit();
  }

require_once "connection.php";

if ($conn->connect_error) die("Connection failed" . $conn->connect_error);

echo <<<_END

  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <center><img src ="../images/Logo.jpg" alt="LF Logo" style="width:220px;height:220px;"></br>
  <a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/patients.html">Return</a></center>

_END;

//if button was selection on form, them this query will run and output all patients stored in database
if (isset($_POST['displayAll'])) {

    $query ="SELECT * from patient";
    $result = $conn->query($query);

    echo "<p>All Patients</p></br>";
    echo "<table>";
    while ($row = mysqli_fetch_array($result)) {
        echo "</br></br><tr><td><b>Patient ID</b>: " . $row['patient_id'] . "<tr><td><b>Patient Name</b>: " . $row['patient_name'] . "<tr><td><b>Date of Birth</b>: " . $row['dob'] .
             "<tr><td><b>Address</b>: "    . $row['address']    . "<tr><td><b>Postal Code</b>: "  . $row['postal_code']  . "<tr><td><b>Phone Number</b>: "  . $row['phone'] .
             "<tr><td><b>Sex</b>: "        . $row['sex'] . "</br></br>" . "<tr><td><b>Room</b>: " . $row['room'] . "</br></br>" .
             "<tr><td><b>Assigned Doctor</b>: " . $row['assign_doctor'] . "</br></br>" . "<tr><td><b>Assigned Nurse</b>: " . $row['assign_nurse'] . "</br></br>";
    }
}

$conn->close();

?>
