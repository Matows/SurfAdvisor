================SURFADVISOR============
=====================================

# Sommaire
- Qui sommes nous ?
- Pourquoi ce site ?
- Les différentes fonctionnalitées
- Les défis cachés...
- dessin

```
───────────────███───────────────
─────────────██▀─▀██─────────────
───────────██▀─────▀██───────────
─────────██▀──▄▄▄▄▄──▀██─────────
───────██▀──▄▀─────▀▄──▀██───────
─────██▀──▄▀───███───▀▄──▀██─────
───██▀────▀▄───▀▀▀───▄▀────▀██───
─██▀────────▀▄▄▄▄▄▄▄▀────────▀██─
█▀─────────────────────────────▀█
█████████████████████████████████
─────────────────────────────────
───────────▀█▀─█─█─█▀▀───────────
────────────█──█▀█─█▀▀───────────
────────────▀──▀─▀─▀▀▀───────────
─────────────────────────────────
▀─█─█─█──█─█▀▄▀█─█─█▄─█─█▀█─▀█▀─█
█─█─█─█──█─█─▀─█─█─█▀██─█▄█──█──█
▀─▀─▀─▀▀▀▀─▀───▀─▀─▀──▀─▀─▀──▀──▀
```

# Qui sommes nous ?
  Nous sommes des étudiants à l'Université Savoie Mont blanc actualement en L2 en CMI INFORMATIQUE pour 8 d'entre nous et en license classique pour notre 9ème membre.
  Nous travaillons ensemble depuis maintenant 1 an et demi et nous partageons un bonne esprit d'Equip !
  Blaze des boyz : Théo Guesdon, Simon Pichenot, Hugo Rey, Paul Delifer, Evan l'Huissier, Romain Pajean, Simon Léonard, Romain Negro, Florian Dufaure

# Pourquoi ce site ?
  Nous avons choisi cette année de participer à la nuit de l'infomatique qui a eu lieu du jeudi 03/12/2020 au 04/12/2020.
  Et ce site est notre production durant cette evenement, nous avons donné notre maximun et nous sommes heureux du résultat que nous pouvons proposer sur ce Git
  
# Les différentes fonctionnalitées
  Ce site est avant tout une application web qui a pour but d'aider les surfeurs à pratiquer leurs passions de la meilleure façon possible.
  En effet, ce site vous permettera d'ajouter des spots de surf avec de nombreux paramètres différents pour conseiller des zones à tous les surfeurs.
  Vous retrouverz aussi une liste de tout les spots en fonction des villes afin de chercher le top du top !

# Les défis cachées...
  Réaliser une application en une nuit, c'est fort sympatique mais réaliser des petits défis pour pimenter un peu la chose c'est encore mieux
    
    1.1337 5P34K
      Le but est un "leak speak" sur notre application.
      En effet grâce à un code secret vous pouvez modifier tout le texte de notre application pour avoir un côté un peu plus "hacker"
      Pour trouver ce défit vous devez : 
        -faire le konami code : (flèche) haut, haut, bas, bas, gauche, droite, gauche, droite, B, A, B puis appuier sur la touche "Entrer"
        -Une fenêtre va ensuite s'ouvrir et vous devrez ensuite taper le code : "babyshark"
        Et ainsi vous aurez le site en "leak speak", pour revenir au mode original vous devrez répéter l'opération
    
    2.Two beers or not two beers ?!
      Ce défi nous dit tout dans son intitulé ! 
      Nous vous avons concocté une des petites fonctionnalités de type gustative..
      Vous pouvez accéder à des pages qui vont donnerons une liste des plus grandes bières de nos belles régions et avec leurs popularité caractériser par des "likes",
      ainsi qu'un Top semaine/mois/année des 10 bières les plus licker.
      Comment ai-je pu oublier notre fabuleux beer-pong, qui n'est malheuresement plus fonctionnel aujourd'hui car ile nous reste que des boule de bowling et non des balles de         ping-pong
        Je vous invite à vous rendre dans l'onglet Compte afin d'aller sur les différentes pages bières
        Le beer pong est aussi accessible en tapant : "beerpong" puis entrer
        A noter que si vous téléchargez le code via Github il faut télécharger three.js-r123 puis moteur de recherche préférer
      A noter que, si vous ajouter une bière, seul le champ "prix remporté" n'est pas obligatoire
    
    3.Et quand bien mème...
    Ce défi nous a été proposé par Ubisoft et c'était pour sur un des plus drôle à réaliser.
    Nous devions faire un meme qui devait réunir une référence au surf, au jeu Ubisoft et un meme pouvant faire rire les développeurs.
      Vous pouvez retrouver notre code de la manière suivante :
        -Le lien de la vidéo est disponible sur l'onglet Compte une fois connecté
       
    4.Neurchi Illuminati
    Nous avons rejoint les rangs des Illuminati afin de contrôler à la perfection tous les outils que nous utilisons et ce plan à fonctionner comme prévu.
    Pour les remercier, nous avons décidez de les remerciez en ajoutant des référence à cette mistérieuse organisation.
    Pour accéder à cela vous devez :
      -cette partie n'a pas pu être réalisé dans les temps, et nous ferons en sorte de le faire fonctionner dès que possible
      
    5.Frankencode : créer la vie avec du code !
    En hommage à John H. Conway nous avons choisi de réaliser un Jeu de la Vie sur notre application.
    Vous pourrez retrouvez cette fonctionnalité au moment de votre inscription au moment de la vérification par mail.
      
      
# Informations importantes
  Afin d'utiliser le code parfaitement, vous devez écrire à la racine du projet les 2 fichiers suivant :
  
  config_db.php
  ```php
  //connection a la base de donnée
  $c = mysqli_connect("HOTE", "USER", "PASSWD", "DB");
  mysqli_set_charset($c, "utf8");
  ```
  
  config_mail.php
  ```php
  <?php
  $_SMTP = [
  'host' => 'ssl0.ovh.net',
  'username' => 'user@mon.site',
  'password' => 'motdepasse'
  ];
  ```
  Vous devez ajouter ces fichiers pour vous connecter correctement a la base de donnée, que nous allons vous fournir, et gérer la configuration de la vérification par mail.
  Vous avez aussi sur la racine de ce projet un fichier ```structure.sql ``` qui vous permettera d'avoir la bonne base de donnée.
  Vous avez aussi un fichier de structure rempli : ```structure_remplie.sql```
  Le hash que nous avons utilisé en production à été remplacer dans ce dépot par une suite de 'x' (src/actions/login.php et src/functions/functionLogin.php)

