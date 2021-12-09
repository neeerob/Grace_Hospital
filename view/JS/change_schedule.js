function sendData(formData){
	const user = formData.remember.value;
	const newTime = formData.discount_patient.value;

	if(formData.remember.value === ""){
		document.getElementById("msg1").innerHTML = "Please select a staff!";
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
				"username" : formData.remember.value,
				"newTime" : formData.discount_patient.value,

			}
			xhttp.send("obj="+JSON.stringify(myData));
			/*window.location.reload();*/
	}

}

