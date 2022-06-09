<?php 
if(!isset($_SESSION)){
	session_start();
	}  
?>







	<div class="dashboard" style="background-color:#fff;">
	<h1 align=center style="color:Red;"> Appointment</h1>
		
		
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
					$sql = " select * from appointment where dname = '$currentUser'";
				
					$result = mysqli_query($con,$sql);
					$count = mysqli_num_rows($result);

					if($count>=1){
						echo "<table border='1' align='center' cellpadding='32'>
							<tr>
							    
							<th>Appointment No</th>
							    <th>Patient ID</th>
								
								<th>Patient Name</th>
								<th>Reason For Appointment</th>
								<th>Phone No</th>
								
								
								<th>address</th>
								<th>Appointment Date</th>
								<th>Appointment Time</th>
								<th>Appointment Price</th>

							</tr>";
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";

								echo "<td>".$row['appointment_no']."</td>";
								echo "<td>".$row['p_id']."</td>";
							
								echo "<td>".$row['pname']."</td>";
								echo "<td>".$row['reason_for_appointment']."</td>";
								echo "<td>".$row['pcontact']."</td>";
								// echo "<td>".$row['email']."</td>";
								echo "<td>".$row['address']."</td>";
								echo "<td>".$row['appointmentdate']."</td>";
								echo "<td>".$row['appointmenttime']."</td>";
								echo "<td>".$row['price']."</td>";
								echo "</tr>";
						}
						echo "</table>";
					}
					else{
						print "<p align='center'>Sorry, No match found for your search result..!!</p>";
					}

					?>
			</div>
		
	
	
	

	



	
	</div><!--  containerFluid Ends -->




	<!-- <script src="js/bootstrap.min.js"></script> -->


 
			



	
</body>
</html>
