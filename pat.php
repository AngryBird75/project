

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTweb</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="p.css">
</head>
<body>
    <!-- Navigation Bar -->
    <ul>
      <li><a href="http://127.0.0.1:5501/">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#news">News</a></li>
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
        <h3>Welcome<br>To patient portal.</h3>
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
        <video class="video" width="600" height="700" loop muted autoplay="autoplay" >
            <source src="DNAved.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
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
              <div class="service-title">Surgery Services</div>
              <p>Advanced surgical procedures with care and precision for your recovery.</p>
              <a href="javascript:void(0);" class="cta-button" onclick="openModal('surgeryServicesModal')">Learn More</a>
          </div>
      </div>

      <!-- Modal for Medical Consultation -->
      <div id="medicalConsultationModal" class="modal">
          <div class="modal-content">
              <span class="close" onclick="closeModal('medicalConsultationModal')">&times;</span>
              <h3>Medical Consultation Details</h3>
              <p>Our certified healthcare professionals provide virtual consultations. Whether you need advice on treatment options or a diagnosis, you can speak with an expert at your convenience.</p>
          </div>
      </div>

      <!-- Modal for Emergency Care -->
      <div id="emergencyCareModal" class="modal">
          <div class="modal-content">
              <span class="close" onclick="closeModal('emergencyCareModal')">&times;</span>
              <h3>Emergency Care Details</h3>
              <p>Our emergency care team is available around the clock for urgent medical needs. From sudden health crises to accident-related injuries, our professionals are ready to assist you at a moment's notice.</p>
          </div>
      </div>

      <!-- Modal for Health Check-ups -->
      <div id="healthCheckupModal" class="modal">
          <div class="modal-content">
              <span class="close" onclick="closeModal('healthCheckupModal')">&times;</span>
              <h3>Health Check-up Details</h3>
              <p>Regular check-ups are essential for preventing health issues. Our health check-up packages include blood tests, physical examinations, and screenings to ensure you stay on top of your health.</p>
          </div>
      </div>

      <!-- Modal for Surgery Services -->
      <div id="surgeryServicesModal" class="modal">
          <div class="modal-content">
              <span class="close" onclick="closeModal('surgeryServicesModal')">&times;</span>
              <h3>Surgery Services Details</h3>
              <p>Our surgical team offers both routine and emergency surgeries. From minor procedures to major operations, we ensure precision and care in every step of the process.</p>
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