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
	<title>Admin profile</title>
	<link rel="stylesheet" type="text/css" href="../view/CSS/profile_admin.css">
	<style>
		.header a.home {
		  background-color: dodgerblue;
		  color: white;
		}
	</style>
</head>
<body>
	<?php include('../Include/adminHeader.html'); ?>

	<div class="c1">
		<br>
		 <b id="p1" style="font-size: 20px;">Wellcome, <?php echo $_SESSION['userName']; ?>. You have admin privilege. You can manipulate the following data/functionality.</b><br><br><br>
		 
		
			<a href="../view/reg_admin.php" class="button">Add a Admin</a>
			<br><br>
			<a href="../view/reg_staff.php" class="button">Create Staff account</a>
			<br><br>
			<a href="../view/discount_patient.php" class="button">Give discount to patient</a>
			<br>
			<br>
			<a href="../view/activated_doctor.php" class="button">Validate/Activite Doctor account</a>
			<br><br>
			<a href="../view/delete_staff.php" class="button">Delete Staff account</a>
			<br><br>
			<a href="../view/delete_doctor.php" class="button">Delete Doctor account</a>
			<br>
			<br>
			<a href="https://google.com" class="button">Change staff work schedule</a>
			<br>
			<br>
		
	</div>
	<?php include('../Include/Footer.html'); ?>

</body>
</html>