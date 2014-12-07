<? require('/home/napierarchery/inc/inc.php'); ?>

<? top("Add News"); ?>
<?
if (!isset($_SESSION['login'])) {
  bot();
  exit;
}
?>

<?
if (!isset($_POST['submit'])) {
  doForm();
} else {
  processForm();
}
?>

<?
function doForm() {
?>
<div align="center" style="width:100%">
  <form action="addnews.php" method="post">
    <p>Please enter the news you wish to add to the front page of the site below:</p>
	<textarea name="newsItem" cols="80" rows="5"></textarea>
	<br>
	<input type="submit" name="submit" value="Add">
  </form>
</div>
<?
}

function processForm() {
  if ($_POST['newsItem'] != "") {
    global $db;
	$values = array();
	$values['newsItem'] =& $_POST['newsItem'];
	$values['timestamp'] = time();
	$db->autoExecute("news",$values,DB_AUTOQUERY_INSERT);
	echo ('<div align=center><p>News added to database successfully.</p><a href="addnews.php">Click here to add another item</a></div>');
  }
}
?>

<? bot(); ?>