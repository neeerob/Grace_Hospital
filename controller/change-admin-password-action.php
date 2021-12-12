<?php 

	session_start();

	if ($_SERVER["REQUEST_METHOD"] === "POST") {

		$decode = json_decode($_POST["obj"], false);

		$password = $decode->pass;
		$con = $decode->conpass;
		$old = $decode->old;
		$username = $_SESSION['userName'];



		if (empty($password) or empty($con) or empty($old)) {
			echo "<b>Please fill up the form properly</b>";
		}
		else {
			if($con === $password){
				if(strlen($password) >= 8){
					$servername = "localhost";
					$us = "root";
					$pass = "";
					$dbname = "g-hospital";

					$connection = new mysqli($servername, $us, $pass, $dbname);

					if ($connection->connect_error) {
						die("Connection failed: " . $connection->connect_error);
					}
					else{

						$sql = "select * from admin_info where username = '".$username."' and password = '".$old."'";

						$data = $connection->query($sql);

						if ($data->num_rows > 0) {
							$sql = "UPDATE admin_info set password = ? WHERE username = '".$username."' and password = '".$old."'";


							$stmt = $connection->prepare($sql);
							$stmt->bind_param("s", $password);
							$res = $stmt->execute();

							if ($res) {
								echo "<b>Successfully updated information</b>";
							}
							else {
								echo "<b>Error while updating!</b>";
							}
											
						}
						else{
											
							echo '<b style = " color: red">Your given old password is wrong!</b>';
						}
						$connection->close();
					}
				}
				else{
					echo "<b>Password leanth must be greater then 8!</b>";
				}
			}

			else{
				echo "<b>New and conform password must be same!</b>";
			}
		}
	}


?>