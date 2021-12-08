function sendData(formData){
	if(formData.firstname.value === "" || formData.lastname.value === "" || formData.gender.value === ""|| formData.birthday.value === ""|| formData.religion.value === ""|| formData.permanent_Address.value === ""|| formData.present_Address.value === ""|| formData.phone.value === ""|| formData.email.value === ""){

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


		if(formData.gender.value === ""){
			document.getElementById("errorMsgGender").innerHTML = "Please select a gender!";
		}
		else{
			document.getElementById("errorMsgGender").innerHTML = "";
		}


		if(formData.birthday.value === ""){
			document.getElementById("errorMsgDOB").innerHTML = "Please fill birth date!";
		}
		else{
			document.getElementById("errorMsgDOB").innerHTML = "";
		}


		if(formData.religion.value === ""){
			document.getElementById("errorMsgRele").innerHTML = "Please select a religion!";
		}
		else{
			document.getElementById("errorMsgRele").innerHTML = "";
		}


		if(formData.permanent_Address.value === ""){
			document.getElementById("errorMsgParnaAdd").innerHTML = "Please fill present address!";
		}
		else{
			document.getElementById("errorMsgParnaAdd").innerHTML = "";
		}


		if(formData.present_Address.value === ""){
			document.getElementById("errorMsgPresentAdd").innerHTML = "Please fill permanent address!";
		}
		else{
			document.getElementById("errorMsgPresentAdd").innerHTML = "";
		}


		if(formData.phone.value === ""){
			document.getElementById("errorMsgphone").innerHTML = "Please fill phone number!";
		}
		else{
			document.getElementById("errorMsgphone").innerHTML = "";
		}


		if(formData.email.value === ""){
			document.getElementById("errorMsgEmail").innerHTML = "Please fill email!";
		}
		else{
			document.getElementById("errorMsgEmail").innerHTML = "";
		}


		
	}
	else{
		document.getElementById("errorMsgName").innerHTML = "";
		document.getElementById("errorMsgLast").innerHTML = "";
		document.getElementById("errorMsgGender").innerHTML = "";
		document.getElementById("errorMsgDOB").innerHTML = "";
		document.getElementById("errorMsgRele").innerHTML = "";
		document.getElementById("errorMsgPresentAdd").innerHTML = "";
		document.getElementById("errorMsgParnaAdd").innerHTML = "";
		document.getElementById("errorMsgphone").innerHTML = "";
		document.getElementById("errorMsgEmail").innerHTML = "";
		document.getElementById("errorMsgUser").innerHTML = "";

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
				"gender" : formData.gender.value,
				"DOB" : formData.birthday.value,
				"religion" : formData.religion.value,
				"permanent_Address" : formData.permanent_Address.value,
				"present_Address" : formData.present_Address.value,
				"phone" : formData.phone.value,
				"email" : formData.email.value,
				"userName" : formData.userName.value

			}
			xhttp.send("obj="+JSON.stringify(myData));
	}

}