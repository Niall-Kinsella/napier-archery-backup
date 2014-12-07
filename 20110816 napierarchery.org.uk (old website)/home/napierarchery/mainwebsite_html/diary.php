<? require ('/home/napierarchery/inc/inc.php'); ?>
<? top("Diary"); ?>
<h3>Club Diary</h3>
<p>On this page you will find details of training dates, times and places, as well as dates and details of competitions and league matches.</p>
<?
$events =& $db->getAll("SELECT * FROM diary ORDER BY event_unixtime ASC");
if (sizeof($events) > 0) {
  echo '<table>';
  echo '<tr><th>Date</th><th>Time</th><th>Place</th><th>What?</th></tr>';
  foreach ($events as $event) {
    echo '<tr><td>'. date("l, jS F", $event['event_unixtime']).'</td><td>'.date("g:i a", $event['event_unixtime']).'</td><td>'.stripslashes($event['place']).'</td><td>'.stripslashes($event['description']).'</td></tr>';
  }
  echo '</table>';
} else {
  echo '<p>There are currently no events! We\'re clearly slacking guys...';
}
?>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2381423-1");
pageTracker._initData();
pageTracker._trackPageview();
</script> 
<? bot(); ?>