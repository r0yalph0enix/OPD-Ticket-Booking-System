

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Manage Doctor Profile</title>
    <style>
        table{
            background-color:lightblue;
            border:2px;
        }
       
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: blue;
}
</style>
</head>
<body>
    <div class="main-div">
    <h1 style="color:Red;">List of Doctor</h1>
        <div class="center-div">
            <div class="table">
                <table border="3" cellspacing = "8">
                    <thead>
                        <th>ID</th>
                        <th>DOCTORNAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>PHONE</th>
                        <th>ADDRESS</th>
                        <th>DEGREE</th>
                        <th>SPECIALIST</th>
                        <th>DATE_OF_BIRTH</th>
                        <th>GENDER</th>
                        <th colspan="2">Operation</th>
                    </thead>
                    <tbody>
                        <?php

                            include "connect.php";
                            
                            $selectquery = " select * from doctor ";

                            $query = mysqli_query($con,$selectquery );

    

                            while($result = mysqli_fetch_assoc($query)){

                                ?>

                            
                       
                            <tr>
                            <td><?php  echo $result['id']; ?></td>
                                <!-- below username is same from db table which must be same  in echo $result[''] -->
                                <td><?php  echo $result['doctorname']; ?></td>
                                <td><?php  echo $result['email']; ?></td>
                                <td><?php  echo $result['password']; ?></td>
                                <td><?php  echo $result['phone']; ?></td>
                                <td><?php  echo $result['address']; ?></td>
                                <td><?php  echo $result['degree']; ?></td>
                                <td><?php  echo $result['specialist']; ?></td>
                                <td><?php  echo $result['dateOfBirth']; ?></td>
                                <td><?php  echo $result['gender']; ?></td>
                                <td><a href ="update_doctor.php?id=<?php  echo $result['id']; ?>">Edit</a></td>
                                <td><a href ="delete_doctor.php?id=<?php  echo $result['id']; ?>">Delete</a></td>
                               
                            </tr>

                        <?php
                        }

                        ?>

                    </tbody>
                </table>

            </div>

        </div> 

    </div>
    
</body>
</html>