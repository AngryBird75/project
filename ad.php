<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>ADMIN PANEL</title>
      <link rel="stylesheet" href="style.css">
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="add.css"/>

   </head>
   <body>
      <div class="btn">
         <span class="fas fa-bars"></span>
      </div>
      <nav class="sidebar">
         <div class="text">
            Side Menu
         </div>
         <ul>
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="#"  class="feat-btn">Doctor Details
               <span  class="fas fa-caret-down first"></span></a>
            <ul class="feat-show">
            <li><a href="http://localhost/project/dlist.php">List of Doctors</a></li>
                   <li><a href="http://localhost/project/mdoc.php">Male Doctors</a></li>
                   <li><a href="http://localhost/project/fdoc.php">Female Doctors</a></li>
                   <li><a href="http://localhost/project/addoc.php">Add Doctor</a></li>
                   <li><a href="http://localhost/project/ddel.php">Delete Doctor</a></li>
                </ul>
         </li>
            <li><a href="http://localhost/project/plist.php">Patient List</a></li>
            <li><a href="#"  class="serv-btn">Appointment Details <span class="fas fa-caret-down second"></span></a>
            <ul class="serv-show">
            <li><a href="http://localhost/project/ap.php">List of Appointment</a></li>
                   <li><a href="http://localhost/project/pap.php">Prescrition Appointment</a></li>
                   <li><a href="http://localhost/project/cap.php">Cancel Appointment</a></li>
                </ul>
         </li>
            <li><a href="http://localhost/project/s.php">Today Appointment</a></li>
      
             <li><a href="admin.php">logout</a></li>
         </ul>
      </nav>
      <!-- <img class="logo" src="logodone.jpeg"> -->
      <div class="content">
         <div class="header">
          <h1> WELLCOME ADMIN </h1>
         </div>
          <p>
             LET MANAGE THE WEBSITE 
            </p>
      </div>

      <script>
         $('.btn').click(function(){
           $(this).toggleClass("click");
           $('.sidebar').toggleClass("show");
         });
           $('.feat-btn').click(function(){
             $('nav ul .feat-show').toggleClass("show");
             $('nav ul .first').toggleClass("rotate");
           });
           $('.serv-btn').click(function(){
             $('nav ul .serv-show').toggleClass("show1");
             $('nav ul .second').toggleClass("rotate");
           });
           $('nav ul li').click(function(){
             $(this).addClass("active").siblings().removeClass("active");
           });
      </script>
   </body>
</html>