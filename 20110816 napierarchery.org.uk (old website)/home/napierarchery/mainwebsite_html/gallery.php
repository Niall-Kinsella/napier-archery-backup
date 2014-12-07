<? require ('/home/napierarchery/inc/inc.php'); ?>
<? top("Photo Gallery"); ?>

<?
printIndex($db);
?>

<?
function printIndex($db) {
  $galleries =& $db->getAll("SELECT galleries.galleryid, galleries.name, galleries.description, galleries.timestamp, gallery_images.imageid
  								FROM galleries, gallery_images
								WHERE galleries.indexImage = gallery_images.imageid
								ORDER BY galleries.galleryid DESC");
  
  if (sizeof($galleries) > 0) {
    echo '<div style="width:100%;">';
	echo '<center>';
    echo '<h3>More photos available in <a href="http://picasaweb.google.com/napierarchery">Picasa Album</a>.</h3>';
	echo '<p>Please select a gallery to view by clicking on a thumbnail below</p>';
	echo '<table style="width:75%">';
    foreach ($galleries as $gallery) {
	  echo '<tr><td><a href="viewgallery.php?gallery='.$gallery['galleryid'].'"><img border=0 src="/gallery/thumbs/'.$gallery['imageid'].'.jpg"></a></td><td align="center"><strong>'.stripslashes($gallery['name']).'</strong><br>'.stripslashes($gallery['description']).'<br>Started on: '.date("d-m-Y",$gallery['timestamp']).'</td></tr>';
	}
	echo '</table>';
	echo '</center>';
	echo '</div>';
  } else {
    echo '<h3>No Galleries</h3><p>There are currently no galleries, how boring!</p>';
  }
  
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