<?php

// include "connect.php";

if (!isset($_SESSION)) {
    session_start();
}
?>


<!-- result -->
<?php
$id = isset($_GET['id']) ? $_GET['id'] : "";

?>
<!-- fetching doctor info -->
<?php
include "connect.php";


$sql = "SELECT * FROM doctor_schedule WHERE d_id = $id ";

$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row  = $result->fetch_assoc()) {
        $id   = $row["d_id"];
        $doctorname     = $row["doctorname"];
        // $gender     = $row["gender"];
        $specialist = $row["specialist"];
        $date     = $row["appointmentdate"];
        $time     = $row["appointmenttime"];
        $price = $row["appointmentprice"];
         $d_id = $row["d_id"];
    }
}


?>

<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="register.css">
  <!-- <script defer src="patient_update_profile.js"></script> -->
  <title>Book</title>
  
</head>

<body>

  <div class="container">
    <div class="title">Book Appointment
    (<?php echo  $_SESSION['username']; ?>)
    </div>
    <div class="content">
      <form id="form1" action="" method="post">

        <div class="user-details">   

         
     <div class="input-box">
            <label for="doctorName" class="details">Doctor Name</label>
            <input type="text" id="txtDoctorName" class="form-control" placeholder="Enter your name" name="dname" value="<?php echo $doctorname; ?>" >
            <span class="formerror hide" id="doctorName">Doctor name is required</span>
          </div>
          <div class="input-box">
            <label for="speciality" class="details">Specialist</label>
            <input type="text" id="txtSpecialist" class="form-control" placeholder="Enter your speciality" name="specialist"  value="<?php echo $specialist; ?>" >
            <span class="formerror hide" id="speciality"> Specialist field is required</span>  
        </div>
        <div class="input-box">
            <label for="price" class="details">Apppointment Price</label>
            <input type="text" id="txtPrice" class="form-control" placeholder="Enter your appointment price" name="price" value="<?php echo $price; ?>"   >
           
        </div>


<?php
            // $id = $_GET['id'];

// $selectquery = "select * from patient where id = $id ";
$currentUser = $_SESSION['username'];

$selectquery = " select * from patient where username = '$currentUser'";

// $selectquery = "select * from patient_registration ";

$query = mysqli_query($con, $selectquery);

$result = mysqli_fetch_assoc($query);
?>
 <div class="input-box">
            <label for="patient id" class="details">Patient id</label>
            <input type="number" id="txtPatientId" class="form-control" placeholder="Enter your id" name="pid" value="<?php echo $result['id']; ?>" >
            
          </div>

          <div class="input-box">
            <label for="userName" class="details">User Name</label>
            <input type="text" id="txtUserName" class="form-control" placeholder="Enter your username" name="pname" value="<?php echo $result['username']; ?>" >
            <span class="formerror hide" id="userName">User name is required</span>
          </div>

          <div class="input-box">
            <label for="phone" class="details">Phone Number</label>
            <input type="phone" id="txtPhone" class="form-control" placeholder="Enter your phone number" name="pcontact" value="<?php echo $result['phone']; ?>">
            <span class="formerror hide" id="phone">Phone number is required </span>
          </div>

          <div class="input-box">
            <label for="userName" class="details">Reason for appointment</label>
            <input type="text" id="txtUserName" class="form-control" placeholder="Enter your reason" name="preason" >
            <span class="formerror hide" id="userName">User name is required</span>
          </div>

          <div class="input-box">
            <label for="email" class="details">Email</label>
            <input type="email" id="txtEmail" class="form-control" placeholder="Enter your email" name="email" value="<?php echo $result['email']; ?>">
            <span class="formerror hide" id="email"> Email field is required</span>
          </div>

    
         
          <div class="input-box">
            <label for="address" class="details">Address</label>
            <input type="text" id="txtAddress" class="form-control" placeholder="Enter your address" name="address" value="<?php echo $result['address']; ?>">
            <span class="formerror hide" id="address"> Address field is required</span>
          </div>
        
          <div class="input-box">
            <label for="date" class="details">Apppointment Date</label>
            <input type="date" id="txtDate" class="form-control" placeholder="Enter appointment date" name="appointmentdate" value="<?php echo $date; ?>" >
             
        </div>

        <div class="input-box">
            <label for="time" class="details">Apppointment Time</label>
            <input type="time" id="txtTime" class="form-control" placeholder="Enter appointment time" name="appointmenttime" value="<?php echo $time; ?>">
    
        </div>
        <label>
                <input type="hidden" name="d_id" value="<?php echo $d_id; ?>">
            </label><br><br>

        </div>
        <div class="input-box button">
          <button type="submit" class="btn btn-primary" name="submit">Confirm Appointment</button>
        </div>
      
    </div>
    </form>
  </div>

  <!-- 	booking info-->

<!-- confirming booking -->
<?php

include "connect.php";
if (isset($_POST['submit'])) {


    $sql = " INSERT INTO appointment (dname,d_id,specialist,price,p_id, pname,pcontact,reason_for_appointment,email,address,appointmentdate,appointmenttime)
							VALUES ('" . $_POST["dname"] . "','" . $_POST["d_id"] . "', '" . $_POST["specialist"] . "', '" . $_POST["price"] . "','" . $_POST["pid"] . "', '" . $_POST["pname"] . "','" . $_POST["pcontact"] . "','" . $_POST["preason"] . "','" . $_POST["email"] . "','" . $_POST["address"] . "','" . $_POST["appointmentdate"] . "','" . $_POST["appointmenttime"] . "' )";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Your booking has been accepted!');</script>";
        echo "<script>location.replace('patient_doctor_schedule.php');</script>";
    } else {
        echo "<script>alert('There was an Error')<script>";
    }

    $con->close();
}
?>

</body>

</html>