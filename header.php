<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="img/arbre-icon.png" size="16x16">
    <title>Dico des runes<?php if (isset($_GET['page'])) {echo " | " . $_GET['page'];} ?></title>
</head>

<header>

    <div id="entete">
        <h1 id="titre-image">Le dico des runes</h1>
        <!-- image d'entête dans le css -->
    </div>
    <script type="text/javascript" src="fix-bar-nav.js"></script>
    <div id="nav-bar">
        <ul id="nav-list">
            <img id="icon-nav" src="img/arbre-icon2.png">
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="talisman.php?page=Talisman">Creation de talisman</a></li>
            <li><a href="divination.php?page=Divination">Jeu de divination</a></li>
            <li><a href="dieux.php?page=Mythologie">Mythologie nordique</a></li>
            <li><a href="contact.php?page=Contact">Contact</a></li>
        </ul>
    </div>
</header>