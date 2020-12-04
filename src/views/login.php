<?php 

if (!isset($_SESSION['idUser']) or $_SESSION['idUser']=-1){
	afficheFormMDP();
	//on clear les var de sessions pour eviter tout problème de connection
	unset($_SESSION['username']);
	unset($_SESSION['mail']);
	unset($_SESSION['password']);
}else{
	header("Location: ./index.php?page=home");
}


?>