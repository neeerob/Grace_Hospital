function isValid(login){
	const userName = login.userName.value;
	const password = login.password.value;

	if(userName === "" || password === ""){
		if(userName === ""){

			document.getElementById("errorMsgUser").innerHTML = "Please provide username!";
		}
		if(password === ""){

			document.getElementById("errorMsgPass").innerHTML = "Please provide Password!";
		}

		return false;
	}
	else{

		return true;
	}

}
