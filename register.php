<?php include 'header.tpl'; ?>
<?php
$error = "";
$success = "";
if (isset($_POST["register"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
    include('config.php');
    $verbindung = mysqli_connect(DB_ADDR, DB_USER, DB_PASS, DB_DATA)
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");

//mysqli_select_db("DB2152898") or die ("Datenbank konnte nicht ausgewählt werden");

    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if ($password != $password2 OR $username == "" OR $password == "") {
        $error = "Eingabefehler. Bitte alle Felder korrekt ausfüllen!";
    } else {
        $password = md5($password);

        $result = mysqli_query($verbindung, "SELECT id FROM users WHERE username LIKE '$username'");

        $menge = mysqli_num_rows($result);

        if ($menge == 0) {
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            $register = mysqli_query($verbindung, $query);

            if ($register == true) {
                $success = "User <b>$username</b> wurde erstellt. <a class=\"link\" href=\"login.php\">Login</a>";
            } else {
                $error = "Fehler beim Speichern des Users.";
            }


        } else {
            $error = "Fehler. Username bereits vergeben.";
        }
    }
}
?>
<?php if ($success == "") { ?>
<form class="box100" action="register.php" method="post">
    <div class="caption">Jetzt Anmelden!</div>
    <input type="hidden" name="register" value="1">
    <span class="caption noborder"> Username:</span>
    <input type="text" size="24" maxlength="50" name="username"><br><br>

    <span class="caption noborder"> Passwort:</span>
    <input type="password" size="24" maxlength="50" name="password"><br>

    <span class="caption noborder"> Passwort wiederholen:</span>
    <input type="password" size="24" maxlength="50" name="password2"><br>

    <br/>
    <br/>
    <?php if ($error != "") echo "<div class=\"caption noborder red\"> $error </div>"; ?>
    <br/>
    <br/>
    <input type="submit" value="Abschicken">
</form>
<?php } else {?>
    <div class="box100">
        <?php echo $success; ?>

    </div>

<?php } ?>

<?php
include 'footer.tpl';
?>
