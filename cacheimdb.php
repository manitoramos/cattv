<?php
	$imdb = "tt0460681";
	//$cacheimdb = file_get_contents("http://www.omdbapi.com/?i=". $imdb ."&plot=full&apikey=b13d4ac4");
	//$open = fopen("assets/cacheimdb/{$imdb}.json", "w+");
	//fwrite($open, $cacheimdb);
	//fclose($open);


	$trying = json_decode(file_get_contents("http://www.omdbapi.com/?i=". $imdb ."&apikey=b13d4ac4"));

	echo $trying->Title;
	echo "<br>";
	echo $trying->Ratings[0]->Source;
?>