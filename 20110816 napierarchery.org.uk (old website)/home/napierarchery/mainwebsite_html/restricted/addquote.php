<? require('/home/napierarchery/inc/inc.php'); ?>
<? top("Add Quote"); ?>

<? 
if (!isset($_SESSION['login'])) {
  bot();
  exit;
}
?>

<?
if (!isset($_POST['quote'])) {
  doForm($db,$_GET['member']);
} else {
  addQuote($db,$_POST['quote']);
}
?>

<?
function doForm($db,$memberid) {
  $quotes =& $db->getAll("SELECT quote FROM quotes WHERE memberid = ".$memberid);
  $name =& $db->getAll("SELECT name FROM members WHERE memberid = ".$memberid);
  
  echo '<h3>Add a quote for '.$name[0]['name'].'</h3>';
  echo '<form action="addquote.php?member='.$memberid.'" method="post">';
  echo 'Quote:&nbsp;<input type=text name=quote size=30><input type=submit name=submit value="Save">';
  echo '</form>';
  
  if (sizeof($quotes) > 0) {
    echo '<br><br>';
  
    echo '<h3>Current Quotes</h3>';
    echo '<ul>';
	
    foreach ($quotes as $quote) {
      echo '<li>'.stripslashes($quote['quote']).'</li>';
    }
  
    echo '</ul>';
  }
}

function addQuote($db,$quote) {
  $values = array();
  $values['memberid'] = $_GET['member'];
  $values['quote'] = $quote;
  $db->autoExecute("quotes",$values,DB_AUTOQUERY_INSERT);
  
  echo '<p>Quote saved successfully, <a href="addquote.php?member='.$_GET['member'].'">click here</a> to add another for this user</p>';
  echo '<p>Or <a href="edituser.php">click here</a> to return to the edit users page</p>';
}
?>

<? bot(); ?>
