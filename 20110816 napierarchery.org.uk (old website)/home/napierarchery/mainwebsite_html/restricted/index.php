<? require('/home/napierarchery/inc/inc.php'); ?>
<? top("Admin Area"); ?>

<?
if (isset($_POST['submit'])) { // attempted log in
  // if we like the login, set $_SESSION['login'] here
  $login =& $db->getAll("SELECT * FROM admins WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'");
  if (sizeof($login) > 0) {
    //log in!
	$_SESSION['login'] = true;
  } else {
    echo '<div align=center width="100%" style="width:100%"><font color=#FF0000>Wrong username or password supplied</font></div>';
  }
}

if (!isset($_SESSION['login'])) {
  login();
} else {
  display();
}
?>

<?
function display() {
?>
<p>Welcome to the website admin area from which you can edit and revise the site's current content, please select a function from the list below.</p>
<table>
  <th>Members</th><th>News</th><th>Calendar</th><th>Webby Admin</th><th>Gallery</th><th>Log out</th>
  <tr>
  <td><a href="adduser.php">Add a new member</a></td>
  <td><a href="addnews.php">Add newwwwws</a></td>
  <td><a href="adddiary.php">Add a diary event</a></td>
  <td><a href="chickenbrain.php">Inside the Chicken's Brain</a></td>
  <td><a href="newgallery.php">Start a new gallery</a></td>
  <td><a href="logout.php">Young people, please, Elvis has left the building...</a></td>
  </tr>
   
  <tr>
  <td><a href="edituser.php">Edit a member</a></td>
  <td><a href="delnews.php">Delete a newwwws item</a></td>
  <td><a href="deldiary.php">Delete a diary event</a></td>
  <td><a href="hits.php">View hits</a></td>
  <td><a href="addimage.php">Add a new image to an existing gallery</a></td>
  </tr>
  
  <tr>
  <td><a href="deluser.php">Delete a member</a></td>
  <td></td>
  <td></td>
  <td></td>
  <td><a href="delimage.php">Delete image from existing gallery</a></td>
  <td></td>
  </tr>
  
  <tr>
  <td><a href="mail.php">E-mail all members</a></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  </tr>
  
  
  
</table>
<? } ?>

<?
function login() {
?>
<div align="center" style="width:100%"; width="100%">
<p>Welcome to the website administration area, please log in below.</p>
<form action="index.php" method="post">
  <table>
    <tr><td>Username:</td><td><input type=text size="20" name=username></td></tr>
    <tr><td>Password:</td><td><input type=password size="20" name=password></td></tr>
  </table>
  <input type="submit" name="submit" value="Log in">
</form>
</div>
<? } ?>
<? bot(); ?>