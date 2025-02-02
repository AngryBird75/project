<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TM";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST["SubmiT"])) {
    // Collect form data
    $US = $_POST['Usernames'];
    $PW = $_POST['Passwords'];
    $PN = $_POST['PhoneNumber'];
    $E = $_POST['Emails'];
   $sql = "INSERT INTO patient ( Username, Pasword , Phone , Email) VALUES ('$US', '$PW' ,'$PN', '$E')";
   if  ( mysqli_query ($conn ,$sql) )
   {
  echo "New record created successfully";
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>

