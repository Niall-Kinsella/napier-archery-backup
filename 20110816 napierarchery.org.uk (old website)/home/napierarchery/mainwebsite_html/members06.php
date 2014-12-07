<? require('/home/napierarchery/inc/inc.php'); ?>
<? top("Club Members"); ?>

<? $memberCount =& $db->getAll("SELECT * FROM members"); ?>
<div style="width:100%">
  <h3>Members 2006-2007</h3>
<center>
<p>Please select a member from the drop down menu below, there are <? echo sizeof($memberCount); ?> of us to choose from!</p>
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
function displayMember($memberID) {
  global $db;
  $member =& $db->getAll("SELECT * FROM members WHERE members.memberid = ".$memberID);
  $quotes =& $db->getAll("SELECT quote FROM quotes WHERE quotes.memberid = ".$memberID);
	
  echo '<div style="width:100%">';
  echo '<center>';
  echo '<img alt="Photo of '.stripslashes($member[0]['name']).'" src="/images/members/'.stripslashes($member[0]['memberid']).'.gif" width=142 height=142><br><br>';
  echo '<table cellpadding="2" border="1">';
  echo '<tr><td align="right"><strong>Name:</strong></td><td>'.stripslashes($member[0]['name']).'</td></tr>';
  echo '<tr><td align="right"><strong>Course:</strong></td><td>'.stripslashes($member[0]['course']).'</td></tr>';
  echo '<tr><td align="right"><strong>Position in club:</strong></td><td>'.stripslashes($member[0]['position']).'</td></tr>';
  echo '<tr><td align="right"><strong>Shooting Style:</strong></td><td>'.stripslashes($member[0]['style']).'</td></tr>';
  echo '<tr><td align="right"><strong>Equipment:</strong></td><td>'.stripslashes($member[0]['equipment']).'</td></tr>';
  echo '<tr><td align="right"><strong>Personal Bests:</strong></td><td>'.stripslashes($member[0]['bests']).'</td></tr>';
  echo '<tr><td align="right"><strong>Quote:</strong></td><td valign=middle>';
  if (sizeof($quotes) > 0) {
	foreach ($quotes as $quote) {
	  echo '"'.stripslashes($quote['quote']).'"<br>';
	}
  }
  echo '</td></tr>';
  echo '</table>';
  echo '</center>';
  echo '</div>';
}


function doChoice() {
  echo '<div style="width:100%">';
  echo '<center>';
  echo '<form action="members06.php" method="post">';
    
  global $db;
  
  $members =& $db->getAll("SELECT * FROM members ORDER BY name ASC");
  
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