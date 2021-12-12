<?php 

	if ($_SERVER["REQUEST_METHOD"] === "POST") {

		$decode = json_decode($_POST["obj"], false);

		$fname = $decode->firstname;
		$lname = $decode->lastname;
		$gender = $decode->gender;
		$DOB = $decode->DOB;
		$religion = $decode->religion;
		$present_Address = $decode->present_Address;
		$permanent_Address = $decode->permanent_Address;
		$phone = $decode->phone;
		$email = $decode->email;
		$username = $decode->userName;



		if (empty($fname) or empty($lname) or empty($gender) or empty($DOB) or empty($religion) or empty($present_Address) or empty($permanent_Address) or empty($phone) or empty($email)) {
			echo "<b>Please fill up the form properly</b>";
		}
		else {
			if(strlen($phone) <= 10){
				echo '<b style = " color: red">Please give valid phone number</b>';
			}
			else{
				$servername = "localhost";
				$us = "root";
				$pass = "";
				$dbname = "g-hospital";

				$connection = new mysqli($servername, $us, $pass, $dbname);

				if ($connection->connect_error) {
					die("Connection failed: " . $connection->connect_error);
				}
				else{

					$sql = "select * from admin_info where username = '".$username."'";

					$data = $connection->query($sql);

					if ($data->num_rows > 0) {
						$sql = "UPDATE admin_info set fName = ?, lName = ?, gender = ?, DOB = ?, religion = ?, present_add = ?, parma_add = ?, phone = ?, email = ? WHERE username = '".$username."'";


						$stmt = $connection->prepare($sql);
						$stmt->bind_param("sssssssss", $fname, $lname, $gender, $DOB, $religion, $present_Address, $permanent_Address, $phone, $email);
						$res = $stmt->execute();

						if ($res) {
							echo "<b>Successfully updated information</b>";
						}
						else {
							echo '<b style = " color: red">Error while updating!</b>';
						}
										
					}
					else{
										
						echo "<b>Your account may be deleted!</b>";
					}
					$connection->close();
				}
			}
		}
	}

?>