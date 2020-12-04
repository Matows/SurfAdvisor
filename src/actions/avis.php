<?php

if (!empty($_POST)){
    if (!empty($_POST["nomSpot"]) && !empty($_POST["villeSpot"]) && !empty($_POST["note"])){

      $note = $_POST["note"];
      $nomVille = $_POST["villeSpot"];
      $nomSpot = $_POST["nomSpot"];

      if(isset($_POST["date"])){
          $date = $_POST["date"];
      }else{
          $date = NULL;
      }
      if(isset($_POST["heureDebut"])){
          $heureDebut = $_POST["heureDebut"];
      }else{
          $heureDebut = NULL;
      }
      if(isset($_POST["heureFin"])){
          $heureFin = $_POST["heureFin"];
      }else{
          $heureFin = NULL;
      }
      if(isset($_POST["nbBaigneurs"])){
          $nbBaigneurs = $_POST["nbBaigneurs"];
      }else{
          $nbBaigneurs = NULL;
      }
      if(isset($_POST["nbPAN"])){
          $nbPAN = $_POST["nbPAN"];
      }else{
          $nbPAN = NULL;
      }
      if(isset($_POST["nbBateau"])){
          $nbBateau = $_POST["nbBateau"];
      }else{
          $nbBateau = NULL;
      }
      if(isset($_POST["avis"])){
          $avis = $_POST["avis"];
      }else{
          $avis = NULL;
      }

        ajouteInfosDepuisForm($c, $nomSpot, $nomVille, $date, $heureDebut, $heureFin, $nbBaigneurs, $nbPAN, $nbBateau, $avis, $note);
    }
}
