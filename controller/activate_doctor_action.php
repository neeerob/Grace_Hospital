<?php 
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") {

		$decode = json_decode($_POST["obj"], false);

		$username = $decode->username;


		if (empty($username)) {
			echo "<b>Please Select a user!</b>";
		}
		else {
			$servername = "localhost";
			$us = "root";
			$pass = "";
			$dbname = "g-hospital";

			$connection = new mysqli($servername, $us, $pass, $dbname);

			if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}
			else{

				$true = 'True';

				$sql = "select * from doctor_info where username = '".$username."'";

				$data = $connection->query($sql);

				if ($data->num_rows > 0) {

					$row = $data->fetch_assoc();

					$sql = "UPDATE doctor_info set activated = ? WHERE username = '".$username."'";

					$stmt = $connection->prepare($sql);

					$stmt->bind_param("s", $true);

					$res = $stmt->execute();

					if ($res) {
						echo "<b>Successfully activated account!</b>";

					}
					else {
						echo "<b>Error while activating!</b>";
					}
									
				}
				else{
									
					echo '<b style="color: red;">This user may be deleted!</b>';
				}
				$connection->close();
			}
		}
	}


?>