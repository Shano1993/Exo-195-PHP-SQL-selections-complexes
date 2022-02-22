<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>
<body>

</body>
</html>

<?php

/**
 * Utilisez la base de données que vous avez utilisé dans l'exo 194.
 * Utilisez aussi le CSS que vous avez écris ( div contenant l'utilisateur ).
 * Pour chaque sélection, vous utiliserez un div par utilisateur:
 * ex:  <div class="classe-css-utilisateur">
 *          utilisateur 1, données ( nom, prenom, etc ... )
 *      </div>
 *      <div class="classe-css-utilisateur">
 *          utilisateur 2, données ( nom, prenom, etc ... )
 *      </div>
 *
 * -- Sélections complexes --
 * Une seule requête est permise pour chaque point de l'exo.
 */

// TODO Commencez par créer votre objet de connexion à la base de données, vous pouvez aussi utiliser l'objet statique ou autre qu'on a créé ensemble.

try {
    $server = 'localhost';
    $db = 'base_exo194';
    $user = 'root';
    $password = '';

    $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    /* 1. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' */
// TODO votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE nom = 'Conor'");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="conor">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "nom: -> " . $user['nom'] . ' a bien le nom Conor' ?>
            </div> <?php
        }
    }

    /* 2. Sélectionnez et affichez tous les utilisateurs dont le prénom est différent de 'John' */
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE prenom != 'John'");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="prenom">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "prénom: -> " . $user['prenom'] . ' a un prénom différent de John' ?>
            </div> <?php
        }
    }

    /* 3. Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2 */
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE id <= 2");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="id_one">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "prénom: -> " . $user['prenom'] . ' a bien un id inférieur ou égal à 2' ?>
            </div> <?php
        }
    }

    /* 4. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2 */
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE id >= 2");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="id_two">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "prénom: -> " . $user['prenom'] . ' a bien un id supérieur ou égal à 2' ?>
            </div> <?php
        }
    }

    /* 5. Sélectionnez et affichez tous les utilisateurs dont l'id est égal à 1 */
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = 1");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="id_three">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "prénom: -> " . $user['prenom'] . ' a bien un id égal à 1' ?>
            </div> <?php
        }
    }

    /* 6. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand que 1 ET le nom est égal à 'Doe' */
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE id > 1 AND nom = 'Doe'");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="name_doe">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "nom: -> " . $user['nom'] . ' a bien un id plus grand que 1 et a bien le nom Doe' ?>
            </div> <?php
        }
    }

    /* 7. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Doe' ET le prénom est 'John'*/
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE nom = 'Doe' AND prenom = 'John'");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="name_john">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "nom: -> ". $user['prenom'] . " " . $user['nom'] . ' s\'appele bien John Doe' ?>
            </div> <?php
        }
    }

    /* 8. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' OU le prénom est 'Jane' */
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE nom = 'Conor' OR prenom = 'Jane'");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="conor_or_jane">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "nom: -> ". $user['prenom'] . " " . $user['nom'] . ' a bien le nom Conor ou le prénom Jane' ?>
            </div> <?php
        }
    }

    /* 9. Sélectionnez et affichez tous les utilisateurs en limitant les réultats à 2 résultats */
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user LIMIT 2");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="limit">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "nom: -> ". $user['prenom'] . " " . $user['nom'] . ' est bien limité à deux' ?>
            </div> <?php
        }
    }

    /* 10. Sélectionnez et affichez tous les utilisateurs par ordre croissant, en limitant le résultat à 1 seul enregistrement */
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user ORDER BY id ASC LIMIT 1");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="limit_one">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "nom: -> ". $user['prenom'] . " " . $user['nom'] . ' est l\'id dans l\'ordre croissant et bien limité à 1' ?>
            </div> <?php
        }
    }

    /* 11. Sélectionnez et affichez tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères ( voir LIKE )*/
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE nom LIKE 'C___r'");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="like">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "nom: -> " . $user['nom'] . ' dispose de 5 caractères et commence par un C et fini par r' ?>
            </div> <?php
        }
    }

    /* 12. Sélectionnez et affichez tous les utilisateurs dont le nom contient au moins un 'e' */
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE nom LIKE '%e%'");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="like_e">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "nom: -> " . $user['nom'] . ' contient au moins un e' ?>
            </div> <?php
        }
    }

    /* 13. Sélectionnez et affichez tous les utilisateurs dont le prénom est ( IN ) (John, Sarah) ... voir IN , pas OR '' */
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE prenom IN ('John', 'Sarah')");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="in">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "prénom: -> " . $user['prenom'] . ' s\'appele John ou Sarah' ?>
            </div> <?php
        }
    }

    /* 14. Sélectionnez et affichez tous les utilisateurs dont l'id est situé entre 2 et 4 */
// TODO Votre code ici.

    $stmt = $pdo->prepare("SELECT * FROM user WHERE id BETWEEN 2 AND 4");

    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $user) { ?>
            <div id="between">
                <?= "L'utilisateur: id -> " . $user['id'] . "<br>" . "prénom: -> " . $user['nom'] . ' se situe bien entre l\'id 2 et 4' ?>
            </div> <?php
        }
    }
}

catch (Exception $exception) {
    echo $exception->getMessage();
}