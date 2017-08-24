<?php //prescription.php

//using current session instantiated with login
  session_start();

//providing certain level of access depending on user_code
  if (($_SESSION['user_level']) < 3) {
     echo "<p>Your session is running " . $_SESSION['user_login'] . "</p>";
  } else {
     echo "<p>You do not have access to the prescription level</p>";
     exit();
  }

require_once "connection.php";

if ($conn->connect_error) die("Connection failed" . $conn->connect_error);

//medication information pulled from form
$med_name  =     $_POST['med_name'];
$pres_size =     $_POST['pres_size'];
$refills   =     $_POST['refills'];
$date_from =     $_POST['date_from'];
$date_to   =     $_POST['date_to'];
$pres_order_by = $_POST['pres_order_by'];

//query to insert all form elements into database
$query =("INSERT INTO prescription (med_id, med_name, pres_size, refills, date_from, date_to, pres_order_by)
         VALUES (NULL, '$med_name', '$pres_size', '$refills', '$date_from', '$date_to', '$pres_order_by')");
$result = $conn->query($query);

echo <<<_END

<style>
    p , a {
      font-size:18px;
      font-family: "Verdana", Geneva, sans-serif;
      text-align: center;
    }
</style>

  <center><img src ="../images/Logo.jpg" alt="LF Logo" style="width:220px;height:220px;"></br>
  <a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/prescriptions.html">Return</a></center>

_END;

//if query executes, this will display the contents inserted
if ($result) {
    echo "<p>Prescription was entered into system" . "</br>Medicine Name: "  . $med_name
                                                . "</br>Prescription Size: " . $pres_size
                                                . "</br>Refills: "           . $refills
                                                . "</br>Date From: "         . $date_from
                                                . "</br>Date To: "           . $date_to
                                                . "</br>Prescribed by: "     . $pres_order_by . "</p>";
} else {
    echo "<p>Prescription insert error, please try again</p>";
}

//closing connection
$conn->close();
?>
