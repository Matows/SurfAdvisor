<?php
//ajouteAvis($c, '21', '10', "bof bof bof", '1', "", '', '', '', '', '', '');
?>
<form action="index.php" method="POST">
    <h2>Identification de la séance</h2>
    <label for="nomSpot">Nom du spot/plage :</label>
    <input type="text" name="nomSpot" required>
    <br/>
    
    <label for="villeSpot">Ville du spot</label>
    <input type="text" name="villeSpot" required>
    <br/>

    <label for="date">Date :</label>
    <input type="date" name="date">
    <br/>

    <label for="heureDebut">Heure de debut de votre la séance :</label>
    <input type="time" name="heureDebut">
    <br/>

    <label for="heureFin">Heure de fin de votre la séance :</label>
    <input type="time" name="heureFin">
    <br/>

    <label for="nbBaigneurs">Nombre de baigneurs aprecus durant la séance :</label>
    <input type="number" name="nbBaigneurs" min="0">
    <br/>

    <label for="nbPAN">Nombre de pratiquants d'activité nautique (Paddle, planche a voile...) :</label>
    <input type="number" name="nbPAN" min="0">
    <br/>

    <label for="nbBateau">Nombre de bateau :</label>
    <input type="number" name="nbBateau" min="0">

    <h2>Votre avis sur ce spot :</h2>

    <label for="avis">Votre avis sur le spot :</label>
    <textarea name="avis" rows="5" cols="40"></textarea>
    <br/>

    <label for="note">Note du spot (note entre 1 et 5)</label>
    <input type="number" name="note" min="1" max="5" required>
    <br/>

    <input type="submit" name="Envoie" value="Envoyer">

</form>
