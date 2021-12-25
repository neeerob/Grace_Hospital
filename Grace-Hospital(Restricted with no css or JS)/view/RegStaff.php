<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Staff Registration</title>
</head>
<body>

	<?php include('../Include/Header.html'); ?>
 	
	
	<p>1. <a href="../controller/Home.php">Home</a> 2.<a href="Login.php">Login</a> 3. <a href="Register.php">Register</a></p><hr>
	<b>Staff Registration:</b><br>
	<p>When you are employeed in this organization, a <b>Username</b> and <b>Password</b> is given to you as a login credential. You need to fill <b>login</b> credential for regester as a user. </p>

	<fieldset>
		<legend>Give login credential</legend>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
					<br>
					<label>Given user name: </label>
					<input type="text" name="userName">
					<br>
					<br>

					<label>Given password: </label>
					<input type="password" name="password">
					<br>

					<br>
					<input type="submit" name="regester" value="Register">
			</form>



	<?php 

		if($_SERVER['REQUEST_METHOD'] === "POST"){

				$userName = $_POST['userName'];
				$password = $_POST['password'];

				if(empty($userName) or empty($password)){
					echo "<br><b>Please fill up proper information.</b>";
				}
				else{
					if(file_exists("../model/staff_data.json")){
						$handle = fopen("../model/staff_data.json","r");
						$explode = fread($handle,filesize("../model/staff_data.json"));
						$explode = explode("\n", $explode);
						$loginFlag = false;
						$active = false;


						for($i = 0; $i<count($explode) - 1;$i++){
							$json = json_decode($explode[$i]);
							/*var_dump($explode[$i]);*/
							if($userName === $json->userName and $password === $json->password){
								/*var_dump($explode[$i]);*/
								$loginFlag = true;
								
							
							if($json->isActivated === true){
								$loginFlag = false;
								$active = true;
								/*var_dump($explode[$i]);*/
								break;
								}
								break;
							}
							
						}
						if($loginFlag === true){


							for($i = 0; $i<count($explode) - 1;$i++){
										$json = json_decode($explode[$i]);
										if($_POST['userName'] === $json->userName){
											/*echo "$explode[$i]";*/
											$json->isActivated = true;
											$handel = fopen("../model/staff_data.json","w");
											$encode = json_encode($json);
											$res1 = fwrite($handel, $encode . "\n");

											unset($explode[$i]);
											$explode1 = $explode;
											$handel = fopen("../model/staff_data.json","a");
											for($i = 0; $i<count($explode1);$i++){
												//$encode = json_encode($arrJson);
												$res2 = fwrite($handel, $explode1[$i] . "\n");
											}
											if($res1 and $res2)
											{
												echo "<br><b>Successfully Activated account!</b>";
											}
											break;
										}
							}
						}
						else{
							if($active === true)
							{
								echo "<br><b> Your account is alrady activated!</b><br>";
							}
							else{
								echo "<br><b> Wrong credential!</b><br>";
							}

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