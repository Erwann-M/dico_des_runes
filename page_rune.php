<?php require_once "header.php"; ?>

<body>
    <div id="corp">
        <?php require "encadrement.php";
        
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=runes;charset=utf8', 'root', 'root');
        }
        catch (Exception $e) {
            die ('Erreur : ' . $e->getMessage());
        }

        function nbre_mots($mot) {
            $tableau = explode(",", $mot);
            $nbre = count($tableau);
            return $nbre;
        }

        if (isset($_GET['image'])) {
            ?>
            <div class="rune-seul">
                <?php
                echo '<img class="rune-seul-image" src="img/'. $_GET['image'] . '" alt="image rune">';
                ?>
            </div>
            <?php
        }

        if (isset($_GET['id']) && $_GET['id'] >= 1 && $_GET['id'] <= 24 && !empty($_GET['id'])) {
        
            // génération des pages des rune de façon dynamique----------------------------------
            $description = $bdd->prepare('SELECT * FROM descriptions WHERE id = ?');
            $description->execute(array(htmlspecialchars($_GET['id'])));

            $donnees = $description->fetch();

            echo '<h1 class="title-rune">'. $donnees['nom'] .'</h1><br>';
            ?>
            <div id="debut_description">
                <div class="c_d_item">
                    <?php
                    if (nbre_mots($donnees['autre_nom']) >= 2) {
                        echo '<h2 class="titre_description_c_d">Autres noms :</h2><br>';
                    } else {
                        echo '<h2 class="titre_description_c_d">Autre nom :</h2><br>';
                    }
                    echo '<p>'. $donnees['autre_nom'] .'</p>';
                    ?>
                </div>
                <div class="c_d_item">
                    <?php
                    echo '<h2 class="titre_description_c_d">Symboles et images associés :</h2><br>';
                    echo '<p>'. nl2br($donnees['symbole_image']) .'</p><br>';
                    ?>
                </div>
            </div>
            <div id="bloc_secondaire">
                <div id="bloc_secondaire1">
                    <?php
                    echo '<h2 class="titre_description">Symbolisme et valeurs initiatiques :</h2><br>';
                    echo '<p>'. nl2br($donnees['symbolisme']) .'</p><br>';
                    echo '<h2 class="titre_description">Utilisation pour les talisman :</h2><br>';
                    echo '<p>'. $donnees['talisman'] .'</p><br>';
                    echo '<h2 class="titre_description">Valeurs divinatoire :</h2><br>';
                    echo '<p>'. $donnees['divinatoire'] .'</p><br>';
                    ?>
                </div>
                <div id="bloc_secondaire2">
                    <?php
                    $description->closeCursor();

                    // Génération des pages annexes -----------------------------------------------------
                    $annexe = $bdd->prepare('SELECT * FROM annexe WHERE id = ?');
                    $annexe->execute(array(htmlspecialchars($_GET['id'])));

                    $donnees_annexe = $annexe->fetch();

                    echo '<h1>Associations</h1><br>';
                    if (nbre_mots($donnees_annexe['mineraux']) >= 2) {
                        echo '<h3>Minéraux :</h3><br>';
                    } else {
                        echo '<h3>Minéral :</h3><br>';
                    }
                    echo '<p>'. $donnees_annexe['mineraux'] .'</p><br>';

                    if (nbre_mots($donnees_annexe['plantes']) >= 2) {
                        echo '<h3>Plantes :</h3><br>';
                    } else {
                        echo '<h3>Plante :</h3><br>';
                    }
                    echo '<p>'. $donnees_annexe['plantes'] .'</p><br>';

                    if (nbre_mots($donnees_annexe['arbres']) >= 2) {
                        echo '<h3>Arbres :</h3><br>';
                    } else {
                        echo '<h3>Arbre :</h3><br>';
                    }
                    echo '<p>'. $donnees_annexe['arbres'] .'</p><br>';

                    if (nbre_mots($donnees_annexe['couleurs']) >= 2) {
                        echo '<h3>Couleurs :</h3><br>';
                    } else {
                        echo '<h3>Couleur :</h3><br>';
                    }
                    echo '<p>'. $donnees_annexe['couleurs'] .'</p><br>';

                    if (nbre_mots($donnees_annexe['animaux']) >= 2) {
                        echo '<h3>Animaux :</h3><br>';
                    } else {
                        echo '<h3>Animal :</h3><br>';
                    }
                    echo '<p>'. $donnees_annexe['animaux'] .'</p><br>';

                    if (nbre_mots($donnees_annexe['divinites']) >= 2) {
                        echo '<h3>Divinités :</h3><br>';
                    } else {
                        echo '<h3>Divinité :</h3><br>';
                    }
                    echo '<p>'. $donnees_annexe['divinites'] .'</p><br>';

                    if (nbre_mots($donnees_annexe['element']) >= 2) {
                        echo '<h3>Eléments :</h3><br>';
                    } else {
                        echo '<h3>Elément :</h3><br>';
                    }
                    echo '<p>'. $donnees_annexe['element'] .'</p><br>';
                    
                    if (nbre_mots($donnees_annexe['polarite']) >= 2) {
                        echo '<h3>Polaritées :</h3><br>';
                    } else {
                        echo '<h3>Polaritée :</h3><br>';
                    }
                    echo '<p>'. $donnees_annexe['polarite'] .'</p><br>';

                    $annexe->closeCursor();

                    ?>
                </div>
            </div>
            <?php
            }
            
            else {
                echo '<h1 id="troll">Et oui !!! j\'y ai pensé petit malin !</h1><br>';
            }
            

        ?>
    </div>

</body>

<?php require_once "footer.php"; ?>
</html>