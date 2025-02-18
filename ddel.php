<!DOCTYPE html>
<?php
if(isset($_POST['SubmiT']))
{
  $con=mysqli_connect("localhost","root","","tm");
  $id=$_POST['id'];
  $query="DELETE FROM doctor WHERE UserName= '$id';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor removed successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="ddel.css">
</head>
<body>
  <div class="login-box">
    <h2>DELETE DOCTOR</h2>
    <form method="POST" action="ddel.php ">
      <div class="user-box">
        <input type="text" name="id" required/>
        <label>User Name</label>
        <button type="submit" name ="SubmiT">DELETE</button>
      </div>
      </div>
    </form>
  </div>
</body>
</html>