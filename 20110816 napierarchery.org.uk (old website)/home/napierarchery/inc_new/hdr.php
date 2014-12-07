<html>
  <head>
  <head>
<meta name="description" content="The Official Website of Napier University Archery Club">
<meta name="keywords" content="archery, university archery, university clubs, university archery club, archery club, BUSA outdoors, BUSA indoors, SUS league, SUS league matches, SUSF, archery competitions, napier archery club, napier university archery club, NUAC, napier university ac, uni archery, napier uni archery club, uni archery club">
    <title>Napier University Archery Club - <? echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="/archery.css">
  </head>

  <body>
  
    <div class="titlebar">
	  <h1>Napier University Archery Club</h1>
      <div align="center" class="target">
	  <br>
	  <br>
		<br>
		<font class="titlefont"><? echo $title; ?></font>
		<br>
		<br>
		<br>
	    <br>
	  </div>
	  
    </div>
	
	<div class="topleft">
	   <img src="/images/Logo4.png" alt="Napier Uni Archery Club logo" height="150" width="150" align="middle">
	   <br>
	   <br>
	   <br>
	   <?
	     if (isset($_SESSION['login'])) {
		   echo '<br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/restricted/index.php">Admin Pages</a>&nbsp;<small><a href="/restricted/logout.php">(Log out)</a></small>';
		 }
	  ?>
	        <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/index.php">Home</a>
      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/sponsors.php">Sponsors</a>
	  <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/joinus.php">Join us!</a>
      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/contact.php">Contact NUAC</a>
      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/membersselect.php">Club Members</a>
<!--      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/diary.php">Diary</a>    -->
      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/competitions.php">Competitions</a>
      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/results.php">Results</a>
      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/gallery.php">Image Gallery</a>
      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/movies.php">Movie Gallery</a>
      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/records.php">Club Records</a>
      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/archives.php">Archives</a>
	  <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/usefuldocs.php">Useful Documents</a>
<!--	  <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/chicken.php">The Chicken</a>    -->
      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="/links.php">Links</a>
<!--      <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="http://napierarchery.proboards56.com/index.cgi" target="_msgboard">Message board</a> -->
	  <br><img src="/images/menulogo_20.jpg" height="15" width="15">&nbsp;<a href="http://www.facebook.com/group.php?gid=2322395944" target="_new">Our Facebook</a>
	  <br>

	  <br><br><br><br>
	  <a href="http://www.burstfire.net" target="_new"><img src="/images/poweredby.gif" alt="Burstfire Networks Limited" border="0"></a>
	  
	  </div>
	
	<div class="content">