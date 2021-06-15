
<?php

/*
try {
  $conn = new PDO("mysql:host=localhost;dbname=registered_accounts", "root", "");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
 */


session_start();
if(isset($_SESSION['email']) && isset($_SESSION['first_name'])
&& isset($_SESSION['last_name']) && isset($_SESSION['phone'])
&& isset($_SESSION['address']) && isset($_SESSION['postal_code'])

){


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
  </head>
  <style >

  body{
    background: rgb(212,29,29);
  background: linear-gradient(90deg, rgba(212,29,29,1) 0%, rgba(9,9,121,1) 43%, rgba(255,0,228,1) 100%);
  }
  h1{
    color: cyan;
  text-align: center;
  font-size: 40px;
margin: 20px;

  }

  th{
    color: white;
  }

  td{
    color: white;
  }

  #LOGOUT {
  background-color: #4CAF50; /* Green */
  border: none;
  border-radius: 20px;
  color: white;
  padding: 15px ;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 36px;
  float:left;
margin-left: 25%;
margin-right: 10px;
}

#LOGOUT:hover {
background-color: #5632a8; /* Green */
border: none;
border-radius: 20px;
color: white;
padding: 15px;
text-align: center;
text-decoration: none;
display: block;
font-size: 36px;


}

#shop {
background-color: #4CAF50; /* Green */
border: none;
border-radius: 20px;
color: white;
padding: 15px;
text-align: center;
text-decoration: none;
display: block;
font-size: 36px;
margin-right: 25%;

}

#shop:hover {
background-color: #5632a8; /* Green */
border: none;
border-radius: 20px;
color: white;
padding: 15px;
text-align: center;
text-decoration: none;
display: block;
font-size: 36px;
margin-right: 25%;

}
  </style>
  <body>


<h1> Hello, <?php echo $_SESSION['first_name'] ?></h1>
<br>
<button id="LOGOUT" type="button"  onclick="window.location.href='/proj/loggedout.php'"  name="gamodi">Log Out</button>
<button id="shop" type="button" onclick="window.location.href='/proj/index.html'" value="shopping" name="shopping">Contniue Shopping 🛍️</button>
<br>

<h3> Your Account info </h3>


<table class="table table-bordered border-warning">
  <thead>
    <tr>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Postal code</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $_SESSION['first_name'] ?></th>
      <td><?php echo $_SESSION['last_name'] ?></td>
      <td><?php echo $_SESSION['email'] ?></td>
      <td><?php echo $_SESSION['phone'] ?></td>
      <td><?php echo $_SESSION['address'] ?></td>
      <td><?php echo $_SESSION['postal_code'] ?></td>
    </tr>

  </tbody>
</table>

  </body>
</html>

<?php
} else {
  header("Location: login12.php");
  exit();
}
?>
