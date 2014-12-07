<? require('/home/napierarchery/inc/inc.php'); ?>
<? top("Create New Gallery"); ?>

<?
if (!isset($_SESSION['login'])) {
  bot();
  exit;
}
?>

<?
if (isset($_POST['submit'])) {
  addGallery($db);
} else {
  doForm();
}
?>

<?
function addGallery($db) {
  // put index pic where we want it, resize it and put it in thumbs
  // then add it to the database as a gallery_image
  // then create the gallery entry in the galleries table
  
  $upfile = "";
  
  if ($_FILES['indexpic']['error'] > 0) {
	  echo '<p>Photo upload failed, please contact system admin</p>';
	  return;
  } else {
	if (false) {//($_FILES['indexpic']['type'] != 'image/jpeg') && ($_FILES['indexpic']['type'] != 'image/pjpeg') && ($_FILES['indexpic']['type'] != 'image/jpg') && ($_FILES['indexpic']['type'] != 'image/jpe')) {
	  echo '<p>Please ensure the photo is in JPEG format - index photo not uploaded and gallery not created</p>';
	  doForm();
	  return;
	} else {
	
	  // insert image into database and move it to the gallery with the correct name
	  $values = array();
	  $values['timestamp'] = time();
	  
	  $db->autoExecute("gallery_images",$values,DB_AUTOQUERY_INSERT);
	  
	  $upfile = '/home/napierarchery/mainwebsite_html/gallery/'.mysql_insert_id($db->connection).'.jpg';
      if (is_uploaded_file($_FILES['indexpic']['tmp_name'])) {
	    while (move_uploaded_file($_FILES['indexpic']['tmp_name'],$upfile)) {
		}
		chmod($upfile,0777);
	  }
	}
  }
  
  // create the thumbnail and save it in the thumbs directory
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
  
  // add the gallery to the database and link it with it's index image ($imageid)
  $values = array();
  $values['name'] =& $_POST['name'];
  $values['description'] =& $_POST['description'];
  $values['timestamp'] = time();
  $values['indexImage'] =& $imageid;
	  
  $db->autoExecute("galleries", $values, DB_AUTOQUERY_INSERT);
  
  // update the image entry to reflect the gallery it's linked to
  $values = array();
  $values['galleryid'] = mysql_insert_id($db->connection);
  $db->autoExecute("gallery_images",$values,DB_AUTOQUERY_UPDATE,'imageid = '.$imageid);
}

function doForm() {
?>
<h3>Add a New Gallery Below</h3>
<p>Enter the details of the gallery that you want to create below</p>
<form enctype="multipart/form-data" action="newgallery.php" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="204800">
<table border=1>
<tr><td>Name:</td><td><input type="text" size="30" name="name"></td></tr>
<tr><td>Description:</td><td><input type="text" size="30" name="description"></td></tr>
<tr><td>Index Image:</td><td><input type="file" name="indexpic">(a jpeg format photo)</td></tr>
<tr><td></td><td><input type="submit" name="submit" value="Create"></td></tr>
</table>
</form>
<?
}
?>

<? bot(); ?>
