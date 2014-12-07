<? require ('/home/napierarchery/inc/inc.php'); ?>
<? top("Add Diary Event"); ?>

<?
if (!isset($_SESSION['login'])) {
  bot();
  exit;
}
?>

<?
echo "<strong>The checking on this page may not work. If you enter an invalid date you'll just get an error message. Yuck.</strong>";
if (isset($_POST['submit'])) {
  saveItem($db);
} else {
  doForm($error);
}
?>

<?
function doForm($error="") {
  if ($error != "") {
    echo '<p>'.$error.'</p>';
  } else {
    echo '<p>Please enter details of the event below</p>'; 
  }
?>
<form action="adddiary.php" method="post">
<table>
  <tr>
    <td>Date (dd-mm-yyyy):</td>
	<td><input type="text" name="day" maxlength="2" size="1" value="<? echo $_POST['day']; ?>"> - <input type="text" maxlength="2" name="month" size="1" value="<? echo $_POST['month']; ?>"> - <input type="text" name="year" maxlength="4" size="2" value="<? echo $_POST['year']; ?>"></td>
  </tr>
  <tr>
    <td>Time (24hr format, e.g. 19:00 - 21:00):</td>
	<td><input type="text" name="hours" size="1" maxlength="2" value="<? echo $_POST['hours']; ?>"> : <input type="text" name="minutes" size="1" maxlength="2" value="<? echo $_POST['minutes']; ?>"></td>
  </tr>
  <tr>
    <td>Place:</td>
	<td><input type="text" name="place" size="40" value="<? echo $_POST['place']; ?>"></td>
  </tr>
  <tr>
    <td>Description (e.g. training, pub meet):</td>
	<td><input type="text" name="description" size="40" value="<? echo $_POST['description']; ?>"></td>
  </tr>
  <tr>
    <td></td>
	<td><input type="submit" name="submit" value="Save"></td>
</table>
</form>
<?
}

function saveItem($db) {
  if ($_POST['hours'] == "" || $_POST['minutes'] == "" || $_POST['place'] == "" || $_POST['description'] == "" || $_POST['day'] == "" || $_POST['month'] == "" || $_POST['year'] == "") {
    doForm("Please ensure all fields are filled in correctly");
  } else {
    $values = array();
	$values['event_unixtime'] =& mktime($_POST['hours'],$_POST['minutes'],0,$_POST['month'],$_POST['day'],$_POST['year']);
	$values['description'] =& $_POST['description'];
	$values['place'] =& $_POST['place'];
	
	$db->autoExecute("diary",$values,DB_AUTOQUERY_INSERT);
	
	echo '<p>Diary event successfully added, <a href="adddiary.php">click here</a> to add another.</p>';
  }
}
?>