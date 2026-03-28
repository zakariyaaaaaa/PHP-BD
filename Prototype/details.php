<?php
require 'config.php';

if(!isset($_GET['id'])) {
    die("ID manquant");
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM Produit WHERE id = ?");
$stmt->execute([$id]);
$produit = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$produit) {
    die("Produit introuvable");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2><?= $produit['nom'] ?></h2>

<div class="card">
    <p><strong> Prix :</strong> <?= $produit['prix'] ?> DH</p>
    <p><strong> Description :</strong> <?= $produit['description'] ?></p>
    <p><strong> Catégorie :</strong> <?= $produit['categorie'] ?></p>
</div>

<br>
<a href="catalogue.php"> Retour au catalogue</a>

</body>
</html>