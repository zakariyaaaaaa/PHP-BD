<?php
require "connexion.php";

try {
    $stmt = $pdo->query("SELECT * FROM table_inexistante");
    echo "Requête exécutée";
} catch (PDOException $e) {
    file_put_contents("erreurs.log", $e->getMessage() . PHP_EOL, FILE_APPEND);
    echo "Une erreur est survenue. Contactez l'administrateur.";
}