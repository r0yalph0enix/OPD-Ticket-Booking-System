
<?php

session_start();

if(!isset($_SESSION['username'])){
    echo "You are logged out";
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="admin.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="menu-bar">
        <h1 class="logo"><span>Online OPD Ticket Booking System</span></h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li id="a"><a href="#about">About</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <!-- For displaying whose user home page this is -->
        <h1>Welcome <?php echo  $_SESSION['username']; ?></h1>

    </div>

    <div class="hero">
        &nbsp;
    </div>
    <div>
    <h2 id="about">About</h2>
<!-- <a href="#a"></a> -->

        <p>
		This is online OPd ticket booking system.This system helps to book ticket of various department like; Dermatology,Cardiology,Family Medicine,Gastrology,Ophthalmology,Orthopedic,Dental,Neurology.
        </p>
    </div>

        <div class="foot">
    <footer >
        <a href="#">Lalitpur</a>
        <a href="#">9824536743</a>
        <a href="#">www.onlineOPDbooking.com</a>
        <a href="#">&copy; 2022 | Online OPD Ticket Booking System</a>
    </footer>
</div>
</body>

</html>