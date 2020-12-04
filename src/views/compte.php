<?php 
if (isset($_SESSION["userLogedIn"]) and $_SESSION["userLogedIn"] ){
	?>
	<h2>Votre Profil</h2>
	<?php 
	echo "<p>Votre pseudo : ".getUsername($c,$_SESSION["idUser"]) . "</p>";
	echo "<p>Votre email : ".getmail($c,$_SESSION["idUser"]) . "</p>";
	?>
	<h3>Two beer or not to beer</h3>
	<button type="button" onclick="location.href='index.php?page=allBiere'">Voter pour une bière</button>
	<button type="button" onclick="location.href='index.php?page=topBiere'">Top des Bières</button>
	<button type="button" onclick="location.href='index.php?page=beerpong'">BeerPong</button>
	<button type="button" onclick="location.href='index.php?page=avislist'">Spots</button>
	<button type="button" onclick="location.href='https://www.youtube.com/watch?v=cBCVu0liXNI&feature=youtu.be'">Meme Ubisoft</button>

	<h3>Déconnexion</h3>
	<button type="button" onclick="location.href='index.php?logout=true'">Logout</button>
	<?php
}
?>