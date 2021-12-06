<?php 

	session_start();

	if(count($_SESSION) === 0){

		header("Location: Logout.php");
		header("Location: AdminLogin.php");
	}
	if($_SESSION['userName'] === ""){
		
		header("Location: Logout.php");
		header("Location: AdminLogin.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Profile</title>
		<style>
		.header a.profile {
		  background-color: dodgerblue;
		  color: white;
		}
	</style>
</head>
<body>
	<?php include('../Include/adminHeader.html'); ?>

</body>
</html>