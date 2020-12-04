<?php 

//si on n'est pas connecté
if (isset($_SESSION["userLogedIn"]) and !$_SESSION["userLogedIn"]) {
	?>
	<?php
	echo "<section class='form-center'>";
	echo "<h2>Connectez vous</h2>";

	afficheFormSignUp();

	?>
	<p style="text-align: center;margin-bottom:0;">Or</p>
	<button type="button" onclick="location.href='index.php?page=login'">Login</button>
	<?php
	echo "</section>";
}




?>