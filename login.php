<?php include 'header.tpl'; ?>
<?php

if (isset($_POST["username"]) && isset($_POST["password"])) {
    include('config.php');
    $verbindung = mysqli_connect(DB_ADDR,DB_USER,DB_PASS,DB_DATA)
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $abfrage = "SELECT username, password FROM users WHERE username LIKE '$username' LIMIT 1";
    $ergebnis = mysqli_query($verbindung, $abfrage);
    $row = mysqli_fetch_row($ergebnis);
    if (isset($row)) {
        if ($row[1] == $password) {
            $_SESSION["username"] = $username;
            header("Location: index.php");
        } else {
            echo "Benutzername und/oder Passwort falsch. <a href=\"login.html\">Login</a>";
        }
    } else {
        echo "Benutzername und/oder Passwort falsch. <a href=\"login.html\">Login</a>";
    }

}

?>
<?php if (!$loggedin) { ?>
    <form action="login.php" method="post">
        Username:<br>
        <input type="text" size="24" maxlength="50"
               name="username"><br><br>

        Passwort:<br>
        <input type="password" size="24" maxlength="50"
               name="password"><br>

        <input type="submit" value="Login">
    </form>
<?php } ?>



<?php
include 'footer.tpl';
?>

