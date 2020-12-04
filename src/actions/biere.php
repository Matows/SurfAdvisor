<?php
if (isset($_POST) and isset($_POST["Drink"])) {
    $n = htmlspecialchars($_POST["nom"], ENT_QUOTES);
    $t = htmlspecialchars($_POST["type"], ENT_QUOTES);
    $i = htmlspecialchars($_POST["ingredients"], ENT_QUOTES);
    $br = htmlspecialchars($_POST["brasserie"], ENT_QUOTES);
    $p = htmlspecialchars($_POST["prix"], ENT_QUOTES);
    $f = htmlspecialchars($_POST["fermentation"], ENT_QUOTES);
    $d = htmlspecialchars($_POST["degre"], ENT_QUOTES);

    $sql = "INSERT INTO bieres(id, nom, type, ingredients, brasserie, prix, fermentation, degre, nbLike) VALUES (NULL, '$n', '$t', '$i', '$br','$p','$f','$d','0');";
    $result = mysqli_query($c, $sql);

	header("Location: index.php?page=allBiere");
}

if (isset($_GET) && isset($_GET["idbiere"]) && $_SESSION['userLogedIn']) {

	like($c,$_GET["idbiere"],$_SESSION["idUser"]);
	header("Location: index.php?page=allBiere");
}
