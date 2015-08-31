<?php 
$verbindung = mysqli_connect("rdbms.strato.de", "U2152898" , "diplom2015", "DB2152898") 
or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 

//mysqli_select_db("DB2152898") or die ("Datenbank konnte nicht ausgewählt werden"); 

$username = $_POST["username"]; 
$password = $_POST["password"]; 
$password2 = $_POST["password2"]; 

if($password != $password2 OR $username == "" OR $password == "") 
    { 
    echo "Eingabefehler. Bitte alle Felder korekt ausfüllen. <a href=\"register.html\">Zurück</a>"; 
    exit; 
    } 
$password = md5($password); 

$result = mysqli_query("SELECT id FROM users WHERE username LIKE '$username'"); 
$menge = mysqli_num_rows($result); 

if($menge == 0) 
    { 
    $eintrag = "INSERT INTO login (username, password) VALUES ('$username', '$password')"; 
    $register = mysqli_query($eintrag); 

    if($register == true) 
        { 
        echo "Benutzername <b>$username</b> wurde erstellt. <a href=\"login.html\">Login</a>"; 
        } 
    else 
        { 
        echo "Fehler beim Speichern des Benutzernames. <a href=\"register.html\">Zurück</a>"; 
        } 


    } 

else 
    { 
    echo "Benutzername schon vorhanden. <a href=\"register.html\">Zurück</a>"; 
    } 
?>