<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register Patient</title>
</head>
<body>
	<?php include('../Include/Header.html'); ?>
	<hr>
	<h1>Register Patient</h1>
	<fieldset>


		<legend>Patient Registration</legend>
		<form action="StaffLogin.php" method="GET" >
			


			<label>First Name:</label>
			<input type="text" name="firstname" placeholder="First Name" >
			<br><br>

			<label>Last Name:</label> 
			<input type="text" name="lastname"placeholder="Last Name">
			<br><br>

			
	        <label>Choose your Gender :</label> 
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

			<label>Phone: </label>
			<input type="tel"  name="phone">
			<br><br>

			<label>Email:</label>
			<input type="email" name="email">
			<br><br>
			<label>Reference Doctor</label>
			<input type="text" name="Doctor Name" placeholder="Example: DR.Mushfiqur">
			<br><br>
			<label>Patient Depertment</label>
			<select>

			    <option value="Cardiyology">Cardiyology</option>
				<option value="Diabetic">Diabetic</option>
				<option value="Genral">Genral</option>
				<option value="Delivery">Delivery</option>
				<option value="ICU">ICU</option>
			</select>
			<br><br>

			<input type="submit" name="submit" value="Submit">

		</form>

	</fieldset>
	<?php include('../Include/Footer.html'); ?>
</body>
</html>