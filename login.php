<?php 
header("Content-Type: text/html; charset=utf-8");
session_start(); 
?> 

<?php 
$verbindung = mysqli_connect("localhost", "root" , "janis", "wpfmw") 
or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 

$username = $_POST["username"]; 
$password = md5($_POST["password"]); 

$abfrage = "SELECT username, password FROM users WHERE username LIKE '$username' LIMIT 1"; 
$ergebnis = mysqli_query($verbindung, $abfrage); 
$row = mysqli_fetch_object($ergebnis); 

if($row->password == $password) 
    { 
    $_SESSION["username"] = $username; 
    echo "Login erfolgreich. <br> <a href=\"admin.php\">Admin Center</a>"; 
    } 
else 
    { 
    echo "Benutzername und/oder Passwort falsch. <a href=\"login.html\">Login</a>"; 
    } 

?>