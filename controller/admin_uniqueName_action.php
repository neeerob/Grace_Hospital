 <?php
// Array with names
$q = $_REQUEST["q"];

$hint = "";

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "g-hospital";



$connection = new mysqli($servername, $user, $pass, $dbname);

if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
else{

  $sql = "select * from admin_info where username = '".$q."'";
  $data = $connection->query($sql);
    if ($data->num_rows > 0) {
      echo '<b style = " red: green">Username alrady exist!</b>';
    }
    else{
      echo '<b style = " color: green">Unique username!</b>';
    }
}

?> 



