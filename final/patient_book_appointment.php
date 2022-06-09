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


$sql = "SELECT * FROM doctor_schedule WHERE schedule_id = $id ";

$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row  = $result->fetch_assoc()) {
        $id   = $row["schedule_id"];
        $doctorname     = $row["doctorname"];
        // $gender     = $row["gender"];
        $specialist = $row["specialist"];
        $date     = $row["appointmentdate"];
        $time     = $row["appointmenttime"];
        $price = $row["appointmentprice"];
         $d_id = $row["d_id"];
    }
}

$con->close();

?>
<!-- fetching patient info -->


<!-- 	booking info-->
<div class="login" style="background-color:#fff;">
    <h3 class="text-center" style="background-color:#272327;color: #fff;">Book Appoinment</h3>
    <div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
       
    <form action="" method="post" class="text-center form-group" enctype="multipath/form-data">


            <label>
                Dr. Name: <input type="text" name="dname" value="<?php echo $doctorname; ?>" >
            </label><br><br>

           

            <label>
                Specialist: <input type="text" name="specialist" value="<?php echo $specialist; ?>" >
            </label><br><br>

            <label>
                Fee: <input type="text" name="price" value="<?php echo $price; ?>"  >
            </label><br><br>
            <label>
            <label>
                Patien Id: <input type="text" name="pid" value=""  >
            </label><br><br>
                Your Name: <input type="text" name="pname" value="">
            </label><br><br>

            <label>
                Contact: <input type="text" name="pcontact" value="" >
            </label><br><br>
            <label>
                Reason: <input type="text" name="preason" value="" >
            </label><br><br>
            <label>
                E-mail: <input type="email" name="email" value="" >
            </label><br><br>

            <label>
                Address: <input type="text" name="address" value="">
            </label><br><br>
            <label>
               Appointment Date: <input type="date" name="appointmentdate" value="<?php echo $date; ?>">
            </label><br><br>
            <label>
           Appointment Time: <input type="time" name="appointmenttime" value="<?php echo $time; ?>">
            </label><br><br>
            
            <label>
                <input type="hidden" name="d_id" value="<?php echo $d_id; ?>">
            </label><br><br>

            <button name="submit" type="submit" style="padding-right:5px;border-radius:3px;margin: right 0px;">Confirm</button>
            <!-- <a href="search_doctor.php"><button name="" type="" style="padding-right:5px;border-radius:3px;margin-right:-150px;">Cancel</button></a> <br> -->


        </form> <br><br>

    </div>


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

<!-- confirming booking -->




</div><!--  containerFluid Ends -->




<!-- <script src="js/bootstrap.min.js"></script> -->






</body>

</html>