<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Glassmorphism Login Form | CodingNepal</title>
  <link rel="stylesheet" href="doc.css">
</head>
<body>
  <div class="wrapper">
    <form action="DL.php" method="POST" >
    <a href="http://127.0.0.1:3000/index.html"><img src="cros.png" class="i" ></a>
      <h2>Login</h2>
        <div class="input-field">
        <input type="text" name="UserName" required>
        <label>Enter your Username</label>
      </div>
      <div class="input-field">
        <input type="password" name="PassWord" required>
        <label>Enter your password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <button onclick="myFunction()">Forgot password?</button>

<script>
function myFunction() {
  alert(" Contect to admin !");
}
</script>
      </div>
      <button type="submit" name="SubmiT" >Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="http://localhost/project/reg.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>