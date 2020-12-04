<?php 

function getIdVille($c, $nomVille){
    $sql = "SELECT id FROM villes WHERE villes.nom = '$nomVille'";
    $results = mysqli_query($c,$sql);
    $row = mysqli_fetch_assoc($results);


    if (empty($row)){
        // Ajout dans la bdd si la ville n'y est pas
        ajoutVille($c, $nomVille);

        // On recupere l'id de cette ville nouvellement ajouté
        $sql = "SELECT id FROM villes WHERE villes.nom = '$nomVille'";
        $results = mysqli_query($c,$sql);
        $row = mysqli_fetch_assoc($results);
    }

    return $row["id"];
}

function ajoutVille($c, $nomVille){
    $sql = "INSERT INTO villes (nom) VALUES ('$nomVille');";
    $results = mysqli_query($c,$sql);
}

function ajouteSpot($c, $nomSpot, $idVille){
    $sql = "INSERT INTO spots (nom, idVille) VALUES ('$nomSpot', '$idVille');";
    $results = mysqli_query($c,$sql);
}

function getIdSpot($c, $nomSpot, $idVille){
    $sql = "SELECT id FROM spots WHERE spots.nom = '$nomSpot' AND spots.idVille = '$idVille'";
    $results = mysqli_query($c,$sql);
    $row = mysqli_fetch_assoc($results);

    if (empty($row)){
        // Ajout dans la bdd si le spot n'y est pas
        ajouteSpot($c, $nomSpot, $idVille);

        // On recupere l'id de ce spot nouvellement ajouté
        $sql = "SELECT id FROM spots WHERE spots.nom = '$nomSpot' AND spots.idVille = '$idVille'";
        $results = mysqli_query($c,$sql);
        $row = mysqli_fetch_assoc($results);
    }

    return $row["id"];
}

function ajouteAvis($c, $idUser, $idSpot, $avis, $note, $date, $heureDebut, $heureFin, $duree, $nbBaigneurs, $nbPAN, $nbBateau){
    $idUser = !empty($idUser) ? "'$idUser'" : 'NULL';
    $idSpot = !empty($idSpot) ? "'$idSpot'" : 'NULL';
    $avis = !empty($avis) ? "'$avis'" : 'NULL';
    $note = !empty($note) ? "'$note'" : 'NULL';
    $date = !empty($date) ? "'$date'" : 'NULL';
    $heureDebut = !empty($heureDebut) ? "'$heureDebut'" : 'NULL';
    $heureFin = !empty($heureFin) ? "'$heureFin'" : 'NULL';
    $duree = !empty($duree) ? "'$duree'" : 'NULL';
    $nbBaigneurs = !empty($nbBaigneurs) ? "'$nbBaigneurs'" : 'NULL';
    $nbPAN = !empty($nbPAN) ? "'$nbPAN'" : 'NULL';
    $nbBateau = !empty($nbBateau) ? "'$nbBateau'" : 'NULL';
    $sql = "INSERT INTO avis (idUser, idSpot, avis, note, `date`, heureDebut, heureFin, duree, nbBaigneurs, nbPAN, nbBateau)
            VALUES ($idUser, $idSpot, $avis, $note, $date, $heureDebut, $heureFin, $duree, $nbBaigneurs, $nbPAN, $nbBateau);";
    $results = mysqli_query($c,$sql);
}


function ajouteInfosDepuisForm($c, $nomSpot, $nomVille, $date, $heureDebut, $heureFin, $nbBaigneurs, $nbPAN, $nbBateau, $avis, $note){
    $idUser = $_SESSION['idUser'];
    $idVille = getIdVille($c, $nomVille);

    $idSpot = getIdSpot($c, $nomSpot, $idVille);

    $duree = null;
    if (strtotime($heureFin) < strtotime($heureDebut)) {
        $start_date = $date . ' ' . $heureDebut;
        $date_temp = date('Y-m-d', strtotime($date .' +1 day'));
        $end_date = $date_temp . ' ' . $heureFin;
    } else {
        $start_date = $date . ' ' . $heureDebut;
        $end_date = $date . ' ' . $heureFin;
    }
    $d1 = new DateTime($start_date);
    $d2 = new DateTime($end_date);
    $duree = $d2->diff($d1);
    $duree = $duree->format('%H:%I:00');

    ajouteAvis($c, $idUser, $idSpot, $avis, $note, $date, $heureDebut, $heureFin, $duree, $nbBaigneurs, $nbPAN, $nbBateau);

}
