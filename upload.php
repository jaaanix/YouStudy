<?php include 'header.tpl'; echo "<div class=\"container\"><div class=\"box100\">" ?>
<?php
// In PHP kleiner als 4.1.0 sollten Sie $HTTP_POST_FILES anstatt
// $_FILES verwenden.

$uploaddir = 'images/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$number = "";
$round = 0;
while (file_exists ($uploaddir . "kino" . ++$round . ".jpg"));
var_dump($_FILES['userfile']) ;
if ($_FILES['userfile']['error'] == 2)
    echo "Die ausgewählte Datei hat leider eine Größe, die von PHP nicht akzeptiert wird.";
else {

    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . "kino" . $round . ".jpg")) {
        copy ($uploaddir . "kino" . $round . ".jpg", $uploaddir . "kino" . $round . "_thumb.jpg");
        echo "Datei ist valide und wurde erfolgreich hochgeladen.\n";
    } else {
        echo "Ein Fehler ist aufgetreten!\n";
    }

    echo 'Weitere Debugging Informationen:';
    print "</pre>";
}

?>
<?php echo "</div></div>"; include 'footer.tpl'; ?>