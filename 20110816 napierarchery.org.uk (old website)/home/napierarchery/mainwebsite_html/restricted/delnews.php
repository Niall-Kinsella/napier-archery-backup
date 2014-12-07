<? require('/home/napierarchery/inc/inc.php'); ?>

<? top("Delete News"); ?>

<?
if (!isset($_SESSION['login'])) {
  bot();
  exit;
}
?>

<?
if (isset($_POST['submit']) && isset($_POST['newsid'])) {
  global $db;
  $db->query("DELETE FROM news WHERE newsid = ".$_POST['newsid']);
}

$allNews =& $db->getAll("SELECT * FROM news ORDER BY timestamp DESC");
echo '<form method=post action=delnews.php>';
echo '<div align=center style="width:100%">';
echo '<table border=1 cellspacing=1>';

foreach ($allNews as $news) {
  echo '<tr><td><input type="radio" name="newsid" value="'.$news['newsid'].'"></td><td>'.stripslashes($news['newsItem']).'</td></tr>';
}

echo '<tr><td></td><td><input type=submit name=submit value="Delete"></td></tr>';
echo '</table>';
echo '</div>';
echo '</form>';
?>


<? bot(); ?>