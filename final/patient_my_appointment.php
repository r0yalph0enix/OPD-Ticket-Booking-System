<?php 

if(!isset($_SESSION)){
	session_start();
	}
      
?>





	<div class="dashboard" style="background-color:#fff;">
	<h1 align=center style="color:Red;">My Appointment</h1>
		
		
	</div>
	<style>table{
    background-color:white;
    border:2px;
}
table, th, td {
  border: 4px solid black;
  border-collapse: collapse;
}
th{
	background-color:grey;
}
tr:hover {background-color: #D6EEEE;}

</style>
		
			<div class="all_user" style="margin-top:0px; margin-left: 40px;">
				<?php 
					include "connect.php";
					
                    
					$currentUser = $_SESSION['username'];
					
					$sql = " select * from appointment where pname = '$currentUser'";
					
				
					$result = mysqli_query($con,$sql);
					$count = mysqli_num_rows($result);

					if($count>=1){
						echo "<table border='1' align='center' cellpadding='32'>
							<tr>
							    <th>Appointment No</th>
							    <th>Doctor ID</th>
								<th> Doctor</th>
								<th>Doctor Speciality</th>
								<th>Reason</th>
								<th>Appointment Date</th>
								<th>Appointment Time</th>
								<th>Appointment Price</th>
							
							</tr>";
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['appointment_no']."</td>";
								echo "<td>".$row['d_id']."</td>";
								echo "<td>".$row['dname']."</td>";
								echo "<td>".$row['specialist']."</td>";
								echo "<td>".$row['reason_for_appointment']."</td>";
								echo "<td>".$row['appointmentdate']."</td>";
								echo "<td>".$row['appointmenttime']."</td>";
								echo "<td>".$row['price']."</td>";
						?>
						
						<?php
								echo "</tr>";
						}
						echo "</table>";
					}
					else{
						print "<p align='center'>Sorry, you haven't booked any appointment !!</p>";
					}

					?>

				
			</div>
		
	
	
	



	
	</div>





</body>
</html>
