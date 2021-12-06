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
	<title>Add admin</title>
	<link rel="stylesheet" type="text/css" href="../view/CSS/loginAdmin.css">
</head>
<body>
	<?php include('../Include/adminHeader.html'); ?>
	<p>Welcome to <b>Admin profile</b> create page. You can only give basic credential and <b>login</b> information. He/She can provide basic information directly from his/her profile change these information later. </p>
	<fieldset>
		<legend> <b>Admin register</b> </legend>
		<br>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" name = "login" onsubmit="return isValid(this);" method="POST">
					<br>
					<label>First Name:</label>
					<input type="text" name="firstname" placeholder="Enter firstname">
					<br><br>

					<label>Last Name:</label> 
					<input type="text" name="lastname" placeholder="Enter lastname">
					<br><br>
					<label>Username: </label>
					<input type="text" placeholder="Enter username" name="userName" >

					<p id = "errorMsgUser" class="e1"></p>

					<label>Password: </label>
					<input type="password" placeholder="Enter Password" name="password" >
					
					<p id = "errorMsgPass" class="e1"></p>

					<br>
					<input id = "sub2" type="reset" name="reset" value="Reset" >
					<input id = "sub1" type="submit" name="Register" value="Register">
			</form>
		</fieldset>
		<br>

	<?php include('../Include/Footer.html'); ?>

</body>
</html>