function showHint(str) {
  if (str.length == 0) {
    document.getElementById("errorMsgUser").innerHTML = "";
    return;
  } else {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("errorMsgUser").innerHTML = this.responseText;
    }
  xmlhttp.open("GET", "../controller/staff_uniqueName_action.php?q=" + str);
  xmlhttp.send();
  }
}