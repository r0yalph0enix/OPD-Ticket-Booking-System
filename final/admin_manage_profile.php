

<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="register.css">
  <!-- <script defer src="update_patient.js"></script> -->
  <title>Update Profile</title>
</head>

<body>

  <div class="container">
    <div class="title">Edit Profile</div>
    <div class="content">
      <form id="form1" action="" method="post">

        <div class="user-details">

        <?php

include 'connect.php';
$id = $_GET['id'];

$selectquery = "select * from admin where id = $id ";

$query = mysqli_query($con, $selectquery);

$result = mysqli_fetch_assoc($query);


if (isset($_POST['submit'])) {
  
  $id = $_GET['id']; 
  $username = mysqli_real_escape_string($con, $_POST['userName']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

 

  if ($query = mysqli_query($con, " update admin set name ='$username', email = '$email' , password ='$password' where id = $id")) {
?>
    <script>
      alert("updated successfull");
      location.replace("adminDashboard.php");
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("Not updated");
    </script>
<?php
  }
}
?>


          <div class="input-box">
            <label for="userName" class="details">Username</label>
            <input type="text" id="txtUserName" class="form-control" placeholder="Enter your username" name="userName" value="<?php echo $result['name']; ?>">
            <span class="formerror hide" id="userName">User name is required</span>
          </div>
          <div class="input-box">
        <label for="email" class="details">Email</label>
        <input type="email" id="txtEmail" class="form-control" placeholder="Enter your email" name="email" value="<?php echo $result['email']; ?>">
        <span class="formerror hide" id="email"> Email field is required</span>
      </div>

          <div class="input-box">
            <label for="password" class="details">Password</label>
            <input type="password" id="txtPassword" class="form-control" placeholder="Enter your password" name="password" value="<?php echo $result['password']; ?>">
            <span class="formerror hide" id="password">Password is required </span>
          </div>
  
        </div>
        <div class="input-box button">
          <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </div>
      
    </div>
    </form>
  </div>

</body>

</html>