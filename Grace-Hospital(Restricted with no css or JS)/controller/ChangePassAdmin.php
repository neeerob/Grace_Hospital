<?php 

	session_start();

	if(count($_SESSION) === 0){

		header("Location: Logout.php");
		header("Location: ../view/AdminLogin.php");
	}
	if($_SESSION['userName'] === ""){

		header("Location: Logout.php");
		header("Location: ../view/AdminLogin.php");
	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Password</title>
</head>
<body>

	<?php include('../Include/Header.html'); ?>

	<!-- <?php 
		$firstname;
		$lastname;
		$password;
		if(file_exists("../model/admin_data.json")){
			$handle = fopen("../model/admin_data.json","r");
			$explode = fread($handle,filesize("../model/admin_data.json"));
			$explode = explode("\n", $explode);
			$loginFlag = false;

			for($i = 0; $i<count($explode) - 1;$i++){
				$json = json_decode($explode[$i]);
				if($json->userName === $_SESSION['userName']){
						$firstname = $json->firstname ;
						$lastname = $json->lastname ;
						$password = $json->password ;
						break;

				}
			}
		}
	?> -->

	<p>Welcome, <?php echo "$firstname $lastname. " ?>Your username: <b> <?php echo $_SESSION['userName']; ?> </b></p>
	<p>    <a href="Home.php">Home</a>   |  <a href="../view/admin_profile.php">Profile</a>  |  <a href="Logout.php">Logout</a>  |  <a href="ChangePassAdmin.php">Change password</a></p><hr>

	<h2>Change Password</h2>

	<fieldset>
		<legend>Give login credential</legend>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
					<br>
					<label>Old password: </label>
					<input type="password" name="OldPassword" >
					<br>
					<br>

					<label>New password: </label>
					<input type="password" name="password">
					<br><br>

					<label>Confirm password: </label>
					<input type="password" name="conPassword">
					<br><br>

					<input type="submit" name="Login" value="Change Password">
			</form>
			<br>
			<?php 

				if($_SERVER['REQUEST_METHOD'] === "POST"){

					$userName = $_SESSION['userName'];
					$password = $_POST['password'];
					$conPassword = $_POST['conPassword'];
					$oldPassword = $_POST['OldPassword'];


					if(empty($conPassword) or empty($password) or empty($oldPassword)){
						echo "<br><b>Please fill up proper information.</b>";
					}
					else{

						if(strlen($password) < 8 ) {
					    echo "<br>Password must be at least <b>8 characters</b> in length.</br>";
						}

						else if($conPassword !== $password) {
					    echo "<br><b>New password and confirm password doesn't match.</b></br>";
						}

						else{
							if(file_exists("../model/admin_data.json")){

								$handle = fopen("../model/admin_data.json","r");
								$explode = fread($handle,filesize("../model/admin_data.json"));
								$explode = explode("\n", $explode);
								$loginFlag = false;

								for($i = 0; $i<count($explode) - 1;$i++){
									$json = json_decode($explode[$i]);
									if($userName === $json->userName and $oldPassword === $json->password){
										$loginFlag = true;
										break;
									}
								}
								if($loginFlag === true){
									for($i = 0; $i<count($explode) - 1;$i++){
										if($_SESSION['userName'] === $json->userName){
											$json = json_decode($explode[$i]);
											$json->password = "$password";
											$handel = fopen("../model/admin_data.json","w");
											$encode = json_encode($json);
											$res1 = fwrite($handel, $encode . "\n");

											unset($explode[$i]);
											$explode1 = $explode;
											$handel = fopen("../model/admin_data.json","a");
											for($i = 0; $i<count($explode1);$i++){
												//$encode = json_encode($arrJson);
												$res2 = fwrite($handel, $explode1[$i] . "\n");
											}
											if($res1 and $res2)
											{
												echo "<br><b>Successfully changed password!</b>";
											}
											break;
										}
									}
								}
								else{
									echo "<br><b>You entered wrong password,Enter current password in old password field!</b><br>";

								}
							}

							else{
								echo "json file not found!";
							}
						}
					}
				}

			?>
	</fieldset>

	<?php include('../Include/Footer.html'); ?>

</body>
</html>