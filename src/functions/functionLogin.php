<?php
//charge les utilisateurs
function chargeusers($c){
	//requete
	$sql="SELECT * FROM users";
	$result=  mysqli_query($c, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}
	return $tableau;
}

//verifie si user existe 
function isuser($users,$user){
	$exist=false;
	foreach ($users as $id => $userdata) {
		if ($user==$userdata["username"]) {
			$exist=true;
		}
	}
	return $exist;
}

function getUserID($c,$user){
	$sql="SELECT users.id FROM users WHERE users.username = '$user';";
    $result =  mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row["id"];
}

function getUsername($c,$id){
	$sql="SELECT users.username FROM users WHERE users.id = '$id';";
    $result =  mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row["username"];
}

function getmail($c,$id){
	$sql="SELECT users.mail FROM users WHERE users.id = '$id';";
    $result =  mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row["mail"];
}

//verifie si l'adresse mail n'est pas déjà  utilisée
function mailIsValid($users,$mail){
	$dontexist=true;
	foreach ($users as $id => $userdata) {
		if ($mail==$userdata["mail"]) {
			$dontexist=false;
		}
	}
	return $dontexist;
}

//recupérer le password de user
function getpassword($users,$user){
	foreach ($users as $id => $userdata) {
		if ($user==$userdata["username"]) {
			$password=$userdata["password"];
		}

	}
	return $password;
}

function keyvalid($c,$key){
	$sql="SELECT * FROM users WHERE users.verifcode = '$key';";
	$result =  mysqli_query($c, $sql);
    $valid = false;
    if ($result!=false){
    	$user = mysqli_fetch_assoc($result);
    	$valid=$user["isVerified"]==0;
    }
    return $valid;

}

function setUserVerified($c,$key){
	$sql = "UPDATE `users` SET `isVerified` =1 WHERE `users`.`verifcode` = '$key';";
	$result =  mysqli_query($c, $sql);
}

function userVerifiedMail($c,$id){
	$sql="SELECT users.isVerified FROM users WHERE users.id = '$id';";
    $result =  mysqli_query($c, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row["isVerified"]==1;
}

function insertUser($c,$username,$mail,$hash){
	// on créer la clef de vérification
	$key=crypt($username.$mail,"xxxxxxxxxxxxxxxxxxxxxxx");
	$sql="INSERT INTO `users` (`id`,`username`,`mail`,`password`, `verifcode`,`isVerified`) VALUES (NULL,'$username','$mail','$hash','$key',0);";
	var_dump($sql);
	mysqli_query($c, $sql); //on fait la requete
	sendmail($mail,$username,$key);

}
function afficheUserChamp($loginForm){
	//si il y a une erreur dans le champ
	if (isset($_SESSION["username"]) && $_SESSION["username"]=='error'){
		if ($loginForm){
			echo "<p>Ce pseudo n'existe pas</p>";
		}else{
			echo "<p>Ce pseudo existe dÃ©ja/est incorrect</p>";
		}
		echo "<input class='formInput errorFormulaire' type='text' name='username' id='username' placeholder='Username' autocomplete='off'>";
	}
	//si c'est la premiÃ¨re fois que la page est chargÃ©e
	elseif (!isset($_SESSION["username"])) {
		echo "<input class='formInput' type='text' name='username' id='username' placeholder='Username' autocomplete='off'>";
	}
	//si la champs est valide
	else{
		echo "<input class='formInput' type='text' name='username' id='username' placeholder='Username' value=".$_SESSION["username"].">";
	}
}

function afficheMailChamp(){
	//si il y a une erreur dans le champ
	if (isset($_SESSION["mail"]) && $_SESSION["mail"]=='error'){
		echo "<p>Adresse mail incorrect/déjà  utilisée</p>";
		echo "<input class='formInput errorFormulaire' type='mail' name='mail' id='mail' placeholder='Mail' autocomplete='off'>";
	}
	//si c'est la premiÃ¨re fois que la page est chargÃ©e
	elseif (!isset($_SESSION["mail"])) {
		echo "<input class='formInput' type='mail' name='mail' id='mail' placeholder='Mail' autocomplete='off'>";
	}
	//si la champs est valide
	else{
		echo "<input class='formInput' type='mail' name='mail' id='mail' placeholder='Mail' value=".$_SESSION["mail"].">";
	}

}

function affichePasswordChamp(){
	//si il y a une erreur dans le champ
	if (isset($_SESSION["password"]) && $_SESSION["password"]=='error'){
		echo "<p>Mot de passe incorrect</p>";
		echo "<input class='formInput errorFormulaire' type='password' name='password' id='password' placeholder='Password' autocomplete='off'>";
	}
	//si c'est la premiÃ¨re fois que la page est chargÃ©e
	elseif (!isset($_SESSION["password"])) {
		echo "<input class='formInput' type='password' name='password' id='password' placeholder='Password' autocomplete='off'>";
	}
	//si la champs est valide
	else{
		echo "<input class='formInput' type='password' name='password' id='password' placeholder='Password' value=".$_SESSION["password"].">";
	}
}


function afficheFormSignUp(){
		echo "<form action='index.php' method='post'>";
	//user
	afficheUserChamp(False);
	//mail
	afficheMailChamp();
	//password
	affichePasswordChamp();
	//submit bouton
	echo "<input type='submit' value='SignUp' name='wantToLog'>";
	echo "</form>";
	
}


function afficheFormMDP(){
	echo "<section class='form-center'>";
	echo "<h2>Login</h2>";
	echo "<form action='index.php' method='post'>";
	//user
	afficheUserChamp(True);
	//password
	affichePasswordChamp();
	//submit bouton
	echo "<p>";
	echo "<input type='submit' value='Login' name='wantToLog'>";
	echo "</p>";
	echo "</form>";
	echo "</section>";
}




?>
