<?php 

	session_start();

	if(count($_SESSION) == 0){

		header("Location: ../view/loginAdmin.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add admin</title>
	<link rel="stylesheet" type="text/css" href="../view/CSS/loginAdmin.css">
	<style>
		#msg{
			color: green;
		}
	</style>
</head>
<script src="../view/JS/reg-admin.js"></script>
<script src="../view/JS/admin_UniqueName.js"></script>
<script src="../view/JS/password_chack.js"></script>
<body>
	<?php include('../Include/adminHeader.html'); ?>
	<p>Welcome to <b>Admin account</b> create page. You can only give basic credential and <b>login</b> information. He/She can provide basic information directly from his/her profile change these information later. </p>
	<fieldset>
		<legend> <b>Admin register</b> </legend>
		<br>
			<form action="../controller/admin-reg-action.php" name = "login" onsubmit="sendData(this); return false;" method="POST">
					<br>
					<label>First Name:</label>
					<input type="text" name="firstname" placeholder="Enter firstname">

					<p id = "errorMsgName" class="e1"></p>

					<label>Last Name:</label> 
					<input type="text" name="lastname" placeholder="Enter lastname">

					<p id = "errorMsgLast" class="e1"></p>

					<label>Username: </label>
					<input type="text" placeholder="Enter a unique username" name="userName" onkeyup="showHint(this.value)" >

					<p id = "errorMsgUser" class="e1"></p>

					<label>Password: </label>
					<input type="password" placeholder="Enter Password" name="password" onkeyup="showPass(this.value)">
					
					<p id = "errorMsgPass" class="e1"></p>

					<input id = "sub2" type="reset" name="reset" value="Reset" >
					<input id = "sub1" type="submit" name="Register" value="Register">
			</form>
			<p id="msg"></p>
		</fieldset>
		<br>

	<?php include('../Include/Footer.html'); ?>

</body>
</html>