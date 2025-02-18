<!DOCTYPE html>
<?php 
session_start();

$con=mysqli_connect("localhost","root","","tm");
include('DL.php');
$doctor = $_SESSION['UserName'];
if(isset($_GET['cancel']))
  {
    $query=mysqli_query($con,"update appointmenttb set doctorStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
    header("Location: doctor.php");
  }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
    <link rel="stylesheet" href="docstyle.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
 

    <style >
      .btn-outline-light:hover{
        color: #25bef7;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
      }
    </style>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3931af, black);
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #342ac1;
    border-color: #007bff;
}
.text-primary {
    color: #342ac1!important;
}
  </style>
 
  <div>
     <ul class="navbar-nav mr-auto">
           <li><a  class="nav-link" href="#home"></i>Home</a></li>
          <li> <a  class="nav-link" href="#list-app" ></i>Appointments</a></li>
          <li><a   class="nav-link" href="#list-pres"> Prescription List</a></li>
          <li> <a class="nav-link" href="doclog.php">Logout</a></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
         <form class="form-inline my-2 my-lg-0" method="post" action="sea.php">
      <input class="form-control mr-sm-2" name="un" type="text" placeholder="Enter Username " aria-label="Search" >
      <input type="submit" class="btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">
    </form>
  </div>
</nav>
</head>
<body>
        <!-- Navigation Bar -->
     
      

   <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        <section class="hero">
            <h3>Welcome &nbsp <?php echo $doctor ?></h3>
        </section>
     <br>
     <hr>
     <br>
    <div class="container">
        <video class="video" width="1000" height="900"  loop muted autoplay="autoplay"  >
            <source src="1ppdoc.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <br>
    <br>
    <br>
    <div class="image-text-container">
        <img src="hhd.jpng.avif" alt="Image" class="image">
        <pre style="font-size:22px; color:white;">
            <i>           " In today's fast-paces world,prioritizing your 
                         health can sometimes feel like a daunting task.
                         Our platform is designed to make accessing quality 
                         healthcare simple and convenient. With just a few 
                         clicks,you can connect with experienced doctors.
                         schedule appointment,and recieve personalized care 
                         from the comfort of your home.we believe that 
                         everyone deserves access to high-quality healthcare,
                         and we are committes to empowering you to take 
                         control of your health journey. "</i>
        </pre>
      </div>
</div>
<br>
<br>
<br>
<br>
<div  id="list-app" >
        
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Patient ID</th>
              <th scope="col">Appointment ID</th>
              <th scope="col">Username</th>
              <th scope="col">Contect</th>
              <th scope="col">Doctor ID</th>
              <th scope="col">Full Name</th>
              <th scope="col">Doctor Fees</th>
              <th scope="col">Appointment Date</th>
              <th scope="col">Appointment Time</th>
              <th scope="col">Current Status</th>
              <th scope="col">Action</th>
              <th scope="col">Prescribe</th>

            </tr>
          </thead>
          <tbody>
            <?php 
              $con=mysqli_connect("localhost","root","","tm");
              global $con;
             // $dname = $_SESSION['UserName'];
              $query = "select p_id,ID,Username,contact,d_id,FullName,docFees ,appdate,apptime,userStatus,doctorStatus from appointmenttb where FullName='$doctor' ;";
              $result = mysqli_query($con,$query);
              while ($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                <td><?php echo $row['p_id'];?></td>
                  <td><?php echo $row['ID'];?></td>
                  <td><?php echo $row['Username'];?></td>
                  <td><?php echo $row['contact'];?></td>
                  <td><?php echo $row['d_id'];?></td>
                  <td><?php echo $row['FullName'];?></td>
                  <td><?php echo $row['docFees'];?></td>
                  <td><?php echo $row['appdate'];?></td>
                  <td><?php echo $row['apptime'];?></td>
                  <td>
              <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
              {
                echo "Active";
              }
              if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
              {
                echo "Cancelled by Patient";
              }

              if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
              {
                echo "Cancelled by You";
              }
                  ?></td>

               <td>
                  <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                  { ?>

                    
                    <a href="doctor.php?ID=<?php echo $row['ID']?>&cancel=update" 
                        onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                        title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
                    <?php } else {

                          echo "Cancelled";
                          } ?>
                  
                  </td>

                  <td>

                  <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                  { ?>

                  <a href="prescrip.php?pid=<?php echo $row['p_id']?>&ID=<?php echo $row['ID']?>&FullName=<?php echo $row['FullName']?>&appdate=<?php echo $row['appdate']?>&apptime=<?php echo $row['apptime']?>"
                  tooltip-placement="top" tooltip="Remove" title="prescribe">
                  <button class="btn btn-success">Prescibe</button></a>
                  <?php } else {

                      echo "-";
                      } ?>
                  
                  </td>


                </tr></a>
              <?php } ?>
          </tbody>
        </table>

        
        <div  id="list-pres" >
        <table class="table table-hover">
                <thead>
                  <tr>
                    
                    <th scope="col">Patient ID</th>
                    
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Prescribe</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","tm");
                    global $con;

                    $query = "select p_id,Username,ID,appdate,apptime,disease,allergy,prescription from prestb where doctor='$doctor';";
                    
                    $result = mysqli_query($con,$query);
                    if(!$result){
                      echo mysqli_error($con);
                    }
                    

                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                        <td><?php echo $row['p_id'];?></td>
                        <td><?php echo $row['Username'];?></td>
                        <td><?php echo $row['ID'];?></td>
                        
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                        <td><?php echo $row['disease'];?></td>
                        <td><?php echo $row['allergy'];?></td>
                        <td><?php echo $row['prescription'];?></td>
                    
                      </tr>
                    <?php }
                    ?> 
                </tbody>
              </table>

      </div>




    
  <br>
</div>
</body>
</html>