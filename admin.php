<?php include 'header.tpl'; ?>

<!-- Die Encoding-Art enctype MUSS wie dargestellt angegeben werden -->
<div class="container">
    <form class="box100" enctype="multipart/form-data" action="upload.php" method="POST">
        <!-- MAX_FILE_SIZE muss vor dem Dateiupload Input Feld stehen -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>
        <!-- Der Name des Input Felds bestimmt den Namen im $_FILES Array -->
        Diese Datei hochladen: <input name="userfile" type="file"/>
        <input type="submit" value="Send File"/>
    </form>
</div>
<?php include 'footer.tpl'; ?>