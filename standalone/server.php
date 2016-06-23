<?php

header('Content-Type: application/json');

$content = isset($_POST['content']) && !empty($_POST['content']) ? $_POST['content'] : null;

if(!$content) :
	$response = json_encode(array('success' => false, 'response' => ''));
	die($response);
endif;

$responseHtml = '';

// A) if $toSearch appears 3 or more times
$toSearch = 'apple';
$occurences = 3;

$imageThreeOrLess = 'http://projects.michaelolukoya.uk/pmg/3lessapples.png';
$imageMoreThanThree = 'http://projects.michaelolukoya.uk/pmg/morethan3apples.png';

$count = preg_match_all("/$toSearch/", $content, $matches);

if($count > $occurences) {
	$imageToShow = $imageMoreThanThree;
} else {
	$imageToShow = $imageThreeOrLess;
}

$responseHtml .= '<div class="image-to-show">';
$responseHtml .= '<h2>Image To Display</h2>';
$responseHtml .= '<img src="'.$imageToShow.'">';
$responseHtml .= '</div>';

// /A)

// B) check for keywords from db and display its pair
require 'db.php';

$q = $mysqli->query("SELECT `A`, `B` FROM pmg_keywords");
$keywords = array();

while ($row = $q->fetch_assoc()) {
	$keywords[$row['A']] = $row['B'];
}

$mostOccurences = array('count' => 0);

foreach($keywords as $k => $v) {
	$count = preg_match_all("/$k/", $content, $matches);

	if($count === $mostOccurences['count'] && $mostOccurences['count'] !== 0) {
		// if more than one keyword has the most & same amount of occurences then append to array
		$mostOccurences[] = array('keyword' => $k, 'pair' => $v, 'count' => $count); 
	} elseif($count > $mostOccurences['count']) {
		$mostOccurences = array('keyword' => $k, 'pair' => $v, 'count' => $count);
	}
}

if($mostOccurences['count'] === 0) {
	die(json_encode(array('success' => true, 'response' => $responseHtml)));
}

$responseHtml .= '<br><br>';

$responseHtml .= '<div class="keyword-count">';
$responseHtml .= '<h2>Keywords from database with most occurences found:</h2>'; 

if(isset($mostOccurences[0]) && is_array($mostOccurences[0])) {
	for($i=0; $i<count($mostOccurences); $i++) {
		$responseHtml .= 'The keyword that occured the most was \'<strong>' . $mostOccurences[$i]['keyword'] . '</strong>\' and it\'s pair is \'<strong>' . $mostOccurences[$i]['pair'] . '</strong>\'. It occured <strong>' . $mostOccurences[$i]['count'] . '</strong> times.';
		$responseHtml .= '</div>';
	}
} else {
	$responseHtml .= 'The keyword that occured the most was \'<strong>' . $mostOccurences['keyword'] . '</strong>\' and it\'s pair is \'<strong>' . $mostOccurences['pair'] . '</strong>\'. It occured <strong>' . $mostOccurences['count'] . '</strong> times.';
	$responseHtml .= '</div>';
}

// /B)


$response = json_encode(array('success' => true, 'response' => $responseHtml));
die($response);