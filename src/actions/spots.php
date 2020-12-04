<?php
	$tabVilles = recupTabVilles($c);
	if (isset($_GET["ville"])){
		$idVille = $_GET["ville"];
		$tabSpots = recupTabSpots($c, $idVille);
		if (isset($_GET["spot"])){
			$idSpot = $_GET["spot"];
		}
	}
	
