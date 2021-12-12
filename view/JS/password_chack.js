function showPass(str) {
  if (str.length == 0) {
    document.getElementById("errorMsgPass").innerHTML = "";
    return;
  } else {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("errorMsgPass").innerHTML = this.responseText;
    }
  xmlhttp.open("GET", "../controller/password_chack_action.php?q=" + str);
  xmlhttp.send();
  }
}

function showPassA1(str) {
  if (str.length == 0) {
    document.getElementById("errorNew").innerHTML = "";
    return;
  } else {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("errorNew").innerHTML = this.responseText;
    }
  xmlhttp.open("GET", "../controller/password_chack_action.php?q=" + str);
  xmlhttp.send();
  }
}


function showPassA2(str) {
  if (str.length == 0) {
    document.getElementById("errorCon").innerHTML = "";
    return;
  } else {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("errorCon").innerHTML = this.responseText;
    }
  xmlhttp.open("GET", "../controller/password_chack_action.php?q=" + str);
  xmlhttp.send();
  }
}