
<?php 
	session_start();

	if(count($_SESSION) != 0){

		header("Location: admin_profile.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
</head>
<body>
	<?php include('../Include/Header.html'); ?>

	<p>1. <a href="../controller/Home.php">Home</a> 2.<a href="Login.php">Login</a> 3. <a href="Register.php">Register</a></p><hr>
	<h2>Admin Login:</h2>

	<fieldset>
		<legend>Give login credential</legend>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
					<br>
					<label>Admin username: </label>
					<input type="text" name="userName" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" >
					<br>
					<br>

					<label>Admin password: </label>
					<input type="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" >
					<br><br>

					<input type="checkbox" name="remember">
					<label for="remember">  Remember me</label><br>

					<br>
					<input type="submit" name="Login" value="Login">
			</form>

			<p>Forget password? Send a email <a href = "mailto:abc@example.com?subject = Feedback&body = Message">here</a> with username to reset password.</p>
	

		<?php 

			if($_SERVER['REQUEST_METHOD'] === "POST"){

				echo "$cookie_password" ;
				echo "$cookie_userName";
				$userName = $_POST['userName'];
				$password = $_POST['password'];

				if(empty($userName) or empty($password)){
					echo "<br><b>Please fill up proper information.</b>";
				}
				else{
					if(file_exists("../model/admin_data.json")){
						$handle = fopen("../model/admin_data.json","r");
						$explode = fread($handle,filesize("../model/admin_data.json"));
						$explode = explode("\n", $explode);
						$loginFlag = false;

						for($i = 0; $i<count($explode) - 1;$i++){
							$json = json_decode($explode[$i]);
							if($userName === $json->userName and $password === $json->password){
								$loginFlag = true;
								break;
							}
						}
						if($loginFlag === true){

							if(!empty($_POST["remember"]))
							{
								//setcookie($userName)
								setcookie ("username",$userName,time()+ 3600);
								setcookie ("password",$password,time()+ 3600);	
							}

							session_start();
							$_SESSION['userName'] = $userName;
							/*header("Location: WelcomePage.php");*/
							header("Location: admin_profile.php");
						}
						else{
							echo "<br><b>Login failed!</b><br>";

						}
					}

					else{
						echo "json file not found!";
					}
				}

			}

		?>
	</fieldset>


	<?php include('../Include/Footer.html'); ?>

</body>
</html>