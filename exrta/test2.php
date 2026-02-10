<?php
// require __DIR__ . "/src/lastfm.api.php";
// require __DIR__ . "/config.php";

// set api key
CallerFactory::getDefaultCaller()->setApiKey("7ba6e4f9197f891b281f98ece1dcb191");

// search for the Coldplay band
$artistName = "Coldplay";
$limit = 1;
$results = Artist::search($artistName, $limit);

echo "<ul>";
while ($artist = $results->current()) {
    echo "<li><div>";
    echo "Artist URL: " . $artist->getUrl() . "<br>";
    echo '<img src="' . $artist->getImage(4) . '">';
    echo "</div></li>";

    $artist = $results->next();
}
echo "</ul>";