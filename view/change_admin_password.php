<?php 

	session_start();

	if(count($_SESSION) == 0){

		header("Location: ../controller/Logout.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../view/CSS/loginAdmin.css">
	<meta charset="utf-8">
	<title>Change Password</title>
	<style>
		.header a.password {
		  background-color: dodgerblue;
		  color: white;
		}
		#msg{
			color: green;
		}
	</style>
</head>
<script src="../view/JS/change_admin_password.js"></script>
<body>

	<?php include('../Include/adminHeader.html'); ?>


	<h2>Change Password</h2>

	<fieldset>
		<legend>Give required information</legend>
			<form action="../controller/change-admin-password-action.php" name = "login" onsubmit="sendData(this); return false;" method="POST">
					<br>
					<label>Old password: </label>
					<input type="password" name="OldPassword" >

					<p id = "errorPassr" class="e1"></p>

					<label>New password: </label>
					<input type="password" name="password">
					
					<p id = "errorNew" class="e1"></p>

					<label>Confirm password: </label>
					<input type="password" name="conPassword">
					
					<p id = "errorCon" class="e1"></p>

					<input id = "sub2" type="reset" name="reset" value="Reset" >
					<input id = "sub1" type="submit" name="Login" value="Change Password">
			</form>
			<p id="msg"></p>
			<p><b>Don't have a account? Click <a href="registration.php">here</a> to register.</b></p>
			
	</fieldset>
	<br>

	<?php include('../Include/Footer.html'); ?>

</body>
</html>