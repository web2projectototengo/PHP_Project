<?php


try {
  $conn = new PDO("mysql:host=localhost;dbname=registered_accounts", "root", "");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
if (isset($_POST['Register'])) {

$saxeli=$_POST['saxeli'];
$gvari=$_POST['gvari'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$nomeri=$_POST['nomeri'];
$misamarti=$_POST['misamarti'];
$posta=$_POST['posta'];

//echo ("$saxeli\n.$gvari\n.$password\n.$gender\n.$email\n.$misamarti\n.$posta\n");


$statement =$conn->prepare("INSERT INTO reg_accs (first_name,last_name,password,gender,email,phone,address,postal_code)
        VALUES (:saxeli, :gvari,:password,:gender,:email,:nomeri,:misamarti,:posta)"   );


$statement->bindValue(':saxeli',$saxeli,PDO::PARAM_STR);
$statement->bindValue(':gvari',$gvari,PDO::PARAM_STR);
$statement->bindValue(':password',$password,PDO::PARAM_STR);
$statement->bindValue(':gender',$gender,PDO::PARAM_INT);
$statement->bindValue(':email',$email,PDO::PARAM_STR);
$statement->bindValue(':nomeri',$nomeri,PDO::PARAM_INT);
$statement->bindValue(':misamarti',$misamarti,PDO::PARAM_STR);
$statement->bindValue(':posta',$posta,PDO::PARAM_STR);

$statement->execute();

header("Location: loggedin.php");

}
?>
