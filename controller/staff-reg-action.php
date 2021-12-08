<?php 
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") {

		$decode = json_decode($_POST["obj"], false);

		$fname = $decode->firstname;
		$lname = $decode->lastname;
		$username = $decode->username;
		$password = $decode->password;


		if (empty($fname) or empty($lname) or empty($username) or empty($password)) {
			echo "<b>Please fill up the form properly</b>";
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
					echo '<b style="color: red;">Username alrady exist. Please choose another username.</b>';
									
				}
				else{
									
					$sql = "INSERT INTO staff_info (fName, lName, username, password) VALUES (?, ?, ?, ?)";
					$stmt = $connection->prepare($sql);
					$stmt->bind_param("ssss", $fname, $lname, $username, $password);
					$res = $stmt->execute();

					if ($res) {
						echo "<b>Successfully registered</b>";
					}
					else {
						echo "<b>Error while registering!</b>";
					}
				}
				$connection->close();
			}
		}
	}
?>