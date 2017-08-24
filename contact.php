<?php //contact.php

//retrieving values that were inputted from form
$name = $_POST['name'];
$email_from = $_POST['email'];
$phone = $_POST['phone'];
$sent_message = $name . "has these concerns about LF Hospital Management System: " . $_POST['message'];

if(isset($_POST['email'])) {

    $email_to = "larsenfriis@icloud.com";
    $subject = "LF Hospital Admin Issues";

    $header_from = "From: ". $email_from;
    $header_to = "From: " . $email_to;

//using mail function to mail senders message and information
    mail($email_from, $subject, $sent_message, $header_from);
    mail($email_to, $subject, $sent_message, $headers_to);

//keeping site look similar while displaying success notification
echo <<<_END

<link rel="stylesheet" type="text/css" href="../css/index.css">
<center><img src ="../images/Logo.jpg" alt="LF Logo" style="width:220px;height:220px;"></center>

<body>
<ul id="navlist">
  <li><a class="active" href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/index.html">Home</a></li>
  <li><a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/schedule.html">Schedule</a></li>
  <li><a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/patients.html">Patients</a></li>
  <li><a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/prescriptions.html">Prescriptions</a></li>
  <li><a href="http://friis.myweb.cs.uwindsor.ca/60334/project/html/contact.html">Contact Admin</a></li>
</ul>

<footer>
  Copyright &copy; LF HOSPITAL 2017 ALL RIGHTS RESERVED
</footer>

<style>

p {
  font-size:18px;
  font-family: "Verdana", Geneva, sans-serif;
  text-align:center;
}
</style>

_END;

    echo "<p>Your message has been sent, thank you <b>" . $name . "</b>. I will contact you soon. Have a good day!</p>";
}

?>
