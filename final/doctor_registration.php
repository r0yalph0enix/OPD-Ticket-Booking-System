<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="doctor_registration.css">
  <script defer src="doctor_register.js"></script>
  <title>Registration</title>
</head>

<body>
  <?php
  include 'connect.php';
 if(isset($_POST['submit'])){
   $doctorname = mysqli_real_escape_string($con, $_POST['userName']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $password = mysqli_real_escape_string($con, $_POST['password']);
   $repassword = mysqli_real_escape_string($con, $_POST['rePassword']);
   $phone = mysqli_real_escape_string($con, $_POST['phone']);
   $degree = mysqli_real_escape_string($con, $_POST['degree']);
   $specialist = mysqli_real_escape_string($con, $_POST['speciality']);
   $address = mysqli_real_escape_string($con, $_POST['address']);
   $dateOfBirth = mysqli_real_escape_string($con, $_POST['dateOfBirth']);
   $gender = mysqli_real_escape_string($con, $_POST['gender']);

   // js validation done so below is accurate
  //  $username = $_POST['userName'];
  //  $email = $_POST['email'];
  //  $password = $_POST['password'];
  //  $repassword = $_POST['rePassword'];
  //  $phone = $_POST['phone'];
  //  $specialist = $_POST['speciality'];
  //  $address = $_POST['address'];
  //  $dateOfBirth = $_POST['dateOfBirth'];
  //  $gender = $_POST['gender'];


/*  // for encrypting pw---> if you encrypt pw then in db you can't understand what actual pw is so don't encrpt for now
   $pass = password_hash($password, PASSWORD_BCRYPT);
   $repass = password_hash($repassword, PASSWORD_BCRYPT);
   */

// to check email whether exist or not in db
$emailquery = "select * from doctor where email='$email' ";
$query = mysqli_query($con,$emailquery);

$emailcount =mysqli_num_rows($query);
if($emailcount>0){ //$emailcount>0 means even if single same email exist then you will get mssg already exist
  // echo "Email already exists";
  ?>
  <script>
    alert("Email already exists");
  </script>
  <?php
}else{
  if($password === $repassword){
    // $insertquery = "insert into registration( username, email, Password, repassword, phone, gender) values('$username','$email','$password','$repassword','$phone','$gender')";
   
    $insertquery = "INSERT INTO `doctor`(`doctorname`,`email`,`password`,`phone`,`address`,`degree`,`specialist`,`dateOfBirth`,`gender`)
    VALUES('$doctorname','$email','$password','$phone','$address','$degree','$specialist','$dateOfBirth','$gender')";
  
    $iquery = mysqli_query($con, $insertquery);
    if($iquery){
      ?>
      <script>
          alert("Registered successfully");
         
      </script>
      <?php
  }else{
      ?>
      <script>
      alert("Registration failed");
      </script>
      <?php
  }
  }else{
    ?>
    <script>
      alert("Password are not matching");
    </script>
  <?php
  }
}



 }
  ?>
  <div class="container">
    <div class="title"> Doctor Registration</div>
    <div class="content">
      <form id="form1" action="" method="post">
          <!--   id="form" -->
        <div class="user-details">
          <div class="input-box">
            <label for="userName" class="details">Username</label>
            <input type="text" id="txtUserName" class="form-control" placeholder="Enter your username" name="userName">
            <span class="formerror hide" id="userName">User name is required</span>
          </div>
          <div class="input-box">
            <label for="email" class="details">Email</label>
            <input type="email" id="txtEmail" class="form-control" placeholder="Enter your email" name="email" >
            <span class="formerror hide" id="email"> Email field is required</span> 
        </div>

          <div class="input-box">
            <label for="password" class="details">Password</label>
            <input type="password" id="txtPassword" class="form-control" placeholder="Enter your password" name="password">
            <span class="formerror hide" id="password">Password is required </span>
        </div>
          <div class="input-box">
            <label for="RePassword"class="details">Confirm Password</label>
            <input type="password" id="txtRePassword" class="form-control" placeholder="Confirm your password" name="rePassword">
            <span class="formerror hide" id="conPassword">Confirm Password is required </span>  
        </div>
          <div class="input-box">
            <label for="phone" class="details">Phone Number</label>
            <input type="phone" id="txtPhone" class="form-control" placeholder="Enter your phone number" name="phone" >
            <span class="formerror hide" id="phone">Phone number is required </span> 
        </div>
        
        <div class="input-box">
            <label for="address" class="details">Address</label>
            <input type="text" id="txtAddress" class="form-control" placeholder="Enter your address" name="address">
            <span class="formerror hide" id="address"> Address field is required</span>  
        </div>
        <div class="input-box">
            <label for="degree" class="details">Degree</label>
            <input type="text" id="txtDegree" class="form-control" placeholder="Enter your degree" name="degree">
            <span class="formerror hide" id="degree"> Degree field is required</span>  
        </div>
        <div class="input-box">
            <label for="speciality" class="details">Specialist</label>
            <input type="text" id="txtSpecialist" class="form-control" placeholder="Enter your speciality" name="speciality">
            <span class="formerror hide" id="speciality"> Specialist field is required</span>  
        </div>
          <div class="input-box">
            <label for="dateOfBirth" class="details">Date of birth</label>
            <input type="date" id="txtDateOfBirth" class="form-control" placeholder="mm / dd / yyyy" name="dateOfBirth">
            <span class="formerror hide" id="dateOfBirth"> Birth date field is required</span>
        </div>
        <div class="radio-container">

<label for="gender" class="gender" id="gender">Gender</label><br>

<input type="radio" id="male" name="gender" value="Male">
<label for="male">Male</label>

 
  <input type="radio" id="female" name="gender" value="Female">
  <label for="female">Female</label>

 
  <input type="radio" id="other" name="gender" value="Other">
  <label for="other">Other</label>

</div>
        </div>
        <div class="input-box button">
          <button type="submit" class="btn btn-primary" name="submit">Sign up</button>
        </div>
        <div class="login-signup">
          <label for="link" class="text">Already registered?
            <a href="doctor.php" class="text signup-link">Login</a>
          </label>
        </div>
      
      
    
    </div>
  </form>
  </div>

</body>

</html>