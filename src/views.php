<?php

$_PAGE = 'home';

$_PAGE_LIST = [
    'home' => 'Home',
    'spot' => 'Liste des spots',
    'compte' => 'Votre compte',
    'signup' => 'Creer un compte',
    'login' => 'Connectez vous',
    'verify' => "Verifiez l'adresse mail",
    'avisnew' => "Ajouter votre avis",
    'avislist' => "Liste des avis",
    'topBiere' => "Tops des meilleurs bières !",
    'allBiere' => "Toute les bières",
    'beerpong' => 'Remake beer pong',
    'spots' => 'Liste des spotes par ville',
];

if (!empty($_GET) && isset($_GET['page'])) {
    if (array_key_exists($_GET['page'], $_PAGE_LIST)) {
        $_PAGE = $_GET['page'];
    }
}

$_PAGE_NAME = $_PAGE_LIST[$_PAGE];

if ($_PAGE != 'beerpong') {
    include(__DIR__ . '/views/base.php');
} else {
    include(__DIR__ . '/views/beerpong.html');
}
