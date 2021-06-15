
<?php


try {
  $conn = new PDO("mysql:host=localhost;dbname=Prodcuts", "root", "");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD']==='POST') {


$link=$_POST['link'];
$title=$_POST['title'];
//$id=$_POST['id'];
//echo "string";
$statement =$conn->prepare("INSERT INTO reg_prods (title,link)
        VALUES (:title, :link)"   );


$statement->bindValue(':title',$title,PDO::PARAM_STR);
$statement->bindValue(':link',$link,PDO::PARAM_STR);
//$statement->bindValue(':id',$id,PDO::PARAM_INT);
$statement->execute();
}

//header("Location: admin_page.php");


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <style media="screen">
    h2 {
      color: Blue;
      font-size: 20px;
      font-family: fantasy;
    }
    input {
width: 80%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
}

body{
background: rgb(0,212,255);
background: linear-gradient(90deg, rgba(0,212,255,1) 0%, rgba(9,9,121,1) 44%, rgba(2,0,36,1) 91%);
}

#upim {
color: lime;

}

  table {
margin:auto;
    border-collapse:collapse;
    width: 500px;
    }

    td, th {
    border: 3px dashed #777;
    text-align: centre;
    padding: 7px;
    }

    td{
background-color:#E2EC1E;
}

th{
background-color:#19E84E;
}


  </style>
<h2>  Add game  </h2>
 <form action="./add.php" method="post"  id="add">
  <input id="title" type="text" name="title" placeholder="title" value="">
  <input id="link" type="text" name="link" placeholder="link" value="">
  <!-- <input id="id" type="text" name="id" placeholder="id" value=""> -->

  <input type="submit" value="submit" name="submit" id="submit">
</form>
