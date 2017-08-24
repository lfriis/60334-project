<?php //register.php

//connecting to database
require_once "connection.php";

if ($conn->connect_error) die("Connection failed" . $conn->connect_error);

//pulling inputs from form
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$usercode = $_POST['user_code'];
$email = $_POST['email'];
$password = $_POST['password'];

//salts to encrypt sensitive information
$salt1 = "qm&h*";
$salt2 = "pg!@";

//using the ripemd128 hash function to encrypt name, email, and passwords with specified salts
$hashfullname = hash('ripemd128', "$salt1$fullname$salt2");
$hashemail = hash('ripemd128', "$salt1$email$salt2");
$hashpass = hash('ripemd128', "$salt1$password$salt2");

//query to insert hashed information along with form information
//using prepare statement to optimize performance and prevent sql injection
$regQuery = $conn->prepare("INSERT INTO user_codes (fullname, username, user_code, email, password)
                            VALUES (?, ?, ?, ?, ?)");
$regQuery->bind_param ("ssiss", $hashfullname, $username, $usercode, $hashemail, $hashpass);

echo <<<_END

<center><img src ="../images/Logo.jpg" alt="LF Logo" style="width:220px;height:220px;"></center>
<style>

p {
  font-size:18px;
  font-family: "Verdana", Geneva, sans-serif;
  text-align:center;
}
</style>

_END;

//if executing the prepare statement fails, output error message along with user options
if (!$regQuery->execute()) {
    echo "<p></br>Username already active, please <a href='http://friis.myweb.cs.uwindsor.ca/60334/project/html/register.html'>try again</a> or
    <a href='http://friis.myweb.cs.uwindsor.ca/60334/project/html/login.html'>log in</a></p>";

//output if the user registration is complete
//will email all account information to email specified in login
} else {
      echo "<p>Registration Successful, proceed to <a href='http://friis.myweb.cs.uwindsor.ca/60334/project/html/login.html'>log in</a>!</p>";
      $subject = "LF Hospital Registration";
      $header = "Account information: ";
      $account = "Full Name: "     . $fullname. "</br>".
                 "Username: " . $username. "</br>".
                 "Usercode: " . $usercode. "</br>".
                 "Email: "    . $email. "</br>".
                 "Encrypted Password: " . $hashpassword;

      mail($email, $subject, $account, $header);
}

//closing prepare query and connection 
$regQuery->close();
$conn->close();

?>
