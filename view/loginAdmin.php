<?php 
	session_start();

	if(count($_SESSION) != 0){

		header("Location: profile_admin.php");
	}

?>



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
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" name = "login" onsubmit="return isValid(this);" method="POST">
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

			<div id="txtHint"><b></b></div>

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
						$dbname = "g-hospital";

						$connection = new mysqli($servername, $user, $pass, $dbname);

						if ($connection->connect_error) {
							die("Connection failed: " . $connection->connect_error);
						}
						else{
							
							$sql = "select * from admin_info where username = '".$userName."' and password = '".$password."'";

							
							$loginFlag = false;

							$data = $connection->query($sql);

							if ($data->num_rows > 0) {
								while ($row = $data->fetch_assoc()) {
									$loginFlag = true;
									if($loginFlag === true && $row["email"] === null){

										if(!empty($_POST["remember"])){

											setcookie ("userName",$userName,time()+ 3600);
											setcookie ("password",$password,time()+ 3600);	

											session_start();
											$_SESSION['userName'] = $userName;
											header("Location: ../view/myProfile.php");
											
										}

										else{
										session_start();
										$_SESSION['userName'] = $userName;
										header("Location: ../view/myProfile.php");

										}
									}
									else{
										if(!empty($_POST["remember"])){

											setcookie ("userName",$userName,time()+ 3600);
											setcookie ("password",$password,time()+ 3600);	

											session_start();
											$_SESSION['userName'] = $userName;
											header("Location: ../view/profile_admin.php");
											
										}

										else{
										session_start();
										$_SESSION['userName'] = $userName;
										header("Location: ../view/profile_admin.php");

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
		<br><br>
		<b>Forget password? Send a email <a href = "mailto:abc@example.com?subject = Feedback&body = Message">here</a> with username to reset password.</b><br>
		
	</fieldset>
	<br>


	<?php include('../Include/Footer.html'); ?>

</body>
</html>