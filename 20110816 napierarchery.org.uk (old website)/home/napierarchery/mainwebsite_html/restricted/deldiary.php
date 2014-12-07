<? require ('/home/napierarchery/inc/inc.php'); ?>
<? top("Delete Diary Event"); ?>

<?
if (!isset($_SESSION['login'])) {
  bot();
  exit;
}
?>
<h3>Select a Diary Event to Delete</h3>
<?
if (isset($_POST['submit'])) {
  delDiary($_POST['diaryid'],$db);
} else {
  doForm();
}
?>

<?
function doForm() {
  global $db;
  $events =& $db->getAll("SELECT * FROM diary ORDER BY diaryid ASC");
  
  if (sizeof($events) > 0) {
    // output the events here
	echo '<form action="deldiary.php" method="post">';
	echo '<table border=1 cellpadding=5>';
	echo '<tr><th></th><th>Date</th><th>Time</th><th>Place</th><th>What?</th></tr>';
	
	foreach ($events as $event) {
	  echo '<tr><td><input type=radio name=diaryid value='.$event['diaryid'].'></td><td>'. date("l, jS F", $event['event_unixtime']).'</td><td>'.date("g:i a", $event['event_unixtime']).'</td><td>'.stripslashes($event['place']).'</td><td>'.stripslashes($event['description']).'</td></tr>';
	}
	
	echo '<tr><td colspan="5" align=center><input type="submit" name="submit" value="Delete"></td></tr>';
	
	echo '</table>';
	echo '</form>';
  } else {
    echo '<p>No events in the database! Come on you lazy buggers!</p>';
  }
}

function delDiary($diaryid,$db) {
  $db->query("DELETE FROM diary WHERE diaryid = ".$diaryid);
  doForm();
}
?>