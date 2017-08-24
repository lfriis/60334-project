<?php //displayPrescriptions.php

  //continuing previous session that was instantiated on login
  session_start();

  //checking if user has proper access level
  if (($_SESSION['user_level']) < 4) {
     echo "<p>Your session is running " . $_SESSION['user_login'] . "</p>";
  } else {
      echo "You do not have access to display prescriptions";
      exit();
  }
require_once "connection.php";

if ($conn->connect_error) die("Connection failed" . $conn->connect_error);

echo <<<_END

  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <center><img src ="../images/Logo.jpg" alt="LF Logo" style="width:220px;height:220px;"></br>
  <a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/prescriptions.html">Return</a></center>

_END;

//if button was selection on form, them this query will run and output all patients stored in database
if (isset($_POST['displayAll'])) {

    $query ="SELECT * from prescription";
    $result = $conn->query($query);

    echo "<p>All Prescriptions</p></br>";
    echo "<table>";
    while ($row = mysqli_fetch_array($result)) {
        echo "</br></br><tr><td><b>Medicine ID</b>: " . $row['med_id'] . "<tr><td><b>Medicine Name</b>: " . $row['med_name'] . "<tr><td><b>Prescription Size</b>: " . $row['pres_size'] .
             "<tr><td><b>Refill Amount</b>: " . $row['refills'] . "<tr><td><b>Date From</b>: " . $row['date_from'] . "<tr><td><b>Date To</b>: " . $row['date_to'] .
             "<tr><td><b>Prescribed By</b>: " . $row['pres_order_by'] . "</br></br>";
    }
}

$conn->close();

?>
