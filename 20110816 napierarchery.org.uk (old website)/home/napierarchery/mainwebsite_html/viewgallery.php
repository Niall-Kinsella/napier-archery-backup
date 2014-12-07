<? require('/home/napierarchery/inc/inc.php'); ?>

<?
if (!isset($_GET['gallery'])) {
  top("Gallery");
  bot();
  exit;
}
?>

<?
$gallery =& $db->getAll("SELECT * FROM galleries WHERE galleryid = ".$_GET['gallery']);
top(stripslashes($gallery[0]['name']));
echo '<div style="width:100%;">';
echo '<center><p><strong>'.stripslashes($gallery[0]['description']).'</strong></p>';
?>

<?
$photos =& $db->getAll("SELECT * FROM gallery_images WHERE galleryid = ".$_GET['gallery']);

$i = 0;

echo '<table><tr>';

foreach ($photos as $photo) {
  if (($i%3 == 0) && ($i > 0)) {
    echo '</tr><tr>';
  }
  $i++;
  echo '<td align="center"><a target="_new" href="/gallery/'.$photo['imageid'].'.jpg"><img padding=5 border=0 src="/gallery/thumbs/'.$photo['imageid'].'.jpg"></a><br>Added on: '.date("d-M-Y",$photo['timestamp']).'</td>';
}
echo '</tr></table></center>';
echo '</div>';

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