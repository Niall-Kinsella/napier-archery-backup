<? require('/home/napierarchery/inc/inc.php'); ?>

<?
if (!isset($_SESSION['login'])) {
  top("Not Logged In");
  bot();
  exit;
}
?>

<? top("Delete Quote"); ?>

<?
if (!isset($_POST['quoteid'])) {
  doForm($db,$_GET['member']);
} else {
  deleteQuote($db,$_POST['quoteid']);
  doForm($db,$_GET['member']);
}
?>

<?
function doForm($db,$memberid) {
  $quotes =& $db->getAll("SELECT * FROM quotes WHERE memberid = ".$memberid);
  $name =& $db->getAll("SELECT name FROM members WHERE memberid = ".$memberid);
  
  if (sizeof($quotes) > 0) {
    echo '<h3>Select one of '.$name[0]['name']."'s quotes to delete</h3>";
  
    echo '<table>';
    echo '<form action="delquote.php?member='.$memberid.'" method=post>';
    foreach ($quotes as $quote) {
      echo '<tr><td><input type=radio name=quoteid value='.$quote['quoteid'].'></td><td>'.$quote['quote'].'</td></tr>';
    }
    echo '<tr><td></td><td><input type=submit name=submit value="Delete"></td></tr>';
    echo '</form>';
    echo '</table>';
  } else {
    echo '<h3>'.$name[0]['name'].' currently has no quotes</h3>';
	echo '<p>Please <a href="addquote.php?member='.$memberid.'">click here</a> to add a quote</p>';
  }
}

function deleteQuote($db, $quoteid) {
  $db->query("DELETE FROM quotes WHERE quoteid = ".$quoteid);
}

?>

<? bot(); ?>