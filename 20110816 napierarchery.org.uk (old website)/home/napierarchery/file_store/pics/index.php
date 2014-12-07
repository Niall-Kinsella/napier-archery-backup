<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
  $path = ".";
  
  if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
      echo '<a href="'.$file.'">'.$file.'<br>';
    }
	closedir($handle);
  } 
  
?>

</body>
</html>