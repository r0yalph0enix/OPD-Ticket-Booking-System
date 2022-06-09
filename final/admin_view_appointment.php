<?php
 if(!isset($_SESSION)){
	session_start();
	}  
?>








	<!-- this is for donor registraton -->
	<div class="dashboard" style="background-color:#fff;">
		<h1 align=center style="color:Red;">Patient who have taken Appoinment</h1>
		
		
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
					

					$sql = " SELECT * FROM appointment";
					$result = mysqli_query($con,$sql);
					$count = mysqli_num_rows($result);

					if($count>=1){
						echo "<table border='1' align='center' cellpadding='32'>
							<tr>
							<th>Appointment No</th>

                                <th>Doctor ID</th>
								<th>Dr.Name</th>
						
								<th>Speciality</th>
								<th>Patient</th>

								
								<th>Date</th>
								<th>Time</th>

								<th>Price</th>
								<th>Reason For Appointment</th>

								
								
							</tr>";
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";


								echo "<td>".$row['appointment_no']."</td>";

                                echo "<td>".$row['d_id']."</td>";
								echo "<td>".$row['dname']."</td>";
							
								
								
								echo "<td>".$row['specialist']."</td>";
								echo "<td>".$row['pname']."</td>";
								
								
								echo "<td>".$row['appointmentdate']."</td>";
								echo "<td>".$row['appointmenttime']."</td>";

								echo "<td>".$row['price']."</td>";
								echo "<td>".$row['reason_for_appointment']."</td>";
								

								
								echo "</tr>";
						}
						echo "</table>";
					}
					else{
						print "<p align='center'>Sorry, there is no any booked appointment yet ..!!</p>";
					}

					?>
			</div>
		
	
	



	
	</div><!--  containerFluid Ends -->




	<!-- <script src="js/bootstrap.min.js"></script> -->


 
			



	
</body>
</html>
