<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../view/CSS/loginAdmin.css">
</head>
<script src="../view/JS/login-admin-validation.js"></script>
<body>
	<?php include('../Include/loginHeader.html'); ?>

	<br>

	<fieldset>
		<legend> <b>Admin Login</b> </legend>
		<br>
			<form name = "login" onsubmit="return isValid(this);" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
					<br>
					<label>Username: </label>
					<input type="text" placeholder="Enter username" name="userName" value="<?php if(isset($_COOKIE["userName"])) { echo $_COOKIE["userName"]; } ?>" >

					<p id = "errorMsgUser" class="e1"></p>

					<label>Password: </label>
					<input type="password" placeholder="Enter Password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" >
					
					<p id = "errorMsgPass" class="e1"></p>

					<input type="checkbox" name="remember">
					<label for="remember">  Remember me</label><br>

					<br>
					<input id = "sub2" type="reset" name="reset" value="Reset" >
					<input id = "sub1" type="submit" name="Login" value="Login">
			</form>

			<?php 

				if($_SERVER['REQUEST_METHOD'] === "POST"){

				$userName = $_POST['userName'];
				$password = $_POST['password'];

				if(empty($userName) or empty($password)){
					echo "<br><b>Please fill up proper information.</b>";
				}
				else{
					$servername = "localhost";
						$user = "root";
						$pass = "";
						$dbname = "chat-app";

						$connection = new mysqli($servername, $user, $pass, $dbname);

						if ($connection->connect_error) {
							die("Connection failed: " . $connection->connect_error);
						}
						else{
							
							$sql = "select * from user where userName = '".$userName."' and password = '".$password."'";

							
							$loginFlag = false;

							$data = $connection->query($sql);

							if ($data->num_rows > 0) {
								while ($row = $data->fetch_assoc()) {

									/*$userName = $row["userName"];*/
									$loginFlag = true;
									if($loginFlag === true){

										if(!empty($_POST["remember"])){

											setcookie ("userName",$userName,time()+ 3600);
											setcookie ("password",$password,time()+ 3600);	

											session_start();
											$_SESSION['userName'] = $userName;
											
										}

										else{
										session_start();
										$_SESSION['userName'] = $userName;
										header("Location: home.php");

										}
									}

								}
							}
							else{
								echo '<br><b style = " color: red">Wrong username or password.</b>';
							}

							$connection->close();
						}
				}

			}

			?>

			<p><b>Don't have a account? Click <a href="registration.php">here</a> to register.</b></p>
		
	</fieldset>
	<br>


	<?php include('../Include/Footer.html'); ?>

</body>
</html>