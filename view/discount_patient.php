<?php 

	session_start();

	if(count($_SESSION) == 0){

		header("Location: ../controller/Logout.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add admin</title>
	<link rel="stylesheet" type="text/css" href="../view/CSS/table.css">
	<style>
		#msg1{
			color: red;
			font-size: 18px;
		}

		#msgOk{
			color: green;
			font-size: 18px;
		}
	</style>
</head>
<script src="../view/JS/discount_patient.js"></script>
<link rel="stylesheet" type="text/css" href="../view/CSS/loginAdmin.css">
<body>
	<?php include('../Include/adminHeader.html'); ?>
	<p>Welcome to <b>Give dicount</b> to patient page. You can give discount to patient from the patient list. Your only can give discount <b>5%-25%</b>. </p>

		<legend> <b>Discount patient</b> </legend>
			<form action="../controller/discount_patient_action.php" name = "login" onsubmit="sendData(this); return false;" method="POST">

					<!-- <table class="styled-table">
				    <thead>
				        <tr>
				            <th>Name</th>
				            <th>username</th>
				            <th>Room number</th>
				            <th>total ammount</th>
				            <th>Phone</th>
				            <th>Select</th>
				        </tr>
				    </thead> -->
				    <!-- <tbody>
				        <tr>
				            <td>Dom</td>
				            <td>6000</td>
				            <td>
					            <input type="checkbox" name="remember">
					            <label>Click Me</label>
				            </td>
				        </tr>
				        <tr>
				            <td>name</td>
				            <td>username</td>
				            <td>room</td>
				            <td>TotalAmmount</td>
				            <td>Phone</td>
				            <td>
				            	<input type="checkbox" name="remember">
					            <label>Click Me</label>
				            </td>
				        </tr>
				        <tr>
				            <td>Melissa</td>
				            <td>5150</td>
				            <td>
				            	<input type="checkbox" name="remember">
					            <label>Click Me</label>
				            </td>
				        </tr>
				    </tbody> -->
				   <tbody>

				<?php 

					$servername = "localhost";
					$user = "root";
					$pass = "";
					$dbname = "g-hospital";



					$connection = new mysqli($servername, $user, $pass, $dbname);

					if ($connection->connect_error) {
						die("Connection failed: " . $connection->connect_error);
					}
					else{
						echo '<table class="styled-table">
					    <thead>
					        <tr>
					            <th>Name</th>
					            <th>username</th>
					            <th>Room number</th>
					            <th>DOB</th>
					            <th>Phone</th>
					            <th>Email</th>
					            <th>Total ammount</th>
					            <th>Select</th>
					        </tr>
					    </thead> <tbody>';
						$sql = "select * from patient_info";
						$data = $connection->query($sql);
						if ($data->num_rows > 0) {
							while ($row = $data->fetch_assoc()) {
								$firstname = $row["fName"];
								$lastname = $row["lName"];
								$phone = $row["phone"];
								$username = $row["username"];
								$room = $row["roomNumber"];
								$TotalAmmount = $row["totalAmmount"];
								$email = $row["email"];
								$DOB = $row["DOB"];
								echo '<tr> <td>';
								echo $firstname;
								echo " ";
								echo $lastname;
								echo '</td> <td>';
								echo $username;
								echo '</td><td>'; 
								echo $room;
								echo '</td><td>' ;
								echo $DOB;
								echo '</td><td>'; 
								echo $phone;
								echo '</td><td>';
								echo $email;
								echo '</td><td> $';
								echo $TotalAmmount;
								echo '</td><td>';
						        echo '<input type="radio" name="remember" value = "';
						        echo $username;
						        echo '"><label></label></td></tr>';
							}
							echo '</tbody></table>';
						}
						else{
							echo "<b>No data found!</b>";
						}
					}
				?>

					<label>Select discount percentage</label>
					<select name="discount_patient">
						<option value="5">5%</option>
						<option value="10">10%</option>
						<option value="15">15%</option>
						<option value="20">20%</option>
						<option value="25">25%</option>
					</select>

					<p id="msg1" ></p>

					<!-- <input id = "sub2" type="reset" name="reset" value="Refresh" > -->
					<input id = "sub1" type="submit" name="giveDiscount" value="Give Discount">

			</form>

			<p id="msgOk"></p>

<br>

	
	

	<?php include('../Include/Footer.html'); ?>

</body>
</html>