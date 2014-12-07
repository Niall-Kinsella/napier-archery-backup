<? require ('/home/napierarchery/inc/inc.php'); ?>
<? top("Our Potential Club Mascot"); ?>

<? 
$questionCount =& $db->getAll("SELECT * FROM chicken");
$numQuestions = sizeof($questionCount);
?>
   
<div style="width:100%;">
  <center>
    <h3>The Chicken of Truth</h3>
	<p>The wise chicken knows many many things, anything you care to ask he can answer truthfully (as long as the answer is either yes or no!)... if he wants to! Many people have asked the chicken questions, and he has answered <? echo $numQuestions; ?> so far! In addition, he's thread safe, so ask him as many concurrent questions as you like! (if you don't know, don't ask!)</p>
	 <img src="/images/thechicken.jpg" alt="The shiny chicken of truth" width="130" height="222" align="absmiddle"><strong>is powered by&nbsp;</strong><img src="/images/hensip.jpg" alt="Hensip for bird flu" width="160" height="222" hspace="10" vspace="10" align="absmiddle"><strong>&nbsp;putting the "lets" back into "giblets"</strong>
	<br>
	  <form action="chicken.php" method="post">
	    <input name="question" type="text" size=50>&nbsp;
	    <input type="submit" name="submit" value="Ask the Chicken">
	  </form>
  <?
  showAnswer($db);
  showQuestions($db);
  ?>
  
  </center>
</div>


<?
function showAnswer($db) {
  global $REMOTE_ADDR;
  if(isset($_POST['question']) && $_POST['question'] != "") {
  
    echo '<h3>'.stripslashes(strip_tags($_POST['question'])).'</h3>';
  
    $md5 = md5($_POST['question']);
	
	$yesArray = array("yes!!!!!",
						"well duh!",
						"of course!",
						"yes, but you have much to learn",
						"actually, yeah!",
						"yeah baby yeah!",
						"the flowers are flowering, the bees are buzzing, and it is a good day for an affirmative! (yes!)",
						"why of course",
						"in the words of Shakespeare, 'Yes'",
						"according to my handbook, the answer's yes!",
						"why do you have to ask? yep!",
						"zzzzzZZZZZZZ",
						"abraca-duh! You have to ask?",
						"Och aye",
						"Indeedio",
						"Yes indeed my feathered friend",
						"huh? what? erm, yes, and leave me be",
						"Oh yessssss",
						"Woop woop - affirmative alert",
						"is the pope a catholic?",
						"Yes, that's what happens when you fight a guy in the alps...",
						"Yeah but");
						
	$noArray = array("er, no",
						"course not!",
						"pfft, yeah right",
						"in the words of Bill Clinton, no!",
						"ye.. ye... yea.... no!",
						"zzzzzZZZZZZ",
						"a big, fat, squeaky, NO!",
						"nahhhhhh",
						"I think not baby puppy",
						"no, but buying me some rizlas may change that answer",
						"as my mother always used to say, no",
						"you WHAT?! Heck no!",
						"don't be daft, no way",
						"no!!!",
						"Negative, soldier! Back to work!",
						"There's about as much chance of me saying yes as there is of me buying Chicken Tonight!",
						"you're a smoothy, but alas, the answer's no!",
						"buy me another drink, elmo",
						"Please insert another coin to continue (no)",
						"not for you, not for anyone!",
						"Pah, chickenfeed!",
						"No way! Don't touch me there either!",
						"No, bite my yellow feathered ass!",
						"no but");
	
	shuffle($yesArray);
	shuffle($noArray);
	
	$loop = strlen($md5);
	
	$totalVal = 0;
	
	for ($i=0; $i<$loop; $i++) {
	  $totalVal= $totalVal + ((int)$md5[$i]);
	}
	
	$answer = "";

   

	if ($totalVal%2 == 0) {
	  $answer = $yesArray[rand(0,sizeof($yesArray))];
	} else {
	  $answer = $noArray[rand(0,sizeof($noArray))];
	}
	
	if (profanityCheck($_POST['question']) === false) {
	  echo '<h3>Chicken says.... '.$answer.'</h3>';
	  
	  // safe to put in db, it isnt rude
	  $values = array();
      $values['question'] =& $_POST['question'];
	  $values['host'] = gethostbyaddr($REMOTE_ADDR);
	  $values['timestamp'] = time();
	  $values['answer'] =& $answer;
	
	  $db->autoExecute("chicken",$values,DB_AUTOQUERY_INSERT);
	} else {
	  echo '<h3>Chicken says.... don\'t be so bloody rude!</h3>';
	}
  }
}

function showQuestions($db) {
  $questions =& $db->getAll("SELECT * FROM chicken ORDER BY timestamp DESC");
  $lastFive = array();
  
  for($i=0; $i<5; $i++) {
    $lastFive[$i] = $questions[$i];
  }
  
  shuffle($questions);
  
  echo '<table style="width:100%">';
  echo '<th>Five random questions asked of the chicken <a href="chicken.php">see more...</a></th><th>The last five questions asked of the chicken</th>';
  
  for ($i=0; $i<5; $i++) {
    echo '<tr><td>'.stripslashes(strip_tags($questions[$i]['question'])).' - <i>'.stripslashes($questions[$i]['answer']).' ['.date("g:i a o\\n j-n-y",$questions[$i]['timestamp']).']</i></td><td>'.stripslashes(strip_tags($lastFive[$i]['question'])).' - <i>'.stripslashes($lastFive[$i]['answer']).' ['.date("g:i a o\\n j-n-y",$lastFive[$i]['timestamp']).']</i></td></tr>';
  }
  
  echo '</table>';
}

function profanityCheck($string) {
  $swearWords = file('/home/napierarchery/inc/swear.txt');
  $stringUpper = strtoupper($string);
  $testArray = explode(" ",$stringUpper);
  
  foreach ($testArray as $word) {
    foreach ($swearWords as $swear) {
	  if (trim($swear,"\n") == $word) {
	    return true;
	  }
	}
  }
  return false;
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