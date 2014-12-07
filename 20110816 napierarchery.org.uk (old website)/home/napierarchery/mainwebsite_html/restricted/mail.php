<? require ('/home/napierarchery/inc/inc.php'); ?>
<? top("Send Mail"); ?>

<?
if (!isset($_SESSION['login'])) {
  bot();
  exit;
}
?>

<?
if (isset($_POST['submit'])) {
  sendMail($db);
} else {
  doForm();
}
?>

<?
function doForm() {
?>
<div style="width:100%;">
<h3>Send Mail to All Members</h3>
<p>Please note that when you hit the Send button below, the email content will be sent to all current members of the archery club WITHOUT CONFIRMATION.</p>
<p>Why no confirmation I hear you ask? Simply put, you're not silly enough to need it! :)</p>
<table>
<form method="post" action="mail.php">
<tr><td><strong>From:</strong></td><td><input type="text" size="30" name="from">&nbsp;(Enter a valid email address to receive replies)</td></tr>
<tr><td><strong>To:</strong></td><td><input type="text" size="30" name="emails">&nbsp;(Additional email addresses to send to, separated by commas)</td></tr>
<tr><td><strong>Subject:</strong></td><td><input name="subject" type="text" size="50"></td></tr>
<tr><td><strong>E-mail content:</strong></td><td><textarea name="text" cols="70" rows="10"></textarea></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="Send"></td></tr>
</form>
</table>
</div>
<?
}

function sendMail($db) {
  if ($_POST['text'] == "" || $_POST['subject'] == "") {
    echo '<p>Please ensure all form fields are filled in</p>';
	doForm();
	return;
  }
  
  $from =& $_POST['from'];
  
  if ($from == "") {
    $from = 'no-reply@napierarchery.org.uk';
  }
  
  $message =& $_POST['text'];
  $subject =& $_POST['subject'];
  
  $headers = 'From: '.$from."\r\n".'Reply-To: '.$from;
  $message = strip_tags($message);
  $message = stripslashes($message);
  $message = wordwrap($message, 70);
  $message .= "\n\n\n";
  
  for ($i = 0; $i<70; $i++) {
    $message .= '-';
  }
  
  $message .= "\n\nNapier University Archery Club\n\nWebsite: http://www.napierarchery.org.uk/\n\nPresident: president@napierarchery.org.uk\nTreasurer: treasurer@napierarchery.org.uk\nSecretary: secretary@napierarchery.org.uk\n\nNUAC is supported by Burstfire Networks Ltd - http://www.burstfire.net";
  $subject = strip_tags($subject);
  
  $to = '';
  
  $emails =& $db->getAll("SELECT email FROM members");
  
  foreach ($emails as $email) {
    if ($email['email'] != '') {
      $to .= $email['email'].', ';
	}
  }
  
  $to = substr($to,0,strlen($to)-2);
  
  if ($_POST['emails'] != '') {
    $to .= $_POST['emails'];
  }
  
  mail($to,$subject,$message,$headers);
  
  echo '<h3>E-mail Sent</h3><p>The e-mail was sent successfully, <a href="index.php">click here</a> to return to the admin pages</p><p>OR <a href="mail.php">click here</a> to send another email to all members</p>';
  
}

?>

<? bot(); ?>