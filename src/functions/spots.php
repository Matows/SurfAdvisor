<?php
	function recupTabVilles($c){
		$sql = "SELECT * FROM villes";
		$results = mysqli_query($c,$sql);
		$tabVilles = array();
		while($row = mysqli_fetch_assoc($results)){
			$id = $row["id"];
			$tabVilles[$id] = $row["nom"];
		}

		return $tabVilles;
	}
	function afficheLiensVilles($tabVilles){
		foreach ($tabVilles as $idVille => $ville) {
			echo "<h1><a href='index.php?page=spots&ville=$idVille'>$ville</a></h1>";
		}

	}

	function recupTabSpots($c, $idVille){
		$sql = "SELECT * FROM spots WHERE spots.idVille = '$idVille'";
		$results = mysqli_query($c,$sql);
		$tabSpots = array();
		while($row = mysqli_fetch_assoc($results)){
			$id = $row["id"];
			$tabSpots[$id] = $row["nom"];
		}

		return $tabSpots;
	}

	function afficheSpotsVille($tabSpots, $idVille){
		foreach ($tabSpots as $idSpot => $spot) {
			echo "<h1><a href='index.php?page=spots&ville=$idVille&spot=$idSpot'>$spot</a></h1>";
		}

		
	}

	function getSpotName($c, $idSpot){
		$sql="SELECT spots.nom FROM spots WHERE spots.id = '$idSpot';";
    	$result =  mysqli_query($c, $sql);
    	$row = mysqli_fetch_assoc($result);
    	return $row["nom"];
	}

	function afficheAvisSpot($idSpot, $c){
		$sql = "SELECT * FROM avis WHERE avis.idSpot = '$idSpot' ORDER BY avis.note DESC";
		$results = mysqli_query($c,$sql);
		echo "<table>";
		echo "<tr><th>Utilisateur</th><th>Spot/plage</th><th>avis</th><th>note</th><th>date</th><th>Heure</th><th>Nombre de baigneurs</th><th>Nombre de Bateaux</th></tr>";
		while($row = mysqli_fetch_assoc($results)){
			$idUser = $row["idUser"];
			$userName = getUserName($c, $idUser);
			$idSpot = $row["idSpot"];
			$spotName = getSpotName($c, $idSpot);
			$avis = $row["avis"];
			$note = $row["note"];
			$date = $row["date"];
			$heure = $row["heureDebut"];
			$nbBaigneurs = $row["nbBaigneurs"];
			$nbBateaux = $row["nbBateau"];
			echo "<tr>";
			echo "<td>$userName</td><td>$spotName</td><td>$avis</td><td>$note</td><td>$date</td><td>$heure</td><td>$nbBaigneurs</td><td>$nbBateaux</td>";
			echo "</tr>";
		}
		echo "</table>";

	}
