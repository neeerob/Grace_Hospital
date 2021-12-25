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
	<title>Create Staff account</title>
</head>
<body>

	<?php include('../Include/Header.html'); ?>

	<?php 
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
	?>

	<p>Welcome, <?php echo "$firstname $lastname. " ?>Your username: <b> <?php echo $_SESSION['userName']; ?> </b></p>
	<p>    <a href="Home.php">Home</a>   |  <a href="../view/admin_profile.php">Profile</a>  |  <a href="Logout.php">Logout</a>  |  <a href="ChangePassAdmin.php">Change password</a></p><hr>
	<b>Create Staff Profile</b><br>

	<p>Welcome to <b>Staff profile</b> create page. You can only give basic credential and <b>login</b> information. He/She can provide basic information directly from his/her profile change these information later. </p>



	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
		<fieldset>
			
				<br>
				<legend>Login credential: </legend>

				<label>First Name:</label>
				<input type="text" name="firstname">
				<br><br>

				<label>Last Name:</label> 
				<input type="text" name="lastname">
				<br><br>

				<label>User Name: </label>
				<input type="text" name="userName">
				<br><br>

				<label>Password: </label>
				<input type="password" name="password">
				<br><br>

				<input type="submit" name="submit" value="Submit">
				<br>
			

	</form>	

		<?php 

			if($_SERVER['REQUEST_METHOD'] === "POST"){

				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$userName = $_POST['userName'];
				$password = $_POST['password'];
				/*$number = preg_match('@[0-9]@',$password);
				$uppercase = preg_match('@[A-Z]@',$password);
				$lowercase = preg_match('@[a-z]@',$password);
				$specialChars = preg_match('@[^\w]@',$password);*/
				  

				if(empty($userName) or empty($password) or empty($lastname) or empty($firstname)){
					echo "<br><b>Please fill up proper information.</b>";
				}
				else{

					if(strlen($password) < 8 ) {
				    echo "<br>Password must be at least <b>8 characters</b> in length.</br>";
					}

					else{
						if(file_exists("../model/staff_data.json")){
							$handle = fopen("../model/staff_data.json","r");
							$explode = fread($handle,filesize("../model/staff_data.json"));
							$explode = explode("\n", $explode);
							$userExist = false;

							for($i = 0; $i<count($explode) - 1;$i++){
								$json = json_decode($explode[$i]);
								if($userName === $json->userName){
									echo "<br><b>Username alrady exist! Please choose another username for staff!</b>";
									$userExist = true;
									break;
								}
							}
							if($userExist === false){
		
								$handle = fopen("../model/staff_data.json","a");
								$arr1 = array('firstname' => $firstname,'lastname' => $lastname,'gender' => null,'DOB' => null,'religion' => null,'present_Address' => null,'permanent_Address' => null,'Phone' => null,'email' => null,'userName' => $userName,'password' => $password, 'isActivated' => false);
								
								$encode = json_encode($arr1);
	
								$res = fwrite($handle, $encode."\n");
	
								if($res){
									echo "<br>Successfully created <b> $userName</b> account.";
								}
								else{
									echo "<br>Failed to create <b> $userName</b> account.";
								}
								
							}		
						}

						else{
						
							$handle = fopen("../model/staff_data.json","a");
							$arr1 = array('firstname' => $firstname,'lastname' => $lastname,'gender' => null,'DOB' => null,'religion' => null,'present_Address' => null,'permanent_Address' => null,'Phone' => null,'email' => null,'userName' => $userName,'password' => $password, 'isActivated' => false);
								
							$encode = json_encode($arr1);
	
							$res = fwrite($handle, $encode."\n");
	
							if($res){
								echo "<br>Successfully created <b> $userName</b> account.";
							}
							else{
								echo "<br>Failed to create <b> $userName</b> account.";
							}

						}
					}
				}
			}

		?>

		</fieldset>


	<?php include('../Include/Footer.html'); ?>
</body>
</html>