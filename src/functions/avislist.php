<?php
function chargeSpot($c,$id){
    //requete
	$sql="SELECT * FROM spots WHERE spots.idVille = $id";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	return $tableau;
}

function chargeAvis($c,$idSpot){
    //requete
	$sql="SELECT * FROM avis WHERE avis.idSpot = $idSpot ORDER BY avis.note DESC";
	$result=  mysqli_query($c, $sql);

    $tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
        $tableau[] = $row;
    }
	return $tableau;
}

function chargeVille($c){
    //requete
	$sql="SELECT * FROM villes";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	return $tableau;
}

function calculMoyenne($liste){
    $somme = 0;
    $cpt = 0;
    foreach ($liste as $row) {
        $somme = $somme + $row['note'];
        $cpt = $cpt +1;
    }
    return round($somme/$cpt,1);
}
