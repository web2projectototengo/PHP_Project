
<?php

// Initialize the session
session_start();

const USER = 'root';
const PASSWORD = '';
const HOST = 'localhost';
const DATABASE = 'registered_accounts';
/* Attempt to connect to MySQL database */
$link = mysqli_connect(HOST, USER, PASSWORD, DATABASE);


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
//  echo "Connected";




if (isset($_POST['Login'])){
$email=$_POST['email'];
$password=$_POST['pass'];

$sql = "SELECT * FROM reg_accs WHERE email = '$email' and password='$password'";
$result=mysqli_query($link,$sql);

if(mysqli_num_rows($result)){
  $row=mysqli_fetch_assoc($result);
echo "Logged in";
if($row['status']=='user')
header("Location: loggedin.php");
else {
  header("Location: admin_page.php");
}
//  print_r($row);
$_SESSION['email']=$row['email'];
$_SESSION['password']=$row['password'];
$_SESSION['first_name']=$row['first_name'];
$_SESSION['last_name']=$row['last_name'];
$_SESSION['phone']=$row['phone'];
$_SESSION['address']=$row['address'];
$_SESSION['postal_code']=$row['postal_code'];

} else {
  echo "Wrong email or password";
}

}
else {
  //header("Location: index.html");
//  exit();
}



}
?>






<html>
<head>
    <title>PHP login system</title>

    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
    <div id = "frm">
        <h1 >Login</h1>
        <form name="f1" action = "login12.php" onsubmit = "return validation()" method = "POST">
            <p>
                <label > Email:</label>  <br>
                <input type = "text" id ="email" required name  = "email" />
            </p>
            <p>
                <label> Password:</label>  <br>
                <input type = "password" id ="pass" required name  = "pass" />
            </p>
            <p>
                <input type = "submit" id = "btn" name="Login" value = "Login" />
            </p>
        </form>
        <br>
        <a href="Form.html" style="color:red;"> not registered? Register, now! </a>
    </div>

    <script>
            function validation()
            {
                var id=document.f1.user.value;
                var ps=document.f1.pass.value;
                if(id.length=="" && ps.length=="") {
                    alert("Email and Password fields are empty");
                    return false;
                }
                else
                {
                    if(id.length=="") {
                        alert("Email feild is empty");
                        return false;
                    }
                    if (ps.length=="") {
                    alert("Password field is empty");
                    return false;
                    }
                }
            }
        </script>
		<style>

		body{
    background: #eee;
}
#frm{
    border: solid gray 1px;
    width:15%;
    border-radius: 10px;
    margin: 120px auto;
    background: white;ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    padding: 50px;
}
#btn{
	width: 120px;
	height: 50px;
	border: none;
	color: white;
	background-color: silver;
	border-radius: 10px;
	box-shadow: inset 0 0 0 0 #f9e506;
	transition: ease-out 0.3s;
	font-size: 20px;
	outline: none;


}
#btn:hover{
	box-shadow: inset 300px 0 0 0 black;
}
input {
border-radius: 10px;
outline: none;
}
		</style>
</body>
</html>
