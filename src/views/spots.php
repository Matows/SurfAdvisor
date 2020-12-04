<?php
if (isset($_GET["ville"])) {
    if (isset($_GET["spot"])){
        afficheAvisSpot($idSpot, $c);

    }else{
        afficheSpotsVille($tabSpots, $idVille);
    }
}else{
    afficheLiensVilles($tabVilles);
}
    

