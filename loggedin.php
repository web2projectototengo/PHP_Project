
<?php
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['first_name'])){
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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


  </body>
</html>

<?php
} else {
  header("Location: login12.php");
  exit();
}
?>
