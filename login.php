<?php include 'header.tpl'; ?>
<?php

if (isset($_POST["login"]) && isset($_POST["username"]) && isset($_POST["password"])) {
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
            header("Location: admin.php");
        } else {
            echo "Benutzername und/oder Passwort falsch. <a href=\"login.html\">Login</a>";
        }
    } else {
        echo "Benutzername und/oder Passwort falsch. <a href=\"login.html\">Login</a>";
    }
}

?>
<?php if (!$loggedin) { ?>
    <form class="box100" action="login.php" method="post">
        <div class="caption">Jetzt Einloggen</div>
        <input type="hidden" name="login" value="1">
        <span class="caption noborder"> Username:</span>
        <input type="text" size="24" maxlength="50" name="username">

        <span class="caption noborder"> Passwort:</span>
        <input type="password" size="24" maxlength="50" name="password">

        <br />
        <br />
        <br />

        <input type="submit" value="Login">

        <hr />
        <a class="link" href="register.php">Noch nicht angemeldet? Jetzt registrieren!</a>
    </form>
<?php } ?>



<?php
include 'footer.tpl';
?>

