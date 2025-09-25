<?php
session_start();
$db = new mysqli("localhost", "root", "", "app");
$conn = mysqli_connect("localhost", "root", "", "app");
$doda = null;
$html = "<html>
		<head>
		<link rel='stylesheet' href='css2.css'>
		</head>
		<form method='POST'>
		<button type='submit' name='history'
                class='button2' value='Zgodovina'><img class = 'gump' src='slike/zgodovina.png'></button>
				
		<button type='submit' name='lider'
                class='button22' value='Lestvica'><img class = 'gump' src='slike/leaderboard.png'></button>
		<br>
        <button type='submit' name='button1'
                class='button' value='0.25' ><img class = 'gump' src='slike/zgodovina.png'></button>
        
        <button type='submit' name='button2'
                class='button' value='0.5' ><img class = 'gump' src='slike/zgodovina.png'></button>
				
		<button type='submit' name='button3'
                class='button' value='1' ><img class = 'gump' src='slike/zgodovina.png'></button>
				
		
		<br>
		<button type='submit' name='bak'
                class='button3' value='Nazaj'><img class = 'gump' src='slike/back.png'></button>
    </form>
	</html>";

$result = $db->query("SELECT Value FROM users WHERE User = '".$_SESSION['User']."' ");
	$row = $result->fetch_assoc();
echo "<html><header><h2>".$_SESSION['User']." - ".$row["Value"]."</h2></header></html>";
echo $html;

       
		
		if(array_key_exists('button1', $_POST)) {
            button1();
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
        }
		else if(array_key_exists('button3', $_POST)) {
            button3();
        }
		else if(array_key_exists('history', $_POST)) {
            history();
        }
		else if(array_key_exists('lider', $_POST)) {
            lider();
        }
		else if(array_key_exists('bak', $_POST)) {
            bak();
        }
        function button1() {
            $doda = 0.25;
			echo $doda;
			$db = new mysqli("localhost", "root", "", "app");
			$db->query("UPDATE Users
			SET Value = Value + '".$doda."'
			WHERE UserID = '".$_SESSION["UserID"]."'");
			
			$db->query("INSERT INTO history (UserID, Date, Value)
			VALUES ('".$_SESSION["User"]."', '".date("Y.m.d.H:i")."', '".$doda."')");
			header("Refresh:0");
        }
        function button2() {
            $doda = 0.5;
			echo $doda;
			$db = new mysqli("localhost", "root", "", "app");
			$db->query("UPDATE Users
			SET Value = Value + '".$doda."'
			WHERE UserID = '".$_SESSION["UserID"]."'");
			
			$db->query("INSERT INTO history (UserID, Date, Value)
			VALUES ('".$_SESSION["User"]."', '".date("Y.m.d.H:i")."', '".$doda."')");
			header("Refresh:0");
        }
		function button3() {
            $doda = 1;
			echo $doda;
			$db = new mysqli("localhost", "root", "", "app");
			$db->query("UPDATE Users
			SET Value = Value + '".$doda."'
			WHERE UserID = '".$_SESSION["UserID"]."'");
			
			$db->query("INSERT INTO history (UserID, Date, Value)
			VALUES ('".$_SESSION["User"]."', '".date("Y.m.d.H:i")."', '".$doda."')");
			header("Refresh:0");
        }
		function history() {
		header('Location:history.php');	
		}
		function lider() {
		header('Location:lestvica.php');	
		}
		function bak() {
		header('Location:index.php');	
		}
?>