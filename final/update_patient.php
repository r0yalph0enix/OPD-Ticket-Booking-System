<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="register.css">
  <!-- <script defer src="update_patient.js"></script> -->
  <title>Update</title>
</head>

<body>
  <?php

       include 'connect.php';

          $id = $_GET['id'];

          $selectquery = "select * from patient where id = $id ";

          $query = mysqli_query($con, $selectquery);

          $result = mysqli_fetch_assoc($query);
  ?>

  <div class="container">
    <div class="title">Update Profile
      (<?php echo $result['username']; ?>)
    </div>
    <div class="content">
      <form id="form1" action="" method="post">

        <div class="user-details">


          <?php

          include 'connect.php';

          $id = $_GET['id'];

          $selectquery = "select * from patient where id = $id ";

          $query = mysqli_query($con, $selectquery);

          $result = mysqli_fetch_assoc($query);


          if (isset($_POST['submit'])) {

            $id = $_GET['id']; 
            // $username = mysqli_real_escape_string($con, $_POST['userName']);
            // $email = mysqli_real_escape_string($con, $_POST['email']);
            // $password = mysqli_real_escape_string($con, $_POST['password']);
            //  $repassword = mysqli_real_escape_string($con, $_POST['rePassword']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $address = mysqli_real_escape_string($con, $_POST['address']);
            // $dateOfBirth = mysqli_real_escape_string($con, $_POST['dateOfBirth']);
           


            // $updatequery = " update `patient_registration` set `id`=$id, `username`='$username', `email`='$email, `password`='$password', `phone`='$phone', `address`='$address', `dateOfBirth`='$dateOfBirth', `gender`='$gender' where `id` = $id ";

            // $query = mysqli_query($con, $updatequery);

            if ($query = mysqli_query($con, " update patient set phone='$phone', address='$address' where id = $id ")) {
          ?>
              <script>
                alert("updated successfull");
                location.replace("admin_manage_patient.php");
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
            <input type="text" id="txtUserName" class="form-control" placeholder="Enter your username" name="userName" value="<?php echo $result['username']; ?>" disabled>
            <span class="formerror hide" id="userName">User name is required</span>
          </div>
          <div class="input-box">
            <label for="email" class="details">Email</label>
            <input type="email" id="txtEmail" class="form-control" placeholder="Enter your email" name="email" value="<?php echo $result['email']; ?>" disabled>
            <span class="formerror hide" id="email"> Email field is required</span>
          </div>

          <div class="input-box">
            <label for="password" class="details">Password</label>
            <input type="password" id="txtPassword" class="form-control" placeholder="Enter your password" name="password" value="<?php echo $result['password']; ?>" disabled>
            <span class="formerror hide" id="password">Password is required </span>
          </div>
    
          <div class="input-box">
            <label for="phone" class="details">Phone Number</label>
            <input type="phone" id="txtPhone" class="form-control" placeholder="Enter your phone number" name="phone" value="<?php echo $result['phone']; ?>">
            <span class="formerror hide" id="phone">Phone number is required </span>
          </div>
          <div class="input-box">
            <label for="address" class="details">Address</label>
            <input type="text" id="txtAddress" class="form-control" placeholder="Enter your address" name="address" value="<?php echo $result['address']; ?>">
            <span class="formerror hide" id="address"> Address field is required</span>
          </div>
          <div class="input-box">
            <label for="dateOfBirth" class="details">Date of birth</label>
            <input type="date" id="txtDateOfBirth" class="form-control" placeholder="mm / dd / yyyy" name="dateOfBirth" value="<?php echo $result['dateOfBirth']; ?>" disabled>
            <span class="formerror hide" id="dateOfBirth"> Birth date field is required</span>
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