
<?php 
include('p.php');
session_start();
$con=mysqli_connect("localhost","root","","tm");
//  $pid = $_SESSION['p_id'];
//   $username = $_SESSION['Username'];
//   $email = $_SESSION['Email'];
//   $gender = $_SESSION['gender'];
//   $contact = $_SESSION['Phone'];
  
if(isset($_POST['app-submit']))
{
  $pid = $_SESSION['p_id'];
  $username = $_SESSION['Username'];
  $gender = $_SESSION['gender'];
  $contact = $_SESSION['contact'];
  $doctor=$_POST['doctor'];
  $appdate=$_POST['appdate'];
  $apptime=$_POST['apptime'];
  $cur_date = date("Y-m-d");
  date_default_timezone_set('Asia/Kolkata');
  $cur_time = date("H:i:s");
  $apptime1 = strtotime($apptime);
  $appdate1 = strtotime($appdate);
  $d_id = "SELECT d_id FROM doctor WHERE doctor.Username='$doctor'";
    $docFees= "SELECT Doc-Fee FROM doctor WHERE doctor.Username='$doctor'";
  if(date("Y-m-d",$appdate1)>=$cur_date){
    if((date("Y-m-d",$appdate1)==$cur_date and date("H:i:s",$apptime1)>$cur_time) or date("Y-m-d",$appdate1)>$cur_date) {
      $check_query = mysqli_query($con,"select apptime from appointmenttb where FullName='$doctor' and appdate='$appdate' and apptime='$apptime'");
        if(mysqli_num_rows($check_query)==0){
          
          $sql = "INSERT INTO appointmenttb (p_id, Username, contact, d_id, FullName, docFees, appdate, apptime, userStatus, doctorStatus)
                            VALUES ('$pid', '$username', '$contact', '3', '$doctor', '500', '$appdate', '$apptime', '1', '1')";
          $query=mysqli_query($con,$sql);

          if($query)
          {
            echo "<script>alert('Your appointment successfully booked');</script>";
          }
          else{
            echo "<script>alert('Unable to process your request. Please try again!');</script>";
          }
      }
      else{
        echo "<script>alert('We are sorry to inform that the doctor is not available in this time or date. Please choose different time or date!');</script>";
      }
    }
    else{
      echo "<script>alert('Select a time or date in the future!');</script>";
    }
  }    
  else{
      echo "<script>alert('Select a time or date in the future!');</script>";
  }
  
}

if(isset($_GET['cancel']))
  {
    $query=mysqli_query($con,"update appointmenttb set userStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  }



function get_specs(){
  $con=mysqli_connect("localhost","root","","tm");
  $query=mysqli_query($con,"select UserName,Specialization from doctor");
  $docarray = array();
    while($row =mysqli_fetch_assoc($query))
    {
        $docarray[] = $row;
    }
    return json_encode($docarray);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTweb</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="styling.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    <!-- Navigation Bar -->
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#services">Services</a></li>
      
      <li><a href="#list-home">Book Appointment</a></li>
      <li> <a  href="#app-hist" >Appointment History</a></li>
      <li> <a  href="sign.php" >Logout</a></li>
      <div class="nav-links">
        <li><a href="#contact" class="contact-btn" onclick="toggleContactForm()">Contact Us</a></li>
      </div>
    </ul>

    <!-- Contact Form (hidden initially) -->
    <div id="contact-form">
      <h2>Contact Us</h2>
      <form id="contactForm" onsubmit="submitForm(event)">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit">Submit</button>
      </form>
    </div>

    <!-- JavaScript to toggle the contact form and display success message -->
    <script>
      // Function to toggle the visibility of the contact form
      function toggleContactForm() {
        var form = document.getElementById('contact-form');
        form.style.display = form.style.display === 'none' || form.style.display === '' ? 'block' : 'none';
      }

      // Function to handle form submission
      function submitForm(event) {
        event.preventDefault(); // Prevent the default form submission behavior

       // Show an alert for success
       alert('Your request has been sent!');
      
        // Optionally, hide the form after submission
        document.getElementById('contact-form').style.display = 'none';

        // Reset the form fields (optional)
        document.getElementById('contactForm').reset();

        // Hide the success message after 3 seconds
        setTimeout(function() {
          successMessage.style.display = 'none';
        }, 3000);
      }
    </script>      

    <section class="hero">
        <h3>Welcome &nbsp<?php echo $username ?></h3>
    </section>
    <br>
    <br>
    <br>
    <section class="super">
      <br>
        <pre style="font-size:25px; color:#ffffe6;">
            <i>       "  Experience the future of healthcare.
                      Our telemedicine platform offers convenient,
                      affordabel and high-quality medical
                      consultation from the comfort of your
                      home.With our experienced doctors and 
                      advanced technology, you can access  
                      experts care whenever and where ever
                      you want. "
            </i>
        </pre>
        
    </section>
     <br>
     <br>
     <hr>
     <br>
    <div class="container">
        <video class="video"  loop muted autoplay="autoplay"  width="600" height="700" >
            <source src="DNAved.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
<!-- s -->
<div id="list-home" >
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Create an appointment</h4></center><br>
              <form class="form-group" method="post" action="pat.php">
                <div class="row">
                  
                  <!-- <?php

                        $con=mysqli_connect("localhost","root","","tm");
                        $query=mysqli_query($con,"select  Username from doctor");
                        $docarray = array();
                          while($row =mysqli_fetch_assoc($query))
                          {
                              $docarray[] = $row;
                          }
                          echo json_encode($docarray);

                  ?> -->
        

                    <div class="col-md-4">
                          <label for="spec">Specialization:</label>
                        </div>
                        <div class="col-md-8">
                          <select name="spec" class="form-control" id="spec">
                              <option value="" disabled selected>Select Specialization</option>
                              <?php 
                              display_specs();
                              ?>
                          </select>
                        </div>

                        <br><br>

                        <script>
                      document.getElementById('spec').onchange = function foo() {
                        let spec = this.value;   
                        console.log(spec)
                        let docs = [...document.getElementById('doctor').options];
                        
                        docs.forEach((el, ind, arr)=>{
                          arr[ind].setAttribute("style","");
                          if (el.getAttribute("data-spec") != spec ) {
                            arr[ind].setAttribute("style","display: none");
                          }
                        });
                      };

                  </script>

              <div class="col-md-4"><label for="doctor">Doctors:</label></div>
                <div class="col-md-8">
                    <select name="doctor" class="form-control" id="doctor" required="required">
                      <option value="" disabled selected>Select Doctor</option>
                
                      <?php display_docs(); ?>
                    </select>
                  </div><br/><br/> 


                        <script>
              document.getElementById('doctor').onchange = function updateFees(e) {
                var selection = document.querySelector(`[value=${this.value}]`).getAttribute('data-value');
                document.getElementById('docFees').value = selection;
              };
            </script>
        
                  <div class="col-md-4"><label for="consultancyfees">
                                Consultancy Fees
                              </label></div>
                              <div class="col-md-8">
                              <!-- <div id="docFees">Select a doctor</div> -->
                              <input class="form-control" type="text" name="docFees" id="docFees" readonly="readonly"/>
                  </div><br><br>

                  <div class="col-md-4"><label>Appointment Date</label></div>
                  <div class="col-md-8"><input type="date" class="form-control datepicker" name="appdate"></div><br><br>

                  <div class="col-md-4"><label>Appointment Time</label></div>
                  <div class="col-md-8">
                    <!-- <input type="time" class="form-control" name="apptime"> -->
                    <select name="apptime" class="form-control" id="apptime" required="required">
                      <option value="" disabled selected>Select Time</option>
                      <option value="08:00:00">8:00 AM</option>
                      <option value="10:00:00">10:00 AM</option>
                      <option value="12:00:00">12:00 PM</option>
                      <option value="14:00:00">2:00 PM</option>
                      <option value="16:00:00">4:00 PM</option>
                    </select>

                  </div><br><br>

                  <div class="col-md-4">
                    <input type="submit" name="app-submit" value="Create new entry" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>

                  
      <div id="app-hist">
      <center><h4>Appointment history</h4></center><br>
        
        <table class="table table-hover">
          <thead>
            <tr>
              
              <th scope="col">Doctor Name</th>
              <th scope="col">Consultancy Fees</th>
              <th scope="col">Appointment Date</th>
              <th scope="col">Appointment Time</th>
              <th scope="col">Current Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 

              $con=mysqli_connect("localhost","root","","tm");
              global $con;
              $query = "  SELECT ID, FullName ,docFees,appdate,apptime,userStatus,doctorStatus  FROM appointmenttb WHERE Username ='$username' ";
              $result = mysqli_query($con,$query);
              while ($row = mysqli_fetch_array($result)){
        
                #$username = $row['username'];
                #$email = $row['email'];
                #$contact = $row['contact'];
            ?>
                <tr>
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
                echo "Cancelled by You";
              }

              if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
              {
                echo "Cancelled by Doctor";
              }
                  ?></td>

                  <td>
                  <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                  { ?>

                    
                    <a href="pat.php?ID=<?php echo $row['ID']?>&cancel=update" 
                        onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                        title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
                    <?php } else {

                          echo "Cancelled";
                          } ?>
                  
                  </td>
                </tr>
              <?php } ?>
          </tbody>
        </table>
  <br>
</div>


    <br>
     <br>
     <br>
    <br>
    <section id="services">
      <div class="section-title">
          <h2>Our Healthcare Services</h2>
          <p>Providing top-notch healthcare solutions to improve your well-being.</p>
      </div>

      <div class="services-container">
          <div class="service-card">
              <div class="service-title">Medical Consultation</div>
              <p>Get expert medical advice and diagnosis from certified healthcare professionals.</p>
              <a href="javascript:void(0);" class="cta-button" onclick="openModal('medicalConsultationModal')">Learn More</a>
          </div>

          <div class="service-card">
              <div class="service-title">Emergency Care</div>
              <p>Immediate medical attention for urgent health issues and emergencies.</p>
              <a href="javascript:void(0);" class="cta-button" onclick="openModal('emergencyCareModal')">Learn More</a>
          </div>

          <div class="service-card">
              <div class="service-title">Health Check-ups</div>
              <p>Routine check-ups to monitor and maintain your health for a better future.</p>
              <a href="javascript:void(0);" class="cta-button" onclick="openModal('healthCheckupModal')">Learn More</a>
          </div>

          <div class="service-card">
              <div class="service-title">Doctors</div>
              <p>Highly Educated and Trustworthy doctors are connected with this plateform.</p>
              <a href="javascript:void(0);" class="cta-button" onclick="openModal('surgeryServicesModal')">Learn More</a>
          </div>
      </div>

      <!-- Modal for Medical Consultation -->
      <div id="medicalConsultationModal" class="modal">
          <div class="modal-content">
              <span class="close" onclick="closeModal('medicalConsultationModal')">&times;</span>
              <h3>Medical Consultation Details</h3>
              <p>Our certified healthcare professionals provide virtual consultations. Whether you need advice on treatment options or a diagnosis, you can speak with an expert at your convenience.</p>
              <h4>Doctors Available:</h4>
        <div>
            <p><strong>Dr. Muneeb</strong> - Cardiologist</p>
            <p><strong>Dr. Sarah </strong> - Neurologist</p>
            <p><strong>Dr. Mohsin</strong> - Dermotologist</p>
            <p><strong>Dr. Aisha</strong> - Nephrologists</p>
            <p><strong>Dr. Aijaz </strong> - Oncologists</p>
            <p><strong>Dr. saima</strong> - Gastroenterology</p>
        </div>
        
        <h4>Specialties/Departments:</h4>
        <div>
            <p><strong>Cardiology</strong></p>
            <p><strong>Neurology</strong></p>
            <p><strong>Pediatrics</strong></p>
            <p><strong>Nephrologists</strong></p>
            <p><strong>Gastroenterology</strong></p>
            </div>
          </div>
      </div>

      <!-- Modal for Emergency Care -->
      <div id="emergencyCareModal" class="modal">
          <div class="modal-content">
              <span class="close" onclick="closeModal('emergencyCareModal')">&times;</span>
              <h3>Emergency Care Details</h3>
              <p>Our emergency care team is available around the clock for urgent medical needs. From sudden health crises to accident-related injuries, our professionals are ready to assist you at a moment's notice.</p>
              <h4>Facilities Available:</h4>
              <div>
                  <p><strong>24/7 Emergency Consultation</strong></p>
                  <p><strong>Trauma Care</strong></p>
                  <p><strong>Emergency Medication Consulation</strong></p>
              </div>
              
              <h4>Doctors Available:</h4>
              <div>
                <p><strong>Dr. Muneeb</strong> - Cardiologist</p>
                <p><strong>Dr. Sarah </strong> - Neurologist</p>
                <p><strong>Dr. Mohsin</strong> - Dermotologist</p>
        </div>
        
        <h4>Specialized Departments:</h4>
        <div>
            <p><strong>Cardiologist</strong></p>
            <p><strong>Neurologist</strong></p>
            <p><strong>Dermotologist</strong></p>
        </div>
            </div>
      </div>

      <!-- Modal for Health Check-ups -->
      <div id="healthCheckupModal" class="modal">
          <div class="modal-content">
              <span class="close" onclick="closeModal('healthCheckupModal')">&times;</span>
              <h3>Health Check-up Details</h3>
              <p>Regular check-ups are essential for preventing health issues. Our health check-up packages include blood tests, physical examinations, and screenings to ensure you stay on top of your health.</p>
              <h4>Facilities Available:</h4>
              <div>
                  <p><strong>ECG and Stress Tests</strong></p>
                  <p><strong>24/7 Emergency Consultation</strong></p>
                  <p><strong>Trauma Care</strong></p>
                  <p><strong>Emergency Medication Consulation</strong></p>
              </div>
              
              <h4>Doctors Available:</h4>
              <div>
                <p><strong>Dr. Aisha</strong> - Nephrologists</p>
                <p><strong>Dr. Aijaz </strong> - Oncologists</p>
                <p><strong>Dr. saima</strong> - Gastroenterology</p>
              </div>
            </div>
      </div>

      <!-- Modal for Surgery Services -->
      <div id="surgeryServicesModal" class="modal">
          <div class="modal-content">
              <span class="close" onclick="closeModal('surgeryServicesModal')">&times;</span>
              <h3>Doctors Details</h3>
              <p>Highly Educated and Trustworthy doctors are connected with this plateform. we ensure precision and care in every step of the process.</p>
              <h4>Doctors Available:</h4>
              <div>
                  <p><strong>Dr. Muneeb</strong> - Cardiologist</p>
                  <p><strong>Dr. Sarah </strong> - Neurologist</p>
                  <p><strong>Dr. Mohsin</strong> - Dermotologist</p>
                  <p><strong>Dr. Aisha</strong> - Nephrologists</p>
                  <p><strong>Dr. Aijaz </strong> - Oncologists</p>
                  <p><strong>Dr. saima</strong> - Gastroenterology</p>
              </div>
              
              <h4>Specialties/Departments:</h4>
              <div>
                  <p><strong>Cardiology</strong></p>
                  <p><strong>Neurology</strong></p>
                  <p><strong>Pediatrics</strong></p>
                  <p><strong>Nephrologists</strong></p>
                  <p><strong>Gastroenterology</strong></p>
                  </div>
            </div>
      </div>
  </section>
  <script>
      // Function to open the modal
      function openModal(modalId) {
          document.getElementById(modalId).style.display = "block";
      }

      // Function to close the modal
      function closeModal(modalId) {
          document.getElementById(modalId).style.display = "none";
      }

      // Close the modal if the user clicks anywhere outside of it
      window.onclick = function(event) {
          var modals = document.getElementsByClassName('modal');
          for (var i = 0; i < modals.length; i++) {
              if (event.target == modals[i]) {
                  modals[i].style.display = "none";
              }
          }
      }
  </script>
</body>
</html>
