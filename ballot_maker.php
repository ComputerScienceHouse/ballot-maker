<?php

$ballotTitle = (array_key_exists("title", $_POST)) ? $_POST["title"] : "";
$ballotTitle = "<p><b>".$ballotTitle."</b></p>";
$textTmp = (array_key_exists("body", $_POST)) ? $_POST["body"] : "";
$textTmp = str_replace(array("<br/>", "<br>"), "\n", $textTmp);
$textTmp = implode("&nbsp;&nbsp;", explode("  ", $textTmp));
$textTmp = str_replace(array('\'', '\\\''), "&apos;", $textTmp);
$textTmp = str_replace(array('\"', '\\\"'), "&quot;", $textTmp);
$textTmp = str_replace(array('’', '\\\’'), "&apos;", $textTmp);
$textTmp = str_replace("…", "&#8230;", $textTmp);
$ballotText = nl2br($textTmp);
$ballotVote = (array_key_exists("vote", $_POST)) ? "<p><b>Vote: &quot;YES&quot; or &quot;NO&quot; (Circle One)</b></p>" : "";
$numBallots = (array_key_exists("num", $_POST)) ? (int) $_POST["num"] : 60;

$pokemonFile = fopen("pokemon.csv", "r");
$pokemon = array();
while(!feof($pokemonFile)) {
   $pokemon[] = fgetcsv($pokemonFile);
}
fclose($pokemonFile);
array_shift($pokemon);

// Function for printing ballots
function printBallots($title, $text, $vote, $num, $pokemon) {
	$html = "<div id='ballots'>";
	//$html .= "<h1>Fuck You, Tal</h1>";
  for($i = 0; $i < $num; $i++) {
		$html .= "<div class='ballot'>";
	  //$hash = "<p><b>SHA1:</b><i> ".hash("sha1", time().rand())."</i></p>";
	  $hash = "<p><b>Your Pok&eacute;mon is:</b> #".$pokemon[$i][0]." ".ucfirst($pokemon[$i][1])."</p>";
    $html .= $title.$text.$vote.$hash;
		//$html .= $title.$text.$hash;
		$html .= "<hr/>";
    $html .= "</div>";
	}
	$html .= "</div>";
	return $html;
}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Ballots!</title>
	<style type="text/css">
		* {
			box-sizing: border-box;
		  font-family: monospace;
    }

/*
    #ballots {
      max-width: 1280px;
      margin: auto;  
    }
*/
		.ballot {
			width: 50%;
			float: left;
			padding: 5px;
			font-size: .9em;
			page-break-inside: avoid;
			page-break-before: always;
		}

		@media print {
			body { margin: 0; padding: 0; font-size: .5em; }
		}
	</style>
</head>
<body>
	<?php echo printBallots($ballotTitle, $ballotText, $ballotVote, $numBallots, $pokemon); ?>
</body>
</html>
