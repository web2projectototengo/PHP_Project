<?php
try {
  $conn = new PDO("mysql:host=localhost;dbname=registered_accounts", "root", "");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['Login'])) {
  $email = $_POST['email'];
  $password = $_POST['pass'];
$statement = $PDO->prepare("select * from reg_accs where email = '$email' and password='$password'");
$statement->execute();

$row = $statement->query(PDO::FETCH_ASSOC);

if ($row['email']==$email && $row['pass']==$password) {
  echo "Login success!!! welcome".$row['email'];

} else {
  echo "Failed to connect";
}
}

/*

if (isset($_POST['Login'])) {
$email = $_POST['email'];
$password = $_POST['pass'];


mysql_connect("localhost","root","");
mysql_select_db("registered_accounts");

//quesry database for user
$result = mysql_query("select * from reg_accs where email = '$email' and password='$password'")
            or die("failed to query database".mysql_error());

$row = mysql_fetch_array($result);
if ($row['email']==$email && $row['pass']==$password) {
  echo "Login success!!! welcome".$row['email'];

} else {
  echo "Failed to connect";
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
}
*/

 ?>
