<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= $_ROOT ?>/css/bulma.css">
    <link rel="stylesheet" href="<?= $_ROOT ?>/css/style.css">
    <link rel="icon" href="./img/favicon.ico" />
    <title>SurfAdvisor</title>
</head>
<body>

    <header class="section">
        <div class="container">
            <nav>
                <h2 class="nav-title" onclick="location.href='index.php?page=home'">SurfAdvisor</h2>
                <img src="./img/logo.png" onclick="location.href='index.php?page=home'">
                <div class="menu" >
                    <?php 
                    if (isset($_SESSION["userLogedIn"]) and $_SESSION["userLogedIn"]){
                        ?>
                        <a href="index.php?page=avisnew"><div class="menu-element">Ajouter</div></a>
                        <a href="index.php?page=spots"><div class="menu-element">Villes</div></a>
                        <a href="index.php?page=compte"><div class="menu-element">Compte</div></a>
                        <?php
                    }else{
                        ?>
                        <a href="index.php?page=signup"><div class="menu-element">Connexion</div></a>
                        <?php 
                    } 

                    ?>
                </div>
            </nav>
        </div>
    </header>

    <main class="section">
        <div class="container">
            <?php
            include(__DIR__ . '/' . $_PAGE . '.php');
            ?>
        </div>
    </main>

<footer>
    <!-- TODO -->
    <script src="./js/leetInjs.js"></script>
    <script src="./js/illuminati.js"></script>
    <script src="./js/codes.js"></script>
</footer>
</body>
</html>

