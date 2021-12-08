function isValid(login){
	const userName = login.userName.value;
	const password = login.password.value;

	if(userName === "" || password === ""){

		if(userName === ""){

			document.getElementById("errorMsgUser").innerHTML = "Please provide username!";
		}
		else{
			document.getElementById("errorMsgUser").innerHTML = "";
		}

		if(password === ""){

			document.getElementById("errorMsgPass").innerHTML = "Please provide Password!";
		}
		else{
			document.getElementById("errorMsgPass").innerHTML = "";
		}

		return false;
	}
	else{
		document.getElementById("errorMsgUser").innerHTML = "";
		document.getElementById("errorMsgPass").innerHTML = "";

		return true;
	}
}



