<? require('/home/napierarchery/inc/inc.php'); ?>
<? top("Home"); ?>

<?
$news =& $db->getAll("SELECT * FROM news ORDER BY timestamp DESC");
echo '<h3>Latest News</h3>';
echo '<ul>';
foreach ($news as $newsItem) {
  echo '<li>'.stripslashes($newsItem['newsItem']).'&nbsp; ['.date("d-M-Y",$newsItem['timestamp']).']</li><br><br>';
}
echo '</ul>';
echo '<hr>';
?>
<br>
<center><h1>Welcome to the NUAC website</h1></center>
<p><img src="/images/thumb2.jpg" align="left" border="10" bordercolor="#FFFFFF" alt="Three archers at full draw"> 
  Welcome to the website of Napier University Archery Club (NUAC). NUAC was set 
  up in 2004 and competes in a wide variety of Scottish and UK-wide university 
  level competitions. For beginners, the club has a stock of equipment to learn 
  on and coaches to help you learn and improve. This website has been created 
  as a resource for club members, as well as serving as a point of contact for 
  external visitors. The Club's email address is <a href="mailto:napierarchery@gmail.com">napierarchery@gmail.com</a>. 
</p>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2381423-1");
pageTracker._initData();
pageTracker._trackPageview();
</script> 
<!--
<?
loghit(gethostbyaddr($REMOTE_ADDR));
?>
-->

<?
bot();

?>
