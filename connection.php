<?php

$database = "dane3";
$user = "root";
$password = "";
$host = "localhost";

function printVideos($request) {
	global $database, $user, $password, $host;
    $connection = @new mysqli($host, $user, $password, $database);
    if ($connection -> connect_errno != 0) {
    	echo "Blad polaczenia db";
    	exit();
    }
    $result = $connection -> query($request);
    while ($row = mysqli_fetch_array($result)) {
    	echo "<div class = 'video'>";
    	echo "<h4>" . $row['id'] . ". " . $row['nazwa']  . "</h4>";
    	echo "<img src='img/" . $row['zdjecie'] . "' alt='film'>";
    	echo "<p>" . $row['opis'] . "</p>";
    	echo "</div>";
    }
	$connection -> close();
}

?>


