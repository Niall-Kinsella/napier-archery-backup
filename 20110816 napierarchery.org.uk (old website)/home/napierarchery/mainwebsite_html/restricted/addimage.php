<? require('/home/napierarchery/inc/inc.php'); ?>
<? top("Add Image"); ?>

<?
if (!isset($_SESSION['login'])) {
  bot();
  exit;
}
?>

<?
if (!isset($_GET['gallery'])) {
  chooseGallery($db);
} else {
  if (!isset($_POST['submit'])) {
    displayForm();
  } else {
    addImage($_GET['gallery'],$db);
	chooseGallery($db);
  }
}
?>

<?
function chooseGallery($db) {
  echo '<h3>Select a Gallery</h3>';
  echo '<p>Please select the gallery you wish to add a photo to from the list below</p>';
  
  $galleries =& $db->getAll("SELECT * FROM galleries ORDER BY timestamp DESC");
  
  echo '<table>';
  
  foreach($galleries as $gallery) {
    echo '<tr><td align="center">'.$gallery['name'].'<br>'.$gallery['description'].'<br>'.date("d-M-Y",$gallery['timestamp']).'<br><br><small><a href="addimage.php?gallery='.$gallery['galleryid'].'">Add Photo</a></td><td><img border=0 src="/gallery/thumbs/'.$gallery['indexImage'].'.jpg"></td></tr>';
  }

  echo '</table>';
}

function displayForm() {
?>
<h3>Photo Details</h3>
<p>Please enter the details of the photo you would like to upload below. Please ensure the photo is a JPEG!</p>
<table>
<form method="post" enctype="multipart/form-data" action="addimage.php?gallery=<? echo $_GET['gallery']; ?>">
<input type="hidden" name="MAX_FILE_SIZE" value="204800">
<tr><td><strong>Image:</strong></td><td><input type="file" name="upfile" size="30"></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="Upload">
</form>
</table>
<?
}

function addImage($galleryid,$db) {
  if ($_FILES['upfile']['error'] > 0) {
	  echo '<p>Photo upload failed, please contact system admin</p>';
	  return;
  } else {
	// insert image into database and move it to the gallery with the correct name
	$values = array();
	$values['timestamp'] = time();
	$values['galleryid'] = $galleryid;
	  
	$db->autoExecute("gallery_images",$values,DB_AUTOQUERY_INSERT);
	  
	$upfile = '/home/napierarchery/mainwebsite_html/gallery/'.mysql_insert_id($db->connection).'.jpg';
    if (is_uploaded_file($_FILES['upfile']['tmp_name'])) {
	  while (move_uploaded_file($_FILES['upfile']['tmp_name'],$upfile)) {
	  }
      chmod($upfile,0777);
	}
  }
  
  $imageid = mysql_insert_id($db->connection);
  $original = imagecreatefromjpeg($upfile);
  if (!$original) { /* See if it failed */
    $im  = imagecreatetruecolor(150, 30); /* Create a black image */
    $bgc = imagecolorallocate($im, 255, 255, 255);
    $tc  = imagecolorallocate($im, 0, 0, 0);
    imagefilledrectangle($im, 0, 0, 150, 30, $bgc);
    /* Output an errmsg */
    imagestring($im, 1, 5, 5, "Error loading $imgname", $tc);
	$original =& $im;
  }
  $thumb = imagecreatetruecolor(160,120);
  $width = 0;
  $height = 0;
  list($width, $height) = getimagesize($upfile);
  imagecopyresized($thumb, $original, 0, 0, 0, 0, 160, 120, $width, $height);
  imagejpeg($thumb,'/home/napierarchery/mainwebsite_html/gallery/thumbs/'.$imageid.'.jpg');
}
?>

<?
bot();
?>