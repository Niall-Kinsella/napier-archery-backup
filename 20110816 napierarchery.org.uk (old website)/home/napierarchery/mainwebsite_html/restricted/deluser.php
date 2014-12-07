<? require('/home/napierarchery/inc/inc.php'); ?>

<?
if (!isset($_SESSION['login'])) {
  top("Not Logged In");
  bot();
  exit;
}
?>

<? top("Delete Member"); ?>

<? 
if (!isset($_POST['submit'])) {
  doForm(); 
} else {
  if (!isset($_POST['selUser'])) {
    doForm();
  } else {
    // delete from the db here
	$db->query("DELETE FROM members WHERE memberid = ".$_POST['selUser']);
	@ unlink('/home/napierarchery/mainwebsite_html/images/members/'.$_POST['selUser'].'.gif');
	doForm();
  }
}
?>

<?
function doForm() { 
  global $db;
  
  echo '<div align=center style="width:100%">';
  
  $members =& $db->getAll("SELECT * FROM members");
  
  if (sizeof($members)>0) {
    echo '<form action="deluser.php" method="post">';
    echo '<table width="80%">';
	echo '<th></th><th>Name</th><th>Course</th><th>Position in club</th><th>Style</th>';
	
	foreach ($members as $member) {
	  echo '<tr><td><input type=radio name=selUser value='.$member['memberid'].'></td><td>'.$member['name'].'</td><td>'.$member['course'].'</td><td>'.$member['position'].'</td><td>'.$member['style'].'</td></tr>';
	}
	
	echo '</table>';
	echo '<br><br><input type=submit name=submit value="Delete">';
	echo '</form>';
  }
  
  echo '</div>';
}
?>


<? bot(); ?>