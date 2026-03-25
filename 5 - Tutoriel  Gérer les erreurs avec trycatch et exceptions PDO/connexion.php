<?php
$host = "localhost";
$dbname = "blogdb";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie<br>";

} catch (PDOException $e) {

    file_put_contents("erreurs.log", $e->getMessage() . PHP_EOL, FILE_APPEND);

    die("Erreur de connexion.");
}