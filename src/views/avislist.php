<?php
$donnes = [];
$villes = chargeVille($c);
foreach ($villes as $ville) {
    $spots = chargeSpot($c,$ville['id']);
    $donnes[$ville['nom']] = [];
    foreach ($spots as $spot) {
        $liste_avis = chargeAvis($c,$spot['id']);
        $note = calculMoyenne($liste_avis);
        $donnes[$ville['nom']][$spot['nom']] = $note;
    }
    arsort( $donnes[$ville['nom']]);
}
    
echo"<ul>";
foreach($donnes as $ville => $spots) { 
    echo"<li>";
    echo $ville;
    echo"<ul>";
    foreach($spots as $spot => $note) {
        echo"<li>";
        echo $note."/5 - ".$spot;
        echo"</li>";
    }
    echo"</ul>";
    echo"</li>";
}
echo"</ul>";
