<? require ('/home/napierarchery/inc/inc.php'); ?>
<? top("The Chicken's Brain"); ?>

<?
if (!isset($_SESSION['login'])) {
  bot();
  exit;
}
?>

<?
if (isset($_GET['delete'])) {
  delete($_GET['delete'],$db);
}
displayForm($db);
?>


<?
function displayForm($db) {
  $sillies =& $db->getAll("SELECT * FROM chicken ORDER BY timestamp DESC");
  echo '<p>Please note that if you click delete on any of the questions, that question will be deleted WITHOUT CONFIRMATION!</p>';
  if (sizeof($sillies) > 0) {
    echo '<table>';
	echo '<th>Question</th><th>Answer</th><th>Time</th><th>Originating Host</th><th></th>';
    foreach ($sillies as $silly) {
	  echo '<tr><td>'.stripslashes(strip_tags($silly['question'])).'</td><td>'.stripslashes($silly['answer']).'</td><td>'.date("g:i a o\\n j-n-y",$silly['timestamp']).'</td><td>'.$silly['host'].'</td><td><a href="chickenbrain.php?delete='.$silly['questionid'].'">Delete</a></td></tr>';
	}
	echo '</table>';
  }
}

function delete($questionid, $db) {
  $db->query("DELETE FROM chicken WHERE questionid = ".$questionid);
}
?>

<? bot(); ?>