<html>
<head><link rel='stylesheet' href='css3.css'><head>
<header>
<h2>Zgodovina</h2>
</header>
<form method='POST' >
<button type='submit' name='nazaj'
class='button' value='Nazaj'><img class = 'gump' src='slike/back.png'></button>
</form>
</html>
<?php
$db = new mysqli("localhost", "root", "", "app");
$conn = mysqli_connect("localhost", "root", "", "app");

$result = $db->query("SELECT * FROM history ORDER BY id DESC");
while($row = $result->fetch_assoc()) {
    echo "<p>- ".$row["UserID"]. ": " . $row["Date"]. " " . $row["Value"]."</p><br>";
}


if(array_key_exists('nazaj', $_POST)) {
            nazaj();
        }
function nazaj(){
	header('Location:main.php');	
}
?>