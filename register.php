<?php
header("Content-Type: text/html; charset=utf-8");

$verbindung = mysqli_connect("localhost", "root" , "janis", "wpfmw") 
or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 

$username = $_POST["username"]; 
$password = $_POST["password"]; 
$password2 = $_POST["password2"]; 


if($password != $password2 OR $username == "" OR $password == "") 
    { 
    echo "Eingabefehler. Bitte alle Felder korrekt ausfüllen. <a href=\"register.html\">Zurück</a>"; 
    exit; 
    } 
$password = md5($password); 

$result = mysqli_query($verbindung, "SELECT id FROM users WHERE username LIKE '$username'");

$menge = mysqli_num_rows($result); 

if($menge == 0) 
    { 
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')"; 
    $register = mysqli_query($verbindung, $query); 

    if($register == true) 
        { 
        echo "User <b>$username</b> wurde erstellt. <a href=\"login.html\">Login</a>"; 
        } 
    else 
        { 
        echo "Fehler beim Speichern des Users. <a href=\"register.html\">Zurück</a>"; 
        } 


    } 

else 
    { 
    echo "Username bereits vergeben. <a href=\"register.html\">Zurück</a>"; 
    } 
?>