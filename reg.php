<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Responsive Registration Form | CodingLab </title>
  <link rel="stylesheet" href="reg.css">
</head>
<body>
  <div class="container">
    <!-- Title section -->
    <a href="http://127.0.0.1:3000/project/index.html"><img src="cros.png" class="i" ></a>
    <div class="title">Registration</div>
    <div class="content">
      <!-- Registration form -->
      <form method="POST" action="DR.php" >
        <div class="user-details">
          <!-- Input for Full Name -->
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="fname" placeholder="Enter your full name" required>
          </div>
          <!-- Input for Username -->
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="Usernames" placeholder="Enter your username" required>
          </div>
          <!-- Input for Email -->
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="Emails" placeholder="Enter your email" required>
          </div>
          <!-- Input for Phone Number -->
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="PhoneNumber" placeholder="Enter your number" required>
          </div>
          <!-- Input for Password -->
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="Passwords" placeholder="Enter your password" required>
          </div>
          <!-- Input for Confirm Password -->
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password"  placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="input-box">
        <span class="details">Specialization</span>
        <select>
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
          <input type="submit" name="Sp" >
          </div>
          <div class="input-box">
            <span class="details">Education</span>
            <input type="text" name="education" placeholder="Enter your Education" required>
          </div>
        <div class="gender-details">
          <!-- Radio buttons for gender selection -->
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <!-- Label for Male -->
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <!-- Label for Female -->
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <!-- Label for Prefer not to say -->
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <!-- Submit button -->
        <div class="button">
          <input type="submit"  name="SubmiT" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>