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
</head>
<body>
	<?php include('../Include/adminHeader.html'); ?>

	<div class="c1">
		<br>
		 <b id="p1" style="font-size: 20px;">Wellcome, <?php echo $_SESSION['userName']; ?>. You have admin privilege. You can manipulate the following data/funcanilitys.</b><br><br>
		 
		
			<button class="button" type="button">Add a Admin</button>
			<br><br>
			<button class="button" type="button">Create Staff account</button>
			<br><br>
			<button class="button" type="button">Give discount to patient</button>
			<br>
			<br>
			<button class="button" type="button">Validate/Activite Doctor account</button>
			<br><br>
			<button class="button" type="button">Delete Staff account</button>
			<br><br>
			<button class="button" type="button">Delete Doctor account</button>
			<br>
			<br>
			<button class="button" type="button">Change staff work schedule</button>
			<br>
			<br>
		
	</div>
	<?php include('../Include/Footer.html'); ?>

</body>
</html>