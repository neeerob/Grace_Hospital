
function sendData(formData){
	const percent = login.discount_patient.value;
	const user = formData.remember.value;
	if(formData.remember.value === ""){
		document.getElementById("msg1").innerHTML = "Please select a user!";
	}
	else{
		document.getElementById("msg1").innerHTML = "";

		const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("msgOk").innerHTML = this.responseText;
					$('#refresh-table').load(location.href + " #refresh-table");
				}
			}
			xhttp.open(formData.method, formData.action);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			const myData = {
				"percent" : formData.discount_patient.value,
				"username" : formData.remember.value,
			}
			xhttp.send("obj="+JSON.stringify(myData));
			/*window.location.reload();*/
	}

}

