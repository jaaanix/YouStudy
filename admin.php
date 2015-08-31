<html>
<form enctype='multipart/form-data' name='frmupload' action='' method='POST'>
<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
<input name='filename' type='file'>
<input type='submit' value='Upload' name='submit'>
</form>
</html>
<?php
$verbindung = mysqli_connect("localhost", "root" , "janis", "wpfmw") 
or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 

if(isset($_POST['submit'])){

if(is_uploaded_file($_FILES['filename']['tmp_name'])){
 
	$maxsize=$_POST['MAX_FILE_SIZE'];		
	$size=$_FILES['filename']['size'];
 
	// getting the image info..
	$imgdetails = getimagesize($_FILES['filename']['tmp_name']);
	$mime_type = $imgdetails['mime']; 
 
	// checking for valid image type
	if(($mime_type=='image/jpeg')||($mime_type=='image/gif')){
	  // checking for size again
	  if($size<$maxsize){
	    $filename=$_FILES['filename']['name'];	
	    $imgData =addslashes (file_get_contents($_FILES['filename']['tmp_name']));
	    $sql="INSERT INTO movies(filename, poster) VALUES ('$filename','$imgData')";
	    mysqli_query($verbindung, $sql) or die(mysqli_error());
	  }else{
	    echo "<font class='error'>Bild konnte nicht hochgeladen werden, da die Datei zu groß ist.</font>";
	  }
	}else{
	  echo "<font class='error'>Bild konnte nicht hochgeladen werden, falsches Format. (JPEG oder GIF)</font>";
	}
 
}else{			
  switch($_FILES['filename']['error']){
	case 0: //no error; possible file attack!
	  echo "<font class='error'>There was a problem with your upload.</font>";
	  break;
	case 1: //uploaded file exceeds the upload_max_filesize directive in php.ini
	  echo "<font class='error'>The file you are trying to upload is too big.</font>";
	  break;
	case 2: //uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the html form
	  echo "<font class='error'>The file you are trying to upload is too big.</font>";
	  break;
	case 3: //uploaded file was only partially uploaded
	  echo "<font class='error'>The file you are trying upload was only partially uploaded.</font>";
	  break;
	case 4: //no file was uploaded
	  echo "<font class='error'>You must select an image for upload.</font>";
	  break;
	default: //a default error, just in case! 
	  echo "<font class='error'>There was a problem with your upload.</font>";
	  break;
  }		
}	
}

$ids_stmt="SELECT id FROM movies";
$ids_result=mysqli_query($verbindung, $ids_stmt) or die(mysqli_error());


$ids_array = array();
foreach ($ids_result as $row){
      $ids_array[] = $row;
}
//print_r(array_values($ids_array[3]));

$selected_poster_id=$ids_array[2][id];

$poster_stmt="SELECT * from movies WHERE id =" . $selected_poster_id;
$sth = $verbindung->query($poster_stmt);
$result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['poster'] ).'"/>';


?>