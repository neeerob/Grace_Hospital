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
	<title>Discount</title>
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
						break;

				}
			}
		}
	?>

	<p>Welcome, <?php echo "$firstname $lastname. " ?>Your username: <b> <?php echo $_SESSION['userName']; ?> </b></p>
	<p>    <a href="Home.php">Home</a>   |  <a href="../view/admin_profile.php">Profile</a>  |  <a href="Logout.php">Logout</a>  |  <a href="ChangePassAdmin.php">Change password</a></p><hr>


	<h2>Give Discount to patient:</h2>
	<fieldset>
		<legend>Select patient and discount percentage</legend>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
				<br>
				<label>Give discount to:</label>

				<select name="sendTo">
					<option value="Select a value">Select Someone</option>

					<?php
						
						if(file_exists("../model/patient_data.json")){
						$handle = fopen("../model/patient_data.json","r");
						$explode = fread($handle,filesize("../model/patient_data.json"));
						$explode = explode("\n", $explode);
						for($i = 0; $i<count($explode) - 1;$i++){
								$json = json_decode($explode[$i]);{
									if(!empty($json->userName)){
										echo "<option value= '";
										echo "$json->userName";
										echo "'>";
										echo "$json->userName";
										echo "</option>";
									}
								}
							
							}
						}
					?>

				</select>

				<br><br>

				<label>Discount percentage:</label>

				<select name="percent" id="percent">

				  <option value= 0.05 >5%</option>
				  <option value= 0.10 >10%</option>
				  <option value= 0.15 >15%</option>
				  <option value= 0.20 >20%</option>
				  <option value= 0.25 >25%</option>
				</select>

				<br><br>

				<input type="submit" name="submit" value="Give Discount">
			</form>
			<?php 

				$userName = $_POST['sendTo'];
				if($_SERVER['REQUEST_METHOD'] === "POST"){

					$discount = $_POST['percent'];
					if($_POST['sendTo'] === "Select a value"){
						echo "<br><b>Please choose a username!</b>";
					}
					else{
						if(file_exists("../model/patient_data.json")){

								$handle = fopen("../model/patient_data.json","r");
								$explode = fread($handle,filesize("../model/patient_data.json"));
								$explode = explode("\n", $explode);
								$loginFlag = false;

								for($i = 0; $i<count($explode) - 1;$i++){
									$json = json_decode($explode[$i]);
									if($userName === $json->userName){
										$loginFlag = true;
										break;
									}
								}
								if($loginFlag === true){
									for($i = 0; $i<count($explode) - 1;$i++){
										$json = json_decode($explode[$i]);
										if($userName === $json->userName){
											/*echo "$userName";
											echo $json->userName;*/
											$json->totalAmmount = $json->totalAmmount - ($json->totalAmmount * $_POST['percent']);
											$handel = fopen("../model/patient_data.json","w");
											$encode = json_encode($json);
											$res1 = fwrite($handel, $encode . "\n");

											unset($explode[$i]);
											$explode1 = $explode;
											$handel = fopen("../model/patient_data.json","a");
											for($i = 0; $i<count($explode1);$i++){
												//$encode = json_encode($arrJson);
												$res2 = fwrite($handel, $explode1[$i] . "\n");
											}
											if($res1 and $res2)
											{
												$discount1 = $_POST['discount']*100;
												echo "<br><b>Successfully given $discount1 % discount!</b>";
											}
											break;
										}
									}
								}
								else{
									echo "<br><b>User not found!</b><br>";

								}
							}

							else{
								echo "json file not found!";
							}
					}

				}

			?>
	</fieldset>
	<br>
	<fieldset>
		<legend>Patient basic Information</legend>
		<?php 
		if(file_exists("../model/patient_data.json")){
				$handle = fopen("../model/patient_data.json","r");
				$explode = fread($handle,filesize("../model/patient_data.json"));
				$explode = explode("\n", $explode);

				echo "<table border='1'>";
				echo "<tr>";
				echo "<th>";
				echo "Patient Name";
				echo "</th>";
				echo "<th>";
				echo "Phone number";
				echo "</th>";
				echo "<th>";
				echo "User Name";
				echo "</th>";
				echo "<th>";
				echo "Total ammount";
				echo "</th>";
				
				for($i = 0; $i<count($explode) - 1;$i++){
						$json = json_decode($explode[$i]);
					//$name === $json->name; 
					//$phone === $json->phone;

					if(!empty($json->firstname)){
						echo "</tr>";
						echo "<tr>";
						echo "<td>";
						echo "$json->firstname $json->lastname";
						echo "</td>";
						echo "<td>";
						echo "$json->Phone";
						echo "</td>";
						echo "<td>";
						echo "$json->userName";
						echo "</td>";
						echo "<td>";
						echo "$json->totalAmmount";
						echo "</td>";
						echo "</tr>"; 
					}
				}
				echo "</table>";
			}
					

			else{
				echo "json file not found!";
			}

	?>
	</fieldset>

	<?php include('../Include/Footer.html'); ?>

</body>
</html>