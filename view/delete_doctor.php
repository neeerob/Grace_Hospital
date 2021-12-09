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
	<title>Delete doctor account</title>
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
<script src="../view/JS/delete_doctor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../view/CSS/loginAdmin.css">
<body>
	<?php include('../Include/adminHeader.html'); ?>
	<p>Welcome to <b>delete doctor account</b> page. You can delete doctor form from doctor list. You can <b>not</b> undo this action. </p>

		<legend> <b>Delete doctor account</b> </legend>
			<form action="../controller/delete_doctor_action.php" name = "login" onsubmit="sendData(this); return false;" method="POST">

			<div id="refresh-table">

				<?php 
					include '../controller/doctor_table_action.php';
				?>

			</div>

					<p id="msg1" ></p>

					<!-- <input id = "sub2" type="reset" name="reset" value="Refresh" > -->
					<input style="background-color: #f44336;" id = "sub1" onclick="myFun();" type="submit" name="giveDiscount" value="Delete">

			</form>

			<p id="msgOk" ></p>

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