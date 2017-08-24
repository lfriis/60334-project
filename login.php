<?php //login.php

require_once 'connection.php';

if ($conn->connect_error) die("Connection Failed: " . $conn->connect_error);

//storing users input from login form
      $username = $_POST['username'];
      $password = $_POST['password'];

//striping slashes and using real_escape_string functions to prevent sql injection
      $username = stripcslashes($username);
      $password = stripcslashes($password);

      $username = $conn->real_escape_string($username);
      $password = $conn->real_escape_string($password);

//query used to extract user level from sql database
      $levelQuery = "SELECT user_code FROM user_codes WHERE username = '$username'";
      $levelResult = mysqli_query($conn, $levelQuery);
      $levelResult = $conn->query($levelQuery);
      $level = mysqli_fetch_array($levelResult);

//query used to extract username and password that were inputted in form and test with values stored in sql database
      $checkQuery = "SELECT * FROM user_codes WHERE username = '$username' AND password = '$password'";
      $checkResult = mysqli_query($conn, $checkQuery);
      $checkResult = $conn->query($checkQuery);
      $rows = mysqli_fetch_array($checkResult);

//if those queries values were equal to their data stores, then complete login process
      if ($rows['username'] == $username && $rows['password'] == $password) {
        echo "</br><p>Login Successful!</br> Welcome <b>" . $rows['username'] . "</b></p>";

//create a session to user over all pages to determine user access 
        session_start();
        $_SESSION['user_login'] = $username;
        $_SESSION['user_level'] = $level['user_code'];
        header("Location: http://friis.myweb.cs.uwindsor.ca/60334/project/html/schedule.php");

      } else {
          echo "<p>Username or password invalid, please <a href='http://friis.myweb.cs.uwindsor.ca/60334/project/html/login.html'>try again</a> or
          <a href='http://friis.myweb.cs.uwindsor.ca/60334/project/html/register.html'>register</a> an account!</p>";
      }
?>
