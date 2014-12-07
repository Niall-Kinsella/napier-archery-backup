<? require('/home/napierarchery/inc/inc.php'); ?>

<?
if (!isset($_SESSION['login'])) {
  top("Not Logged In");
  bot();
  exit;
}
?>

<? top("Edit User"); ?>

<?
if (!isset($_GET['display'])) {
  doSelectForm($db);
} elseif ($_GET['stage'] == 1) {
  displayUserDetails($db, $_GET['display']);
} elseif ($_GET['stage'] == 2) {
  saveDetails($db);
}
?>

<?
function doSelectForm($db) {
  $members =& $db->getAll("SELECT * FROM tbl_members");
  if (sizeof($members) > 0) {
    echo '<p>Found ', sizeof($members), ' members. Select a member to edit</p>';
    echo '<table border="1" width="100%">';
	echo '<th>Name</th><th>Matric</th><th>Course</th><th>Non-uni email</th><th>Mobile</th><th>SU Card</th><th>GNAS</th><th>Equipment</th>';
	foreach ($members as $member) {
	  echo '<tr><td align=center><a href="edituser.php?display='.$member['member_id'].'&stage=1">'.stripslashes($member['member_first_name']).stripslashes($member['member_second_name']).'</a>';
	  echo '<br><br><small><a href="addquote.php?member='.$member['memberid'].'">Add quote</a><br><a href="delquote.php?member='.$member['memberid'].'">Del quote</a>';
	  echo '</td><td>'.stripslashes($member['member_matric_no']).'</td><td>'.stripslashes($member['member_course']).'</td><td>'.stripslashes($member['member_non-uni_email']).'</th><td>'.stripslashes($member['member_mobile']).'</td><td>'.stripslashes($member['member_SU_card_no']).'</td><td>'.stripslashes($member['member_GNAS_no']).'</td><td>'.stripslashes($member['member_equipment']).'</td></tr>';
	}
	echo '</table>';
  }
}

function displayUserDetails($db, $member_id) {
  $member =& $db->getAll("SELECT * FROM tbl_members WHERE member_id = ".$member_id);
  echo '<p>Amend member details</p>';
  echo '<form method="post" action="edituser.php?stage=2&display='.$member_id.'">';
  echo '<table>';
  echo '<tr><td>Name:</td><td><input type=text size=30 name=member_first_name value="'.stripslashes($member[0]['member_first_name']).'"></td></tr>';
  echo '<tr><td>Matric:</td><td><input type=text size=30 name=member_matric_no value="'.stripslashes($member[0]['member_matric_no']).'"></td></tr>';
  echo '<tr><td>Course:</td><td><input type=text size=30 name=member_course value="'.stripslashes($member[0]['member_course']).'"></td></tr>';
  echo '<tr><td>Non-uni e-mail:</td><td><input type=text size=30 name=member_non-uni_email value="'.stripslashes($member[0]['member_non-uni_email']).'"></td></tr>';
  echo '<tr><td>Mobile:</td><td><input type=text size=30 name=member_mobile value="'.stripslashes($member[0]['member_mobile']).'"></td></tr>';
  echo '<tr><td>SU Card:</td><td><input type=text size=30 name=member_SU_card_no value="'.stripslashes($member[0]['member_SU_card_no']).'"></td></tr>';
  echo '<tr><td>GNAS:</td><td><input type=text size=30 name=member_GNAS_no value="'.stripslashes($member[0]['member_GNAS_no']).'"></td></tr>';
  echo '<tr><td>Equipment:</td><td><input type=text size=30 name=member_equipment value="'.stripslashes($member[0]['member_equipment']).'"></td></tr>';
  echo '<tr><td></td><td><input type=submit name=submit value="Save"></td></tr>';
  echo '</table>';
  echo '<input type=hidden name=member_id value='.$member_id.'>';
  echo '</form>';
}

function saveDetails($db) {
  $values = array();
  $values['member_first_name'] 	=& $_POST['member_first_name'];
  $values['member_matric_no'] 	=& $_POST['member_matric_no'];
  $values['member_course'] 		=& $_POST['member_course'];
  $values['member_non-uni_email'] 		=& $_POST['member_non-uni_email'];
  $values['member_mobile'] 		=& $_POST['member_mobile'];
  $values['member_SU_card_no'] 	=& $_POST['member_SU_card_no'];
  $values['member_GNAS_no'] 	=& $_POST['member_GNAS_no'];
  $values['member_equipment'] 	=& $_POST['member_equipment'];
  
  echo '<p>Past this...</p>';
  
  $db->autoExecute("tbl_members",$values,DB_AUTOQUERY_UPDATE, "member_id = ".$_POST['member_id']);

if (PEAR::isError($sth)) {
    die($sth->getMessage());
}

  echo '<p>...Check...Member updated successfully, <a href="edituser.php">click here</a> to go back</p>';
}

?>

<? bot(); ?>