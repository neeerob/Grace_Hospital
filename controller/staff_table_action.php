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
		echo '<table id = "tableSelect" class="styled-table">
			<thead>
			<tr>
				<th>Name</th>
				<th>username</th>
				<th>Shift</th>
				<th>DOB</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Active</th>
				<th>Select</th>
			</tr>
			</thead> <tbody>';
		$sql = "select * from staff_info";
		$data = $connection->query($sql);
		if ($data->num_rows > 0) {	
			while ($row = $data->fetch_assoc()) {
				$firstname = $row["fName"];
				$lastname = $row["lName"];
				$phone = $row["phone"];
				$username = $row["username"];
				$specilities = $row["Shift"];
				$uni = $row["active"];
				$email = $row["email"];
				$DOB = $row["DOB"];
				if($row["active"] !== "True"){
					$uni = "Inactive";
				}
				else{
					$uni = $row["active"];
				}
				echo '<tr> <td>';
				echo $firstname;
				echo " ";
				echo $lastname;
				echo '</td> <td>';
				echo $username;
				echo '</td><td>'; 
				echo $specilities;
				echo '</td><td>' ;
				echo $DOB;
				echo '</td><td>'; 
				echo $phone;
				echo '</td><td>';
				echo $email;
				echo '</td><td>';
				echo $uni;
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