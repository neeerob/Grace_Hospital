<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>

	
</head>
<body>
	<?php include('../Include/Header.html'); ?>
	<hr>

	<p>1. <a href="Home.php">Home</a> 2. <a href="StaffProfile.php">Profile</a> 3.<a href="Logout.php">Logout</a> 4.<a href="Home.php">Change password</a>
	<h1>Your Profile (Staff)</h1>

	<fieldset>
		<legend>You can edit your profile</legend>
		<br>
	
		
			<br>
			<label>First Name:</label>
			<input type="text" name="firstname" value="First Name">
			<br><br>

			<label>Last Name:</label> 
			<input type="text" name="lastname" value="Last Name">
			<br><br>

			
	        Choose your Gender : 
            <input type="radio" name="gender" value="male" >Male
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="other">Other
			<br><br>

			<label>DoB:</label>
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
			<input type ="text" name="present_Address" >
			
			<br><br>

			<label>Permanent Address: </label>
			<input type ="text" name="permanent_Address" >
			<br><br>

			<label>Phone: </label>
			<input type="tel"  name="phone">
			<br><br>

			<label>Email:</label>
			<input type="email" name="email">
			<br><br>
			<input type="Submit" name="Change Information" value="Change Information">
			<br><br>
			<input type="submit" name="submit" value="Submit">

		</form>

	</fieldset>

	<br><br><br><br><br>
	<?php include('../Include/Footer.html'); ?>
</body>
</html>