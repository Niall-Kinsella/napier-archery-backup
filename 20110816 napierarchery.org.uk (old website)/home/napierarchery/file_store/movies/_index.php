<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
  $path = ".";
  $webpath = 'http://www.napierarchery.org.uk/temp/movies/';
  
  if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
      echo '<a href="'.$webpath.$file.'">'.$file.'<br>';
    }
	closedir($handle);
  } 
  
?>

</body>
</html>