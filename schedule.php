<?php //schedule.php

//using current session instantiated with login
  session_start();

//providing certain level of access depending on user_code
  if (($_SESSION['user_level']) <= 4) {
     echo "<p>Your session is running " . $_SESSION['user_login'] . "</p>";
  }

//unfortunately I did not have time to implement a fully functional dynamic schedule that interacts
//with patients, doctors, and precription meds. This is mainly for a presentation aspect
?>

<!DOCTYPE html>
<html>
<head>
  <title>Schedule</title>

  <link rel="stylesheet" type="text/css" href="../css/schedule.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <center><img src ="../images/Logo.jpg" alt="LF Logo" style="width:220px;height:220px;"></center>

  <body>
  <ul>
    <li><a class="active" href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/schedule.php">Schedule</a></li>
    <li><a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/patients.html">Patients</a></li>
    <li><a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/prescriptions.html">Prescriptions</a></li>
    <li><a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/contact.html">Contact Admin</a></li>
    <li><a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/logout.php">Logout</a></li>
  </ul>

</br></br>

    <table width="100%" align="center" >
    <div>
    <tr>
        <th>Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thrusday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
    </tr>
</div>
    <tr>
        <th>10:00 - 11:00</th>
            <td>Appointment - Patient 12 - Dr. John Doe - Room 14</td>
            <td></td>
            <td></td>
            <td>Appointment - Patient 13 - Dr. Rick Smith</td>
            <td></td>
            <td>Surgery - Patient 14</td>
            <td>Surgery Follow Up - Patient 14 - Dr. Rick Smith</td>
        </div>
    </tr>
    <tr>
        <th>11:00 - 12:00</td>
            <td>Surgery - Patient 12</td>
            <td></td>
            <td></td>
            <td>Appointment - Patient 13 - Dr. Rick Smith</td>
            <td>Appointment - Patient 14 - Dr. Rick Smith</td>
            <td></td>
            <td></td>
        </div>
    </tr>
    <tr>
        <th>12:00 - 01:00</td>
            <td></td>
            <td>Appointment - Patient 13 - Dr. Rick Smith</td>
            <td></td>
            <td></td>
            <td></td>
            <td>Surgery - Patient 12</td>
            <td>Surgery Follow Up - Patient 12 - Dr. Rick Smith</td>
        </div>
    </tr>
    <tr>
        <th>01:00 - 02:00</td>
            <td></td>
            <td>Appointment - Patient 13 - Dr. Rick Smith</td>
            <td>Surgery - Patient 12</td>
            <td>Surgery Follow Up - Patient 12 - Dr. Rick Smith</td>
            <td></td>
            <td></td>
           <td></td>
        </div>
    </tr>
    <tr>
        <th>02:00 - 03:00</td>
            <td>Appointment - Patient 13 - Dr. Rick Smith</td>
            <td></td>
            <td>Surgery - Patient 14</td>
            <td>Surgery Follow Up - Patient 14 - Dr. Rick Smith</td>
            <td></td>
            <td></td>
            <td></td>
        </div>
    </tr>
</table>

<footer>
    Copyright &copy; LF HOSPITAL 2017 ALL RIGHTS RESERVED
</footer>
</body>
</html>
