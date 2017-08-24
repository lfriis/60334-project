<?php //logout.php

//using current session
session_start();

echo $_SESSION['user_login'] . " has been logged out!";

//when button is selected on menu, the session will be destroyed and the user logged out
session_destroy(); //destroy the session

//redirect the user to the login page after logout has completed
header("location: http://friis.myweb.cs.uwindsor.ca/60334/project/html/login.html");

exit();

?>
