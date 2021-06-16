<?php


try {
  $conn = new PDO("mysql:host=localhost;dbname=Prodcuts", "root", "");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


session_start();
if($_SESSION['status']!='admin')
{

    header("Location: notallowed.html");
}

$statement = $conn->prepare('SELECT * FROM reg_prods');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>';
//var_dump($products);
//echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
  </head>
  <style media="screen">
    body{
     background: lime;
     padding: 10px;
    }


  </style>
    <body>
      <p>
<a  href="add.php"  class="btn btn-success">Add</a>
      </p>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">title</th>
      <th scope="col">link</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $i => $products) {
      // code...
     ?>
    <tr>

      <td><?php echo $products['id'] ?></td>
      <td><?php echo $products['title'] ?></td>
      <td><?php echo $products['link'] ?></td>
<td>

<!--<button type="button" class="btn btn-danger">Delete</button>-->
<form  action="delete.php" method="post" style="display: inline-block">
  <input type="hidden" name="id" value="<?php echo $products['id'] ?>"/>
  <button type="submit"  class="btn btn-danger">Delete</button>
</form>
</td>
    </tr>
<?php } ?>
  </tbody>
</table>

</body>
</html>
