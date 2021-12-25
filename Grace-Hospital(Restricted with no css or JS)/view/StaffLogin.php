<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Staff Login</title>
</head>
<body>
	<?php include('../Include/Header.html'); ?>
	
	<p>1. <a href="../controller/Home.php">Home</a> 2.<a href="Login.php">Login</a> 3. <a href="Register.php">Register</a></p><hr>

	<hr>
	
     <h1>Staff Log In </h1>
     <fieldset>
		<legend>Log In</legend>
		<br>
		<form action="StaffProfile.php" method="GET" >
			<label>User Name:</label>
			<input type="text" name="UserName" >
			<br><br>

			<label>Password:</label> 
			<input type="text" name="Password" >
			<br><br>

			<input type="submit" name="submit" value="Submit">
			<br>
			
		</form>

	</fieldset>

	<br><br>
	<?php include('../Include/Footer.html'); ?>

</body>
</html>