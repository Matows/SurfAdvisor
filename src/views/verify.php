<?php

if (!isset($_GET["link"])){
	echo "<p class='verify'>Nous vous avons envoyé un mail, veuillez vérifier votre boîte mail pour confirmer votre inscription.</p>";
}elseif (isset($_GET["link"]) and keyvalid($c,$_GET["link"])) {
	setUserVerified($c,$_GET["link"]);
	echo "<p class='verify'>Compte validé !</p>";
	header( "refresh:5;url=./index.php?page=login" );

}elseif (isset($_GET["link"]) and !keyvalid($c,$_GET["link"])) {
	header("Location: ./index.php?page=login");
}
?>
