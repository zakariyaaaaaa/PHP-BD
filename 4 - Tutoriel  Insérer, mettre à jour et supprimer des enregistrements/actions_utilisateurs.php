<?php
require 'cnx.php';

try {

    // Étape 1 => INSERT
    $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
    $stmt->execute([
        'nom' => 'Charlie',
        'email' => 'charlie@test.com'
    ]);
    echo "Utilisateur ajouté avec succès.<br>";


    // Étape 2 => UPDATE
    $stmt = $pdo->prepare("UPDATE Utilisateur SET email = :email WHERE id = :id");
    $stmt->execute([
        'email' => 'charlie.new@test.com',
        'id' => 3
    ]);
    echo "Utilisateur mis à jour.<br>";


    // Etape 3 => DELETE
    $stmt = $pdo->prepare("DELETE FROM Utilisateur WHERE id = :id");
    $stmt->execute([
        'id' => 3
    ]);
    echo "Utilisateur supprimé.<br>";


    // Etape 4 => Vérification
    echo $stmt->rowCount() . " ligne(s) affectée(s).";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}