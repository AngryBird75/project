<!DOCTYPE html>
<?php 
$con=mysqli_connect("localhost","root","","tm");

include('newfunc.php');

if(isset($_POST['SubmiT']))
{
  $fn=$_POST['fullname'];
  $e=$_POST['email'];
  $un=$_POST['username'];
  $pw=$_POST['password'];
  $f=$_POST['fee'];
  $ed=$_POST['education'];
  $p=$_POST['phone'];
  $g=$_POST['gender'];
  $s=$_POST['Sp'];
  $query = "INSERT INTO doctor (FullName, UserName, Email, Pasword, Phone, Specialization, Education, Gender, `Doc-Fee`) 
          VALUES ('$fn','$un','$e','$pw','$p','$s','$ed','$g','$f')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor added successfully!');</script>";
      header("Location: ad.php");
  }
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1.0">
    <title>Form Valnameation in HTML | CodingNepal</title>
    <link rel="stylesheet" href="addoc.css">
    <!-- Fontawesome CDN Link For Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  </head>
  <body>
    <form action="addoc.php" method="POST">
      <h2>Add Doctor</h2>
      <div class="form-group fullname">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" placeholder="Enter Doctor Name"onkeydown="return alphaOnly(event);" required/>
      </div>
      <div class="form-group email">
        <label for="email">Email Address</label>
        <input type="text" name="email" placeholder="Enter Email address" onkeydown="return alphaOnly(event);" required/>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter UserName" onkeydown="return alphaOnly(event);" required/>
        <i name="pass-toggle-btn" class="fa-solname fa-eye"></i>
      </div>
      <div class="form-group ">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter Password" onkeydown="return alphaOnly(event);" required/>
       
      </div>
      <div class="form-group">
        <label for="password">Education</label>
        <input type="text" name="education" placeholder="Enter Education" onkeydown="return alphaOnly(event);" required/>
      
      </div>
      <div class="form-group">
        <label for="password">Phone Number</label>
        <input type="number" name="phone" placeholder="Enter Phone Number" onkeydown="return alphaOnly(event);" required/>
      
      </div>
      <div class="form-group">
        <label for="password">Doctor-Fee</label>
        <input type="number" name="fee" placeholder="Enter Doctor Fee" onkeydown="return alphaOnly(event);" required/>
   
      </div>
      <div class="form-group gender">
        <label for="gender">Gender</label>
        <select name="gender">
          <option value="" selected disabled>Select your gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <div class="form-group ">
        <span >Specialization</span>
        <select name="Sp">
            <option>Dermatology</option>
            <option>Oncologist</option>
            <option>Obstetrics and gynaecology</option>
            <option>Immunology</option>
            <option>Diagnostic Radiology</option>
            <option>Pathology</option>
            <option>Infectious disease physician</option>
            <option>Rheumatology</option>
            <option>Neurology</option>
            <option>Emergency medicine</option>
            <option>Anesthesiology</option>
            <option>Internal medicine</option>
            <option>Endocrinologist</option>
            <option>Geriatrics</option>
            <option>Medical genetics</option>
            <option>Colorectal surgery</option>
            <option>Cardiology</option>
            <option>Family medicine</option>
            <option>Gastroenterology</option>
            <option>Psychiatry</option>
            <option>General surgery</option>
            <option>Hematology</option>
            <option>Pediatrics</option>
            <option>Nephrology</option>
          </select>
          </div>
      <div class="form-group submit-btn">
        <input type="submit" name="SubmiT" value="Add Doctor">
      </div>
    </form>
    <script src="script.js"></script>
  </body>
</html>