<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM Produit");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue des produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2> Catalogue des produits</h2>

<?php if(isset($_GET['success'])): ?>
    <p class="success">Produit ajouté avec succès</p>
<?php endif; ?>

<a href="ajouter-produit.php"> Ajouter un produit</a>

<hr>

<?php foreach($produits as $p): ?>
    <div class="card">
        <h3><?= $p['nom'] ?></h3>
        <p> Prix : <?= $p['prix'] ?> DH</p>
        <a href="details.php?id=<?= $p['id'] ?>">Voir détails</a>
    </div>
<?php endforeach; ?>

</body>
</html>