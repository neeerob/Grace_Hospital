function sendData(formData){
	const old = login.OldPassword.value;
	const newPass = login.password.value;
	const conPassword = login.conPassword.value;


	if(old === "" || conPassword === "" || newPass === ""){

		if(old === ""){

			document.getElementById("errorPassr").innerHTML = "Please provide previous password!";
		}
		else{
			document.getElementById("errorPassr").innerHTML = "";
		}

		if(newPass === ""){

			document.getElementById("errorNew").innerHTML = "Please provide new password!";
		}
		else{
			document.getElementById("errorNew").innerHTML = "";
		}

		if(conPassword === ""){

			document.getElementById("errorCon").innerHTML = "Please provide confirm password!";
		}
		else{
			document.getElementById("errorCon").innerHTML = "";
		}
	}
	else{

		if(newPass === conPassword){
			if(login.password.value.length >= 8){
				document.getElementById("errorPassr").innerHTML = "";
			document.getElementById("errorNew").innerHTML = "";
			document.getElementById("errorCon").innerHTML = "";

			const xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState === 4 && this.status === 200) {
						document.getElementById("msg").innerHTML = this.responseText;
					}
				}
				xhttp.open(formData.method, formData.action);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				const myData = {
					"old" : login.OldPassword.value,
					"pass" : login.password.value,
					"conpass" : login.conPassword.value
				}
				xhttp.send("obj="+JSON.stringify(myData));
			}
			else{
				document.getElementById("errorCon").innerHTML = "Password must be at least 8 cherecter long!";
			}
		}
		else{
			document.getElementById("errorCon").innerHTML = "Confirm password and new password must be same!";
		}

	}

}



