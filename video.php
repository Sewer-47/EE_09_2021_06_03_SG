<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styl3.css">
	<title>Video On Demand</title>
</head>
<body>
	<header>
		<div id="leftBanner">
			<h1>Internetowa wypożyczalnia filmów</h1>
		</div>
		<div id="rightBanner">
			<table>
				<tr>
					<th>Kryminał</th>
					<th>Horror</th>
					<th>Przygodowy</th>
				</tr>
				<tr>
					<td>20</td>
					<td>30</td>
					<td>20</td>
				</tr>
			</table>
		</div>
	</header>
	<main>
		<h3>Polecamy</h3><!--h3 powinno byc w divie videos, ale sie sypie-->
		<div id="recommendation" class="videoContainer">
    		<?php
    			require_once 'connection.php';

    			$request = "
    				SELECT id, nazwa, opis, zdjecie FROM produkty WHERE
	    				id LIKE 18 OR
	    				id LIKE 22 OR
	    				id LIKE 23 OR
	    				id LIKE 25
    			";//zapytanie nr. 1
    			printVideos($request);
    		?>
		</div>


		<div id="fantastic" class="videoContainer">
			<h3>Filmy fantastyczne</h3>

    		<?php
    			require_once 'connection.php';

    			$request = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id LIKE 12";//zapytanie nr. 2
    			printVideos($request);
    		?>
		</div>
	</main>
	<footer>
		<form method="POST">
			<label for="videoIndex">Usuń film nr:</label>
			<input type="number" name="videoIndex">
			<input type="submit" value="Usuń film">
		</form>
		<?php 
			require_once 'connection.php';

			if (!empty($_POST['videoIndex'])) {
				$request = "DELETE FROM produkty WHERE id LIKE " . $_POST['videoIndex'];
    			$connection = @new mysqli($host, $user, $password, $database);
    			if ($connection -> connect_errno != 0) {
    				echo "Blad polaczenia db";
    				exit();
    			}
    			$connection -> query($request); 
    			$connection -> close();
			}
		?>
		Strone wykonał: Seweryn
	</footer>
</body>
</html>