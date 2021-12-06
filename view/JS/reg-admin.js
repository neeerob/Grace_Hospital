function sendData(formData){
	if(formData.firstname.value === "" || formData.lastname.value === ""||formData.userName.value === ""||formData.password.value === "" ||formData.password.value.length < 8){
		if(formData.firstname.value === ""){
		document.getElementById("errorMsgName").innerHTML = "Please fill first name!";
		}
		else{
			document.getElementById("errorMsgName").innerHTML = "";
		}

		if(formData.lastname.value === ""){
			document.getElementById("errorMsgLast").innerHTML = "Please fill last name!";
		}
		else{
			document.getElementById("errorMsgLast").innerHTML = "";
		}

		if(formData.userName.value === ""){
			document.getElementById("errorMsgUser").innerHTML = "Please fill username!";
		}
		else{
			document.getElementById("errorMsgUser").innerHTML = "";
		}

		if(formData.password.value === "" || formData.password.value.length < 8){
			if(formData.password.value === ""){
			document.getElementById("errorMsgPass").innerHTML = "Please fill password!";
			}
			else{
				document.getElementById("errorMsgPass").innerHTML = "Password must be at least 8 cherecter long!";
			}
		}
		else{
			document.getElementById("errorMsgPass").innerHTML = "";
		}
	}
	else{
		document.getElementById("errorMsgName").innerHTML = "";
		document.getElementById("errorMsgLast").innerHTML = "";
		document.getElementById("errorMsgUser").innerHTML = "";
		document.getElementById("errorMsgPass").innerHTML = "";



		const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("msg").innerHTML = this.responseText;
				}
			}
			xhttp.open(formData.method, formData.action);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			const myData = {
				"firstname" : formData.firstname.value,
				"lastname" : formData.lastname.value,
				"username" : formData.userName.value,
				"password" : formData.password.value

			}
			xhttp.send("obj="+JSON.stringify(myData));
	}

}