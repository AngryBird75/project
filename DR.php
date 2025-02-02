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
    $FN =$_POST['fname'];
    $US = $_POST['Usernames'];
    $PW = $_POST['Passwords'];
    $PN = $_POST['PhoneNumber'];
    $E = $_POST['Emails'];
    $S =$_POST['Sp'];
    $ED =$_POST ['education'];
    $G =$_POST ['gender'];
   $sql = "INSERT INTO doctor (FullName, UserName, Email, Pasword, Phone, Specialization, Education, Gender) VALUES ( '$FN', '$US', '$E', '$PW', '$PN', '$S', '$ED', '$G')";
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

