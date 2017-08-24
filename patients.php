<?php

//using current session instantiated with login
  session_start();

//providing certain level of access depending on user_code
if (($_SESSION['user_level']) <= 4) {
   echo "<p>Your session is running " . $_SESSION['user_login'] . "</p>";
} else {
   echo "You do not have access to the patient level";
   exit();
}

require_once "connection.php";

if ($conn->connect_error) die("Connection failed" . $conn->connect_error);

//Demographic information pulled from form
$patient_name  = $_POST['patient_name'];
$dob           = $_POST['dob'];
$address       = $_POST['address'];
$postal_code   = $_POST['postal_code'];
$phone         = $_POST['phone'];
$sex           = $_POST['sex'];
$email         = $_POST['email'];

//Patient Information pulled from form
$room          = $_POST['room'];
$assign_doctor = $_POST['assign_doctor'];
$assign_nurse  = $_POST['assign_nurse'];

//query to insert form data into database
$query =("INSERT INTO patient (patient_id, patient_name, dob, address, postal_code, phone, sex, room, assign_doctor, assign_nurse)
         VALUES (NULL, '$patient_name', '$dob', '$address', '$postal_code', '$phone', '$sex', '$room', '$assign_doctor', '$assign_nurse')");
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
  <a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/patients.html">Return</a></center>

_END;

//if insert statement completes, outputs the values inputted for user satisfaction of submission
if ($result) {
    echo "</br><p><b>Patient was entered into system</b>" . "</br>Patient Name: "    . $patient_name
                                                  . "</br>Date of Birth: "   . $dob
                                                  . "</br>Address: "         . $address
                                                  . "</br>Postal Code: "     . $postal_code
                                                  . "</br>Phone: "           . $phone
                                                  . "</br>Room: "            . $room
                                                  . "</br>Assigned Doctor: " . $assign_doctor
                                                  . "</br>Assigned Nurse: "  . $assign_nurse . "</p>";
} else {
    echo "Patient insert error, please try again";
}

$conn->close();

?>
