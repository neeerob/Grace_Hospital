<?php 
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") {

		$decode = json_decode($_POST["obj"], false);

		$username = $decode->username;
		$newTime = $decode->newTime;


		if (empty($username) or empty($newTime)) {
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

				$sql = "select * from staff_info where username = '".$username."'";

				$data = $connection->query($sql);

				if ($data->num_rows > 0) {

					$row = $data->fetch_assoc();

					$sql = "UPDATE staff_info set Shift = ? WHERE username = '".$username."'";

					$stmt = $connection->prepare($sql);

					$stmt->bind_param("s", $newTime);

					$res = $stmt->execute();

					if ($res) {
						echo "<b>Successfully changed work schedule!</b>";
						/*header("Location: ../view/discount_patient.php");*/
						/*echo '<br><br><button id = "sub2" onClick="window.location.href=window.location.href">Refresh Page</button>';*/
						/*header("Refresh:0");*/
						/*function_alert("We welcome the New World");

						function function_alert($msg) {
						    echo "<script type='text/javascript'>alert('$msg');</script>";
						}*/
					}
					else {
						echo "<b>Error while changing!</b>";
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