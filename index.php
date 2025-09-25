<html>
<head>
  <link rel="stylesheet" href="css.css">
</head>

<form method="POST" >
<h3>Vpiši ime:</h3>
<input type='text' class="input" name='username'/>
<button type='submit' class = "potrdi"><img class = "gump" src="slike/klukica.png"></button>
</form>
</html>
<?php
session_start();
$db = new mysqli("localhost", "root", "", "app");
$conn = mysqli_connect("localhost", "root", "", "app");

if (isset($_POST["username"]))
{$ime = $_POST["username"];}
else{$ime = '';}
if($ime != null){
$result = $db->query("SELECT User, UserID FROM users WHERE User = '".$ime."' ");
if (mysqli_num_rows($result) != 0)
{
	$row = $result->fetch_assoc();
	$_SESSION["User"] = $row["User"];
	$_SESSION["UserID"] = $row["UserID"];
	header('Location:main.php');
}
else
{echo "<html><p>Oseba ne obstaja</p></html>";}
}
?>
