<? require('/home/napierarchery/inc/inc.php'); ?>
<? top("Club Members"); ?>

<? $memberCount =& $db->getAll("SELECT * FROM tbl_members"); ?>
<div style="width:100%">
<h3>Members 2005-2006</h3>
<center>
<p>Please select a member from the drop down menu below:</p>
<br>
</center>
</div>
<?
doChoice();
if (isset($_POST['member'])) {
  displayMember($_POST['member']);
}
?>
<?
function displayMember($member_id) {
  global $db;
  $member =& $db->getAll("SELECT * FROM tbl_members WHERE tbl_members.member_id = ".$member_id);
	
  echo '<div style="width:100%">';
  echo '<center>';
  echo '<table cellpadding="2" border="1">';
  echo '<tr><td align="right"><strong>Name:</strong></td><td>'.stripslashes($member[0]['member_first_name']).'</td></tr>';
  echo '<tr><td align="right"><strong>Course:</strong></td><td>'.stripslashes($member[0]['member_second_name']).'</td></tr>';
  echo '<tr><td align="right"><strong>Position in club:</strong></td><td>'.stripslashes($member[0]['member_course']).'</td></tr>';
  echo '<tr><td align="right"><strong>Shooting Style:</strong></td><td>'.stripslashes($member[0]['member_equipment']).'</td></tr>';
  echo '<tr><td align="right"><strong>Quote:</strong></td><td valign=middle>';
  echo '</td></tr>';
  echo '</table>';
  echo '</center>';
  echo '</div>';
}


function doChoice() {
  echo '<div style="width:100%">';
  echo '<center>';
  echo '<form action="members.php" method="post">';
    
  global $db;
  
  $members =& $db->getAll("SELECT * FROM tbl_members ORDER BY member_first_name ASC");
  
  if (sizeof($members) > 0) {
    echo '<select name="member" style="width:200px;">';
    foreach ($members as $member) {
      echo '<option value="'.$member['memberid'].'"';
	  if ($_POST['member'] == $member['memberid']) {
	    echo 'selected';
	  }
	  echo '>'.stripslashes($member['name']).'</option>';
    }
	echo '</select>';
  }
  echo '&nbsp;<input name=submit value="Go" type=submit>';
  echo '</form>';
  echo '<br>';
  echo '</center>';
  echo '</div>';
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