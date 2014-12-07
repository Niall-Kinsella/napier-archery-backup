<? require('/home/napierarchery/inc/inc.php'); ?>

<?
if (!isset($_SESSION['login'])) {
  top("Not Logged In");
  bot();
  exit;
}
?>

<? top("Add Member"); ?>



<?
if (!isset($_POST['submit'])) {
  doForm();
} else {
  if ($_POST['name'] == "" || $_POST['position'] == "" || $_POST['style'] == "") {
    // need to fill in the form correctly
	doForm("Please ensure you have entered at least a name, style, and position for this member");
  } else {
    // we're ok, enter into database
	$values = array();
	$values['name'] =& $_POST['name'];
	$values['style'] =& $_POST['style'];
	$values['position'] =& $_POST['position'];
	$values['course'] =& $_POST['course'];
	$values['equipment'] =& $_POST['equipment'];
	$values['bests'] =& $_POST['bests'];
	
	$db->autoExecute('members', $values, DB_AUTOQUERY_INSERT);
	
	if ($HTTP_POST_FILES['photo']['error'] > 0) {
	  echo '<p>Photo upload failed, please contact system admin</p>';
	} else {
	  if ($HTTP_POST_FILES['photo']['type'] != 'image/gif') {
	    echo '<p>Please ensure the photo is in GIF format - photo not uploaded</p>';
		echo $HTTP_POST_FILES['photo']['error'];
	  } else {
	    $upfile = '/home/napierarchery/mainwebsite_html/images/members/'.mysql_insert_id($db->connection).'.gif';
		if (is_uploaded_file($HTTP_POST_FILES['photo']['tmp_name'])) {
		  move_uploaded_file($HTTP_POST_FILES['photo']['tmp_name'],$upfile);
		  chmod($upfile,0755);
		}
	  }
	}
	
	echo '<p>Member added to database successfully <a href="adduser.php">Click here</a> to add another</p>';
	echo '<p>Or <a href="addquote.php?member='.mysql_insert_id($db->connection).'">click here</a> to add a quote for this member</p>';
  }
}
?>

<? function doForm($error = "") { ?>
<div align=center style="width:100%">
<? if ($error == "") {
     echo '<p>Please enter the member\'s details below:</p>';
  } else {
    echo '<p color=#CC0000>'.$error.'</p>';
  }
?>
  <form enctype="multipart/form-data" method="post" action="adduser.php">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <table>
      <tr><td><strong>Name:</strong></td><td><input type="text" size=30 name="name"></td></tr>
      <tr><td><strong>Course:</strong></td><td><input type="text" size=30 name="course"></td></tr>
	  <tr><td><strong>Shooting style:</strong></td><td><input type="text" size=30 name="style"></td></tr>
	  <tr><td><strong>Position in club:</strong></td><td><input type="text" size=30 name="position"></td></tr>
	  <tr><td><strong>Bow and arrows:</strong></td><td><input type="text" size=30 name="equipment"></td></tr>
	  <tr><td><strong>Personal Bests:</strong></td><td><input type="text" size=30 name="bests"></td></tr>
	  <tr><td><strong>Photo:</strong></td><td><input type="file" name="photo"> (a gif format photo)</td></tr>
	  <tr><td></td><td><input type="submit" name="submit" value="Submit"></td></tr>
    </table>
  </form>
</div>
<? } ?>

<? bot(); ?>