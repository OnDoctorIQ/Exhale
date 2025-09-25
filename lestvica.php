<html>
<head><link rel='stylesheet' href='css3.css'><head>
<header>
<h2>Lestvica</h2>
</header>
<form method="POST" >
<button type='submit' name='nazaj'
class='button' value='Nazaj'><img class = 'gump' src='slike/back.png'></button>
</form>
</html>
<?php
$db = new mysqli("localhost", "root", "", "app");
$conn = mysqli_connect("localhost", "root", "", "app");
$a = 1;
$result = $db->query("SELECT User, Value FROM users ORDER BY Value DESC");
while($row = $result->fetch_assoc()) { 
   echo "<p class='p2'>" .$a. ". " .$row["User"]. ": " . $row["Value"]. "</p><br>";
   $a= $a + 1;
}

if(array_key_exists('nazaj', $_POST)) {
            nazaj();
        }
function nazaj(){
	header('Location:main.php');	
}
?>