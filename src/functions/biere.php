<?php
function getBiere(){
    global $c;
    $tab = [];
    $sql = "select * from bieres";
    $result = mysqli_query($c,$sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    return $tab;
}
function getLike(){
    global $c;
    $tab = [];
    $sql = "select * from likes";
    $result = mysqli_query($c,$sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    return $tab;
}
function afficheFormBieres(){
        ?>
        <section class="form-biere">
            <article>
                <h2>Ajouter une bière</h2>
                <form action="." method="post">
                    <p>
                        <input class='formInput' type="text" name="nom" placeholder="Nom de la bière">
                    </p>
                    <p>
                        <input class='formInput' type="text" name="type" placeholder="Type de bière">
                    </p>
                    <p>
                        <input class='formInput' type="text" name="ingredients" placeholder="Ingrédients">
                    </p>
                    <p>
                        <input class='formInput' type="text" name="brasserie" placeholder="Brasserie">
                    </p>
                    <p>
                        <input class='formInput' type="text" name="prix" placeholder="Prix remportés">
                    </p>
                    <p>
                        <input class='formInput' type="number" name="fermentation" placeholder="Fermentation">
                    </p>
                    <p>
                        <input class='formInput' type="number" name="degre" placeholder="Degré d'alcool">
                    </p>
                    <p>
                        <input type="submit" value="Envoie" name="Drink">
                    </p>
                </form>
            </article>
        </section>
    <?php
}






function estDansSemaine($date){
    $dateAjourdhui = date('Y-m-d');
    $dateFormat=explode('-',$dateAjourdhui);
    $good_format=strtotime ($date);
    if (intval(date('W',$good_format))==intval(date('W',mktime(0,0,0,$dateFormat[1],$dateFormat[2],$dateFormat[0])))){
        $res = True;
    }else{
        $res = False;
    }
    return $res;
}
function nbLikeSemaine($like,$idbiere){
    $cptLike = 0;
    foreach ($like as $key => $value){
        if (estDansSemaine($value['dateLike']) and $value['idbiere']==$idbiere){
            $cptLike++;
        }
    }
    return $cptLike;
}
function nbLikeMois($like,$idbiere){
    $dateNow = new DateTime("now");
    $cptLike = 0;
    foreach ($like as $key => $value){
        $date = new DateTime($value['dateLike']);
        if ($date ->format('m')==$dateNow->format('m') and $value['idbiere']==$idbiere){
            $cptLike++;
        }
    }
    return $cptLike;
}
function nbLikeAnnee($like,$idbiere){
    $dateNow = new DateTime("now");
    $cptLike = 0;
    foreach ($like as $key => $value){
        $date = new DateTime($value['dateLike']);
        if ($date ->format('Y')==$dateNow->format('Y') and $value['idbiere']==$idbiere){
            $cptLike++;
        }
    }
    return $cptLike;
}
function insertMilieuTabSemaine($tab,$valeur,$like,$nombreLikes){
    for ($i=0;$i<count($tab);$i++){
        if ($nombreLikes>=nbLikeSemaine($like,$tab[$i]['id'])){
            $res = $i;
        }
    }
    $tabDebut = array_slice($tab, 0,$res);
    $tabFin = array_slice($tab,$res);
    array_push ($tabDebut, $valeur);
    $tab = array_merge ($tabDebut, $tabFin);
    return $tab;
}
function insertMilieuTabMois($tab,$valeur,$like,$nombreLikes){
    for ($i=0;$i<count($tab);$i++){
        if ($nombreLikes>=nbLikeMois($like,$tab[$i]['id'])){
            $res = $i;
        }
    }
    $tabDebut = array_slice($tab, 0,$res);
    $tabFin = array_slice($tab,$res);
    array_push ($tabDebut, $valeur);
    $tab = array_merge ($tabDebut, $tabFin);
    return $tab;
}
function insertMilieuTabAnnee($tab,$valeur,$like,$nombreLikes){
    for ($i=0;$i<count($tab);$i++){
        if ($nombreLikes>=nbLikeAnnee($like,$tab[$i]['id'])){
            $res = $i;
        }
    }
    $tabDebut = array_slice($tab, 0,$res);
    $tabFin = array_slice($tab,$res);
    array_push ($tabDebut, $valeur);
    $tab = array_merge ($tabDebut, $tabFin);
    return $tab;
}
function topSemaine($bieres,$likes){
    $likeMax = nbLikeSemaine($likes,$bieres[0]['id']);
    $likeMin = nbLikeSemaine($likes,$bieres[0]['id']);
    $top = [];
    foreach ($bieres as $key => $value){
        $nbLike = nbLikeSemaine($likes,$value['id']);
        if ($nbLike<=$likeMax){
            $top[] = $value;
            $likeMax = $nbLike;
        } elseif ($nbLike>=$likeMin){
            array_unshift($top, $value);
            $likeMin = $nbLike;
        } else{
            $top = insertMilieuTabSemaine($top,$value,$likes,$nbLike);
        }
    }
    return $top;
}
function topMois($bieres,$likes){
    $likeMax = nbLikeMois($likes,$bieres[0]['id']);
    $likeMin = nbLikeMois($likes,$bieres[0]['id']);
    $top = [];
    foreach ($bieres as $key => $value){
        $nbLike = nbLikeMois($likes,$value['id']);
        if ($nbLike<=$likeMin){
            $top[] = $value;
            $likeMin = $nbLike;
        } elseif ($nbLike>=$likeMax){
            array_unshift($top, $value);
            $likeMax = $nbLike;
        } else{
            $top = insertMilieuTabMois($top,$value,$likes,$nbLike);
        }
    }
    return $top;
}
function topAnnee($bieres,$likes){
    $likeMax = nbLikeAnnee($likes,$bieres[0]['id']);
    $likeMin = nbLikeAnnee($likes,$bieres[0]['id']);
    $top = [];
    foreach ($bieres as $key => $value){
        $nbLike = nbLikeAnnee($likes,$value['id']);
        if ($nbLike<=$likeMin){
            $top[] = $value;
            $likeMin = $nbLike;
        } elseif ($nbLike>=$likeMax){
            array_unshift($top, $value);
            $likeMax = $nbLike;
        } else{
            $top = insertMilieuTabAnnee($top,$value,$likes,$nbLike);
        }
    }
    return $top;
}
function afficheLikeBouton($idbiere){
    $likeButton= "<button type='button' onclick=\"location.href='./index.php?idbiere=$idbiere'\">like</button>";
    return $likeButton;
}
function affiche($bieres){
	//affichage
	echo "<section>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Nom</th>";
	echo "<th>Type</th>";
	echo "</tr>";
	foreach ($bieres as $key => $value) {
		echo "<tr>";
		echo "<td>" . $value["nom"] ."</td>";
		echo "<td>" . $value["type"] ."</td>";
		echo "<td>" . afficheLikeBouton($value["id"]) ."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</section>";
	
}
function dejaLike($idbiere,$idUser){
    $sql="SELECT * FROM `likes` WHERE likes.idbiere=$idbiere);";
    $tab = [];
    $result = mysqli_query($c,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    $res=False;
    foreach($tab as $key => $value){
        if ($value['idUser']==$idUser){
            $res=True;
        }
    }
    return res;
}
function like($c,$idbiere,$idUser){
    $date = date("Y-m-d");
    //if (!dejaLike($idbiere,$idUser)){
        $sql="INSERT INTO `likes`(`idlike`, `idbiere`, `dateLike`, `idUser`) VALUES (NULL,$idbiere,'$date',$idUser);";
	    mysqli_query($c, $sql); //on fait la requete
    //}  
}
//Top de la semaine
function afficheGlobalTop(){
    $bieres = getBiere();
    $likes = getLike();
    afficheTopSemaine(topSemaine($bieres,$likes));
    afficheTopMois(topMois($bieres,$likes));
    afficheTopAnnee(topAnnee($bieres,$likes));
    
}

function afficheTopSemaine($top){
    echo "<h2>Top semaine</h2>";
    echo"<table>";
    echo"<tr>";
    echo"<td>Classement</td><td>Nom</td><td>Type</td><td>degre</td><td>Nombre de likes</td>";
    echo"</tr>";
    $classement = 1;
    $i = 0;
    while ($i<=count($top)-1 and $i<10) {
        echo"<tr>";
        echo"<td>".$classement."</td>";
        echo"<td>".$top[$i]['nom']."</td>";
        echo"<td>".$top[$i]['type']."</td>";
        echo"<td>".$top[$i]['degre']."</td>";
        echo"<td>".nbLikeSemaine(getLike(),$top[$i]['id'])."</td>";
        echo"</tr>";
        $classement = $classement +1;
        $i++;
        }
        echo"</table>";
}
function afficheTopMois($top){
    echo "<h2>Top mois</h2>";
    echo"<table>";
    echo"<tr>";
    echo"<td>Classement</td><td>Nom</td><td>Type</td><td>degre</td><td>Nombre de likes</td>";
    echo"</tr>";
    $classement = 1;
    $i = 0;
    while ($i<=count($top)-1 and $i<10) {
        echo"<tr>";
        echo"<td>".$classement."</td>";
        echo"<td>".$top[$i]['nom']."</td>";
        echo"<td>".$top[$i]['type']."</td>";
        echo"<td>".$top[$i]['degre']."</td>";
        echo"<td>".nbLikeMois(getLike(),$top[$i]['id'])."</td>";
        echo"</tr>";
        $classement = $classement +1;
        $i++;
        }
        echo"</table>";
}
function afficheTopAnnee($top){
    echo "<h2>Top année</h2>";
    echo"<table>";
    echo"<tr>";
    echo"<td>Classement</td><td>Nom</td><td>Type</td><td>degre</td><td>Nombre de likes</td>";
    echo"</tr>";
    $classement = 1;
    $i = 0;
    while ($i<=count($top)-1 and $i<10) {
        echo"<tr>";
        echo"<td>".$classement."</td>";
        echo"<td>".$top[$i]['nom']."</td>";
        echo"<td>".$top[$i]['type']."</td>";
        echo"<td>".$top[$i]['degre']."</td>";
        echo"<td>".nbLikeAnnee(getLike(),$top[$i]['id'])."</td>";
        echo"</tr>";
        $classement = $classement +1;
        $i++;
        }
        echo"</table>";
}
?>
