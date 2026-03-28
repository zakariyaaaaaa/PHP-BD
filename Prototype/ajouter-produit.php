<?php
require 'config.php';

$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = trim($_POST['nom']);
    $prix = trim($_POST['prix']);
    $description = trim($_POST['description']);
    $categorie = trim($_POST['categorie']);

    
    if(empty($nom)) $errors[] = "Le nom est obligatoire";
    if(empty($prix)) $errors[] = "Le prix est obligatoire";
    if(empty($description)) $errors[] = "La description est obligatoire";
    if(empty($categorie)) $errors[] = "La catégorie est obligatoire";

    if(empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO Produit (nom, prix, description, categorie) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prix, $description, $categorie]);

        header("Location: catalogue.php?success=1");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2> Ajouter  produit</h2>

<?php foreach($errors as $e): ?>
    <p class="error"><?= $e ?></p>
<?php endforeach; ?>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom du produit">
    <input type="number" step="0.01" name="prix" placeholder="Prix">
    <textarea name="description" placeholder="Description"></textarea>
    <input type="text" name="categorie" placeholder="Catégorie">

    <button type="submit">Ajouter</button>
</form>

<br>
<a href="catalogue.php"> Retour</a>

</body>
</html>