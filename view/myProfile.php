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
	<link rel="stylesheet" type="text/css" href="../view/CSS/loginAdmin.css">
	<title>My Profile</title>
		<style>
		.header a.profile {
		  background-color: dodgerblue;
		  color: white;
		}
		input[type=email], input[type=tel], input[type=text], input[type=password]{
		  width: 100%;
		  padding: 7px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 2px solid #ccc;
		  box-sizing: border-box;
		}
		#msg{
			color: green;
		}
	</style>
</head>
<script src="../view/JS/myProfileChange.js"></script>
<body>
	<?php include('../Include/adminHeader.html'); ?>

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
		$userName = $_SESSION['userName'];;
		$password;
		$servername = "localhost";
		$user = "root";
		$pass = "";
		$dbname = "g-hospital";



		$connection = new mysqli($servername, $user, $pass, $dbname);

		if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
		}
		else{
			$sql = "select * from admin_info where username = '".$userName."'";
			$data = $connection->query($sql);
			if ($data->num_rows > 0) {
				while ($row = $data->fetch_assoc()) {
					$firstname = $row["fName"];
					$lastname = $row["lName"];
					$gender = $row["gender"];
					$DOB = $row["DOB"];
					$religion = $row["religion"];
					$present_Address = $row["present_add"];
					$permanent_Address = $row["parma_add"];
					$phone = $row["phone"];
					$email = $row["email"];
					$password = $row["password"];
				}
			}
			else{
				echo "<b>Your profile may delete recently!</b>";
			}
		}

	?>
	<br>

	<fieldset>
		<legend> <b>Change Information</b> </legend>
		<br>
			<form action="../controller/changeProfile-action.php" name = "login" onsubmit="sendData(this); return false;" method="POST">

					<label>First Name:</label>
					<input type="text" name="firstname" placeholder="Enter firstname" value="<?php echo $firstname ?>">

					<p id = "errorMsgName" class="e1"></p>

					<label>Last Name:</label> 
					<input type="text" name="lastname" value= "<?php echo $lastname ?>" placeholder="Enter lastname">

					<p id = "errorMsgLast" class="e1"></p>

					<label>Gender:</label>
					<input type="radio" name="gender" value="Male" <?php echo ($gender =='Male')?'checked':'' ?> >Male
					<input type="radio" name="gender" value="Female" <?php echo ($gender =='Female')?'checked':'' ?> >Female
					<input type="radio" name="gender" value="Other" <?php echo ($gender =='Other')?'checked':'' ?> >Other

					<p id = "errorMsgGender" class="e1"></p>

					<label>DOB:</label>
					<input type="date" name="birthday" value="<?php echo $DOB ?>">

					<p id = "errorMsgDOB" class="e1"></p>

					<label>Username: </label>
					<input type="text" placeholder="Enter a unique username" name="userName" value="<?php echo $userName ?>" readonly>

					<p id = "errorMsgUser" class="e1"></p>

					<label>Religion</label>

					<select name="religion">
						<option value="Islam">Islam</option>
						<option value="Hinduism">Hinduism</option>
						<option value="Christianity">Christianity</option>
						<option value="Buddhism">Buddhism</option>
					</select>
					<p id = "errorMsgRele" class="e1"></p>


					<label>Present Address: </label>
					<input type ="text" name="present_Address" value="<?php echo $present_Address ?>">

					<p id = "errorMsgPresentAdd" class="e1"></p>

					<label>Permanent Address: </label>
					<input type ="text" name="permanent_Address" value="<?php echo $permanent_Address ?>">

					<p id = "errorMsgParnaAdd" class="e1"></p>

					<label>Phone: </label>
					<input id="phone" type="tel"  name="phone" value="<?php echo $phone ?>">
					<p id = "errorMsgphone" class="e1"></p>

					<label>Email:</label>
					<input id="email" type="email" name="email"value="<?php echo $email ?>">
					
					<p id = "errorMsgEmail" class="e1"></p>

					<input id = "sub2" type="reset" name="reset" value="Reset" >
					<input id = "sub1" type="submit" name="Register" value="Update">
			</form>
			<p id="msg"></p>
		</fieldset>
		<br>

	<?php include('../Include/Footer.html'); ?>



</body>
</html>