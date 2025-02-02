<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //var_dump($_POST);  

    $username = $_POST['UserName'];
    $password = $_POST['PassWord'];

    // Prepare and execute the query to get the password from the database
    $stmt = $conn->prepare("SELECT Pasword FROM patient WHERE Username = ?");
  $stmt->bind_param("s", $username);
    $stmt->execute();
   $stmt->store_result();

    // Check if email exists in the database
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_password);
        $stmt->fetch();

        
        if ($password === $db_password) {
            session_start();
            $_SESSION['Username'] = $username;
            $_SESSION['Pasword'] = true;

            echo "Login successful!<br>";
            header("Location: pat.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password')</script>";  

         } 
        }
         else {
        echo "<script>alert('UserName not found')</script>";

    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
