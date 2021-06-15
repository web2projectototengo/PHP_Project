<?php


try {
  $conn = new PDO("mysql:host=localhost;dbname=Prodcuts", "root", "");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$id = $_POST['id'] ?? null;
if (!$id) {
  header('Location: admin_page.php');
  exit;
}
//echo '<pre>';
//var_dump($products);
//echo '</pre>';

$statement = $conn->prepare('DELETE FROM reg_prods WHERE id = :id');
$statement->bindValue(':id',$id);
$statement->execute();

  header('Location: admin_page.php');

?>
