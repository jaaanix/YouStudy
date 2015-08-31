<?php 
header("Content-Type: text/html; charset=utf-8");
session_start(); 
?> 

<?php 
$verbindung = mysqli_connect("rdbms.strato.de", "U2152898" , "diplom2015", "DB2152898")
or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 
//mysql_select_db("homepage") or die ("Datenbank konnte nicht ausgewählt werden"); 

$username = $_POST["username"]; 
$password = md5($_POST["password"]); 

$abfrage = "SELECT username, password FROM users WHERE username LIKE '$username' LIMIT 1"; 
$ergebnis = mysqli_query($verbindung, $abfrage); 
$row = mysqli_fetch_object($ergebnis); 

if($row->password == $password) 
    { 
    $_SESSION["username"] = $username; 
    echo "Login erfolgreich. <br> <a href=\"index.php\">Geschützer Bereich</a>"; 
    } 
else 
    { 
    echo "Benutzername und/oder password waren falsch. <a href=\"login.html\">Login</a>"; 
    } 

?>