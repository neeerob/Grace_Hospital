
<?php 

	session_start();

	if(count($_SESSION) === 0){

		header("Location: ../controller/Logout.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
</head>
<body>

	<?php include('../Include/Header.html'); ?>

	<?php 
		$firstname;
		$lastname;
		$gender;
		$DOB;
		$religion;
		$present_Address;
		$permanent_Address;
		$phone;
		$email;
		$userName;
		$password;
		if(file_exists("../model/admin_data.json")){
			$handle = fopen("../model/admin_data.json","r");
			$explode = fread($handle,filesize("../model/admin_data.json"));
			$explode = explode("\n", $explode);
			$loginFlag = false;

			for($i = 0; $i<count($explode) - 1;$i++){
				$json = json_decode($explode[$i]);
					if($json->userName === $_SESSION['userName']){
							$firstname = $json->firstname ;
							$lastname = $json->lastname ;
							$gender = $json->gender ;
							$DOB = $json->DOB ;
							$religion = $json->religion ;
							$present_Address = $json->present_Address ;
							$permanent_Address = $json->permanent_Address ;
							$phone = $json->Phone ;
							$email = $json->email ;
							$userName = $json->userName ;
							$password = $json->password ;
							break;

					}
			}
		}
	?>

	<p>Welcome, <?php echo "$firstname $lastname. " ?>Your username: <b> <?php echo "$userName" ?> </b></p>

	<p>    <a href="../controller/Home.php">Home</a>   |  <a href="admin_profile.php">Profile</a>  |  <a href="../controller/Logout.php">Logout</a>  |  <a href="../controller/ChangePassAdmin.php"><?php $_SESSION['userName'] = $userName; ?>Change password</a></p><hr>

	<fieldset>
		<legend>Menu</legend>
		<p>1. <a href="../view/RegAdmin.php">Add a Admin<?php $_SESSION['userName'] = $userName; ?></a></p>
		<p>2. <a href="../controller/StaffCreate.php">Create Staff account</a></p>
		<p>3. <a href="../controller/GiveDiscount.php">Give discount to patient</a></p>
		<p>4. <a href="../controller/verifyDoctor.php">Validate/Activite Doctor account</a></p>
		<p>5. <a href="../controller/deleteStaff.php">Delete Staff account</a></p>
		<p>6. <a href="../controller/deleteDoctor.php">Delete Doctor account</a></p>
		<p>7. <a href="../controller/changeStaffWorkSchedules.php">Change staff work schedule</a></p>

	</fieldset>

	<br>

	<fieldset>
		<legend>Your Profile</legend>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
			<label>First Name:</label>
			<input type="text" name="firstname" value="<?php echo $firstname ?>">
			<br><br>

			<label>Last Name:</label> 
			<input type="text" name="lastname" value="<?php echo $lastname ?>">
			<br><br>

			<label>Gender:</label>
			<input type="radio" name="gender" value="male" <?php echo ($gender =='male')?'checked':'' ?> >Male
			<input type="radio" name="gender" value="female" <?php echo ($gender =='female')?'checked':'' ?> >Female
			<input type="radio" name="gender" value="Other" <?php echo ($gender =='Other')?'checked':'' ?> >Other

			<br><br>

			<label>DOB:</label>
			<input type="date" name="birthday" value="<?php echo $DOB ?>">
			<br><br>

			<label>Religion</label>
			<select name="religion">
				<option value="Islam">Islam</option>
				<option value="Hinduism">Hinduism</option>
				<option value="Christianity">Christianity</option>
				<option value="Buddhism">Buddhism</option>
			</select>

			<br><br>

			<label>Present Address: </label>
			<input type ="text" name="present_Address" value="<?php echo $present_Address ?>">
			
			<br><br>

			<label>Permanent Address: </label>
			<input type ="text" name="permanent_Address" value="<?php echo $permanent_Address ?>">
			<br><br>

			<label>Phone: </label>
			<input type="tel"  name="phone"value="<?php echo $phone ?>">
			<br><br>

			<label>Email:</label>
			<input type="email" name="email"value="<?php echo $email ?>">
			<br><br>

			<input type="submit" name="submit" value="Change Information">
		</form>


	<?php 

		if($_SERVER['REQUEST_METHOD'] === "POST"){

				echo "$cookie_password" ;
				echo "$cookie_userName";
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$gender = $_POST['gender'];
				$DOB = $_POST['birthday'];
				$religion = $_POST['religion'];
				$present_Address = trim($_POST['present_Address']);
				$permanent_Address = trim($_POST['permanent_Address']);
				$phone = $_POST['phone'];
				$email = $_POST['email'];

				if(empty($firstname) or empty($lastname) or empty($gender) or empty($DOB) or empty($religion) or empty($email) or empty($userName) or empty($password)){
						echo "<br><b>Please fill all information to change your information.</b>";
						$isValid = false;
					}

				else{
					$arr1;
					if(file_exists("../model/admin_data.json")){
						$handle = fopen("../model/admin_data.json","r");
						$explode = fread($handle,filesize("../model/admin_data.json"));
						$explode = explode("\n", $explode);
						/*echo "<br>";
						var_dump($explode[1]);
						echo "<br><br><br>";*/
						for($i = 0; $i<count($explode) - 1;$i++){
							$json = json_decode($explode[$i]);
							if($_SESSION['userName'] === $json->userName){
								$json->firstname = "$firstname";
								$json->lastname = "$lastname";
								$json->gender = "$gender";
								$json->DOB = "$DOB";
								$json->present_Address = "$present_Address";
								$json->permanent_Address = "$permanent_Address";
								$json->Phone = "$phone";
								$json->email = "$email";
								$json->religion = "$religion";

								//var_dump($json);
								//echo "Okkk ---- <br>";
								$handel = fopen("../model/admin_data.json","w");
								$encode = json_encode($json);
								$res1 = fwrite($handel, $encode . "\n");


								unset($explode[$i]);
								$explode1 = $explode;
								$handel = fopen("../model/admin_data.json","a");
								for($i = 0; $i<count($explode1);$i++){
									//$encode = json_encode($arrJson);
									$res2 = fwrite($handel, $explode1[$i] . "\n");
								}
								if($res1 and $res2)
								{
									echo "<br><b>Successfully changed Information!</b>";
								}
								break;
							}

						}
					}

					else{
						echo "json file not found!";
					}
				}
			}
		?>

	</fieldset>

	<?php include('../Include/Footer.html'); ?>



</body>
</html>