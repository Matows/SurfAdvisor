<?php

// visialiser erreur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$_ROOT = "/nuitinfo";

//connection
session_start();

//Inclusion des fichiers
include("config_db.php");
include("config_mail.php");

include("src/functions.php");
include("src/actions.php");
include("src/views.php");

