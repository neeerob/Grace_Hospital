<?php 

	session_start();

	if(count($_SESSION) == 0){

		header("Location: ../view/loginAdmin.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change work schedule</title>
	<link rel="stylesheet" type="text/css" href="../view/CSS/table.css">
	<style>
		#msg1{
			color: red;
			font-size: 18px;
		}

		#msgOk{
			color: green;
			font-size: 18px;
		}
	</style>
</head>
<script src="../view/JS/change_schedule.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../view/CSS/loginAdmin.css">
<body>
	<?php include('../Include/adminHeader.html'); ?>
	<p>Welcome to <b>change staff work schedule</b> page. You can change staff work schedule from staff list. </p>

		<legend> <b>Change work schedule</b> </legend>
			<form action="../controller/change_schedule_action.php" name = "login" onsubmit="sendData(this); return false;" method="POST">

			<div id="refresh-table">

				<?php 
					include '../controller/staff_table_action.php';
				?>

			</div>

					 <label>Select discount percentage</label>
					<select name="discount_patient">
						<option value="10:00 AM - 8:00 PM">10:00 AM - 8:00 PM</option>
						<option value="8:00 AM - 6:00 PM">8:00 AM - 6:00 PM</option>
						<option value="8:00 PM - 2:00 AM">8:00 PM - 2:00 AM</option>
						<option value="11:00 PM - 6:00 AM">11:00 PM - 6:00 AM</option>
						<option value="6:00 PM - 1:00 AM">6:00 PM - 1:00 AM</option>
					</select> 

					<p id="msg1" ></p>
					<!-- <p id="msg2" ></p> -->

					<!-- <input id = "sub2" type="reset" name="reset" value="Refresh" > -->
					<input id = "sub1" onclick="myFun();" type="submit" name="giveDiscount" value="Change schedule">

			</form>

			<p id="msgOk"></p>
			<script>
				$('#tableSelect tr').click(function() {
				    $(this).find('th input:radio').prop('checked', true);
				})
								
				function myFun(){
					$('#refresh-table').load(location.href + " #refresh-table");
				}
			</script>

<br>
	

	<?php include('../Include/Footer.html'); ?>

</body>
</html>