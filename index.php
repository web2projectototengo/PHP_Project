<?php


try {
  $conn = new PDO("mysql:host=localhost;dbname=Prodcuts", "root", "");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="layo.css">
      <link rel="stylesheet" href="stu.css">
    <script src="jque.js"></script>
  </head>
  <body>
    <nav id="menu">
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Game Market</label>


      <ul>
        <li><a class="el active" href="index.html">Home</a></li>
       <li><a class="el" href="quiz.html">QUIZ</a></li>
        <li><a class="el" href="Categories.html">Categories</a></li>
            <li><a class="el" href="loggedin.php">Account</a></li>


      </ul>
      <div id = "container">
    		<article>
    			<h1>Browse best games of the world</h1>
    	Game Makert provodes the best existing titles of legendery games for all 3 platforms:
      Sony's PlayStation, Microsoft's Xbox One and Nintendo's Switch. <br>
      Most importatly: <b> for good prices </b>
        <div class="slider">
          <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <div class="slide first">
               <a href = "dtr.html" target = "_self">
              <img src="dtr.jpg" alt="">
            </a>
            </div>
            <div class="slide">
              <a href = "wt3.html" target = "_self">
              <img src="wt3.jpg" alt="">
            </a>
            </div>
            <div class="slide">
              <a href = "nier.html" target = "_self">
              <img src="nier.jpg" alt="">
            </a>
            </div>
            <div class="slide">
              <a href = "ff7.html" target = "_self">
              <img src="ff7.jpg" alt="">
            </a>
            </div>
            <div class="navigation-auto">
              <div class="auto-btn1"></div>
              <div class="auto-btn2"></div>
              <div class="auto-btn3"></div>
              <div class="auto-btn4"></div>
            </div>
          </div>
          <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
          </div>
        </div>
        <script type="text/javascript">
        var counter = 1;
        setInterval(function(){
          document.getElementById('radio' + counter).checked = true;
          counter++;
          if(counter > 4){
            counter = 1;
          }
        }, 5000);
        </script>

    		</article>
    		<aside id="Column2">
    			<h1> Looking to buy PlayStation?</h1>
          <br>
          <img id="ps" src="ps4.png" alt="Italian Trulli">
<br>
<br>
          <button onclick="window.open('https://www.playstation.com/en-us/ps4/','_blank')" class="butbuy">Buy from Offical store</button>

     		</aside>
    		<aside id="Column3">
    			<h1>GOTY titles  </h1>
        <h2 id="pur">  <i>  purcahse now </i></h2>

        <?php foreach ($products as $i => $products) {
          // code...
         ?>
          <a href=" <?php echo $products['link'] ?>"  <li class="prod"> <?php echo $products['title'] ?></li> <br> </a>

<?php } ?>
        </aside>
        <aside id="Column4">
<h2>First look at Unreal Engine 5</2>
<iframe width="560" height="315" src="https://www.youtube.com/embed/Oa2drgVThbs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </aside>

    	</div>
    	<footer>
        <script>
        function Currency(lari, Dollars) {
        return lari * Dollars
        }

        </script>
        </head>

        Currency Calculator <br>
        Result: <span id="result"> </span>
        <form name="frmCurrency" action="">
        lari: <input type="text" name="lari"/>
        Dollars: <input type="text" name="euro"/>
        <input type="button" value="Calculate"
        onclick="document.getElementById('result')
        .innerHTML = Currency(
        document.frmCurrency.lari.value,
        document.frmCurrency.euro.value)" />
        </form>
        </body>

      </footer>
    </nav>
    <section></section>


  </body>
</html>
