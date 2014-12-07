<? require('/home/napierarchery/inc/inc.php'); ?>

<? top("Hit Counter"); ?>

<?
if (!isset($_SESSION['login'])) {
  bot();
  exit;
}
?>

<h3>Hit Counter</h3>
<table>
<th>Host</th><th>Time</th>
<?
$hits =& $db->getAll("SELECT * FROM counter ORDER BY timestamp DESC");

foreach ($hits as $hit) {
  echo '<tr><td>';
  echo $hit['host'].'</td><td>'.date("g:i a o\\n j-n-y",$hit['timestamp']).'</td></tr>';
}
?>

</table>

<?
bot();
?>