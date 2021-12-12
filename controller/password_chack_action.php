 <?php
$q = $_REQUEST["q"];

$hint = "";
if(strlen($q) >= 8){
  $hint = '<b style = " color: green">Strong password!</b>';
    if(strlen($q) >= 12){
    $hint = '<b style = " color: green">Very strong password!</b>';
  }
}
else{
  $hint = '<b style = " red: green">Weak password!</b>';
}
echo "$hint";
?> 



