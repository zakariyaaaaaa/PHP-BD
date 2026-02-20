<?php
require 'connexion.php';

try {

    $sql = "SELECT * FROM Utilisateur";

    $stmt = $pdo->query($sql);

    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des utilisateurs</title>
</head>
<body>

<h2>Liste des utilisateurs</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Email</th>
</tr>

<?php foreach ($utilisateurs as $user) : ?>
<tr>
    <td><?= $user['id'] ?></td>
    <td><?= $user['nom'] ?></td>
    <td><?= $user['email'] ?></td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>
