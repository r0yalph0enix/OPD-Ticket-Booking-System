<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="admin_login.css">
  

  <title>Login</title>
</head>

<body>


  <?php
include "connect.php";
  

  if (isset($_POST['login_btn'])) {
    
    $sql= "SELECT * FROM admin WHERE name = '" . $_POST["username"]."' AND email = '" . $_POST["email"]."' AND password = '" . $_POST["password"]."'";

    $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION["username"]= $_POST["username"];
            
            // $_SESSION['adminstatus']= "yes";
              echo "<script>location.replace('adminDashboard.php');</script>";
              // echo "u are supposed to redirect to ur profile";
          } else {
              echo "<script>alert('Invalid username or password');</script>";
          }
  $con->close();		
}

?>



  <div class="wrapper">
    <h2> Admin Login</h2>
    <form id="form1" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

      <div class="input-box">
        <label for="username" class="details">Username</label>
        <input type="text" id="txtUser" class="form-control" placeholder="Enter your name" name="username">
        <span class="formerror hide" id="username"> Username field is required</span>
      </div>
      <div class="input-box">
        <label for="email" class="details">Email</label>
        <input type="email" id="txtEmail" class="form-control" placeholder="Enter your email" name="email">
        <span class="formerror hide" id="email"> Email field is required</span>
      </div>
      <div class="input-box">
        <label for="password" class="details">Password</label>
        <input type="password" id="txtPassword" class="form-control" placeholder="Enter your password" name="password">
        <span class="formerror hide" id="password">Password is required </span>
      </div>


      <div class="input-box button">
        <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
      </div>

    </form>

    <!-- <div class="login-signup">
      <label for="link" class="text">Not registered?
        <a href="admin_registration.php" class="text signup-link">Signup now</a>
      </label>
    </div> -->
  </div>
</body>

</html>